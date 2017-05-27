<?php
	
	namespace frontend\models;
	use yii\db\ActiveRecord;
	
	class Categories extends ActiveRecord
	{
		public function behaviors()
		{
			return [
				'image' => [
					'class' => 'rico\yii2images\behaviors\ImageBehave',
				]
			];
		}
		/**
		 * @return string name table on db
		 */
		public static function tableName()
		{
			return 'categories';
		}
		public function getProduct()
		{
			return $this->hasMany(Product::className(),['category_id'=>'id']);
		}
		
	}