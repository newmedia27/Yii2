<?php
	/**
	 * Created by PhpStorm.
	 * UserAdmin: jart
	 * Date: 09.05.2017
	 * Time: 23:06
	 */
	
	namespace frontend\controllers;
	
	use frontend\models\Product;
	use Yii;
	use yii\web\HttpException;
	
	class ProductController extends AppController
	{
		public function actionIndex($id)
		{
			
			$product = Product::findOne($id);
			
			if (empty($product)) {
				throw new HttpException(404, 'Такого товара не существует');
			}
			
			$hits = Product::find()->where(['hit' => 1, 'category_id' => $product['category_id']])->limit(3)->orderBy(['id' => SORT_DESC])->all();
			
			$this->setMetaTags('E-SHOP | ' . $product->name, $product->keywords, $product->description);
			
			return $this->render('index', ['product' => $product, 'hits' => $hits]);
		}
	}