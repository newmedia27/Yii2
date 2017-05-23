<?php
	/**
	 * Created by PhpStorm.
	 * UserAdmin: jart
	 * Date: 03.05.2017
	 * Time: 23:17
	 */
	
	namespace frontend\models;
	use yii\db\ActiveRecord;
	use backend\models\OrderItem;
	
	class Product extends ActiveRecord
	{
		public static function tableName()
		{
			return 'product';
		}
		
		public function getCategory()
		{
			return $this->hasOne(Categories::className(),['id'=>'category_id']);
		}
		public function getOrderItem()
		{
			return $this->hasMany(OrderItem::className(), ['product_id' => 'id']);
		}
		
	}