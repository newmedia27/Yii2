<?php
	
	namespace backend\models;
	
	/**
	 * This is the model class for table "product".
	 *
	 * @property integer $id
	 * @property integer $category_id
	 * @property string $name
	 * @property string $content
	 * @property double $price
	 * @property string $keywords
	 * @property string $description
	 * @property string $img
	 * @property integer $hit
	 * @property integer $new
	 * @property integer $sale
	 *
	 * @property OrderItem[] $orderItems
	 * @property Categories $category
	 */
	class Product extends \yii\db\ActiveRecord
	{
		public $image;
		public $gallery;
		
		
		/**
		 * @return array
		 */
		public function behaviors()
		{
			return [
				'image' => [
					'class' => 'rico\yii2images\behaviors\ImageBehave',
				]
			];
		}
		
		/**
		 * @inheritdoc
		 */
		public static function tableName()
		{
			return 'product';
		}
		
		/**
		 * @inheritdoc
		 */
		public function rules()
		{
			return [
				[['category_id', 'hit', 'new', 'sale'], 'integer'],
				[['name'], 'required'],
				[['content'], 'string'],
				[['price'], 'number'],
				[['name', 'keywords', 'description', 'img'], 'string', 'max' => 255],
				[['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
				[['image'], 'file','extensions' => 'png, jpg, gif'],
//				[['gallery'], 'file','extensions' => 'png, jpg','maxFiles'=> ''],
			
			];
		}
		
		/**
		 * @inheritdoc
		 */
		public function attributeLabels()
		{
			return [
				'id' => 'ID-товара',
				'category_id' => 'Категория',
				'name' => 'Наименование',
				'content' => 'Контент',
				'price' => 'Цена',
				'keywords' => 'Ключевые слова',
				'description' => 'Мета-описание',
				'image' => 'Фото',
				'hit' => 'хит',
				'new' => 'новинка',
				'sale' => 'распродажа',
			];
		}
		
		/**
		 * @return \yii\db\ActiveQuery
		 */
		public function getOrderItems()
		{
			return $this->hasMany(OrderItem::className(), ['product_id' => 'id']);
		}
		
		/**
		 * @return \yii\db\ActiveQuery
		 */
		public function getCategory()
		{
			return $this->hasOne(Categories::className(), ['id' => 'category_id']);
		}
		
		/**
		 * @return bool
		 */
		public function upload()
		{
			if ($this->validate()){
				$path = '../../frontend/web/upload/store/' . $this->image->baseName . '.' . $this->image->extension;
				$this->image->saveAs($path);
				return true;
			}else{
				return false;
			}
		}
		
	}
	
