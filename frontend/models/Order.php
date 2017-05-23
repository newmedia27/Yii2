<?php
	
	namespace frontend\models;
	
	use yii\behaviors\TimestampBehavior;
	use yii\db\ActiveRecord;
	use yii\db\Expression;
	
	
	/**
	 * This is the model class for table "order".
	 *
	 * @property integer $id
	 * @property string $created_at
	 * @property string $update_at
	 * @property integer $quantity
	 * @property double $sum
	 * @property integer $status
	 * @property string $name
	 * @property string $email
	 * @property string $phone
	 * @property string $address
	 *
	 * @property OrderItem[] $orderItems
	 */
	class Order extends ActiveRecord
	{
		/**
		 * @inheritdoc
		 */
		public static function tableName()
		{
			return 'order';
		}
		
		/**
		 * @inheritdoc
		 */
		public function rules()
		{
			return [
				[['name', 'email', 'phone', 'address'], 'required'],
				[['created_at', 'update_at'], 'safe'],
				[['quantity', 'status'], 'integer'],
				[['sum'], 'number'],
				[['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
			];
		}
		
		/**
		 * @inheritdoc
		 */
		public function attributeLabels()
		{
			return [
				'name' => 'Имя',
				'email' => 'E-mail',
				'phone' => 'Телефон',
				'address' => 'Адресс',
			];
		}
		
		/**
		 * @return array
		 */
		public function behaviors()
		{
			return [
				[
					'class' => TimestampBehavior::className(),
					'attributes' => [
						ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'update_at'],
						ActiveRecord::EVENT_BEFORE_UPDATE => ['update_at'],
					],
					// если вместо метки времени UNIX используется datetime:
					'value' => new Expression('NOW()'),
				],
			];
		}
		
		/**
		 * @return \yii\db\ActiveQuery
		 */
		public function getOrderItems()
		{
			return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
		}
		
		
	}
