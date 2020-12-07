<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $order_id
 * @property int $cart_id
 * @property int $user_id
 * @property string $paymethod
 * @property string $card_no
 * @property float $total_price
 *
 * @property Cart $cart
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cart_id', 'user_id', 'paymethod', 'card_no', 'total_price'], 'required'],
            [['cart_id', 'user_id'], 'integer'],
            [['total_price'], 'number'],
            [['paymethod', 'card_no'], 'string', 'max' => 255],
            [['cart_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cart::className(), 'targetAttribute' => ['cart_id' => 'cart_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'cart_id' => 'Cart ID',
            'user_id' => 'User ID',
            'paymethod' => 'Paymethod',
            'card_no' => 'Card No',
            'total_price' => 'Total Price',
        ];
    }

    /**
     * Gets query for [[Cart]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCart()
    {
        return $this->hasOne(Cart::className(), ['cart_id' => 'cart_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
