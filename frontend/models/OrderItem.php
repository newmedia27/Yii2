<?php
	
	namespace frontend\models;
	
	use yii\db\ActiveRecord;
	use Yii;
	
	
	/**
	 * This is the model class for table "order_item".
	 *
	 * @property integer $id
	 * @property integer $order_id
	 * @property integer $product_id
	 * @property string $name
	 * @property double $price
	 * @property integer $quantity_item
	 * @property double $sum_item
	 *
	 * @property Order $order
	 * @property Product $product
	 */
	class OrderItem extends ActiveRecord
	{
		/**
		 * @inheritdoc
		 */
		public static function tableName()
		{
			return 'order_item';
		}
		
		/**
		 * @inheritdoc
		 */
		public function rules()
		{
			return [
				[['order_id', 'product_id', 'name', 'price', 'quantity_item', 'sum_item'], 'required'],
				[['order_id', 'product_id', 'quantity_item'], 'integer'],
				[['price', 'sum_item'], 'number'],
				[['name'], 'string', 'max' => 255],
				[['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
				[['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
			];
		}
		
		/**
		 * @inheritdoc
		 */
		public function attributeLabels()
		{
			return [
				'id' => 'ID',
				'order_id' => 'Order ID',
				'product_id' => 'Product ID',
				'name' => 'Name',
				'price' => 'Price',
				'quantity_item' => 'Quantity Item',
				'sum_item' => 'Sum Item',
			];
		}
		
		/**
		 * @return \yii\db\ActiveQuery
		 */
		public function getOrder()
		{
			return $this->hasOne(Order::className(), ['id' => 'order_id']);
		}
		
		/**
		 * @return \yii\db\ActiveQuery
		 */
		public function getProduct()
		{
			return $this->hasOne(Product::className(), ['id' => 'product_id']);
		}
		
	}
