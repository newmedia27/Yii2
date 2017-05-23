<?php
	/**
	 * Created by PhpStorm.
	 * UserAdmin: jart
	 * Date: 07.05.2017
	 * Time: 18:50
	 */
	
	namespace frontend\controllers;
	
	use frontend\models\Categories;
	use frontend\models\Product;
	use yii\data\Pagination;
	use yii\web\HttpException;
	use Yii;
	
	class CategoryController extends AppController
	{
		const SIZE = 3;
		
		/**
		 * @return string
		 */
		public function actionIndex()
		{
			
			
			$lost = Product::find()->orderBy(['id' => SORT_DESC])->limit(9)->all();
			
			$this->setMetaTags('E-SHOP');
			
			return $this->render('index', ['lost' => $lost]);
		}
		
		/**
		 * @param $id
		 * @return string
		 * @throws HttpException
		 */
		public function actionView($id)
		{
			$category = Categories::findOne($id);
			
			if (empty($category)) {
				throw new HttpException(404, 'Такой категории не существует');
			}
			
			$query = Product::find()->where(['category_id' => $id]);
			
			$pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => self::SIZE, 'forcePageParam' => false, 'pageSizeParam' => false]);
			$products = $query->offset($pages->offset)->limit($pages->limit)->all();
			
			
			$parentCategory = Categories::findOne($category['parent_id']);
			
			
			$this->setMetaTags('E-SHOP | ' . $category->name, $category->keywords, $category->description);
			
			return $this->render('view', [
				'products' => $products,
				'pages' => $pages,
				'category' => $category,
				'parentCategory' => $parentCategory
			]);
		}
		
		/**
		 * @return string
		 */
		public function actionSearch()
		{
			$search = Yii::$app->request->get('search');
			$search = trim($search);

			if (!$search){
				return $this->render('search');
			}
			
			
			$query = Product::find()->where(['like', 'name', $search]);
			$pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => self::SIZE, 'forcePageParam' => false, 'pageSizeParam' => false]);
			$products = $query->offset($pages->offset)->limit($pages->limit)->all();
			
			return $this->render('search', [
				'products' => $products,
				'pages' => $pages,
				'search' => $search,
			]);
		}
	}
	
	
	
	