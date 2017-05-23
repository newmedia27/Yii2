<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

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
            [['created_at', 'update_at', 'quantity', 'sum', 'name', 'email', 'phone', 'address'], 'required'],
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
            'id' => 'Номер заказа',
            'created_at' => 'Создан',
            'update_at' => 'Редактирован',
            'quantity' => 'Количество',
            'sum' => 'Сумма',
            'status' => 'Статус',
            'name' => 'Имя',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'address' => 'Адресс',
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
