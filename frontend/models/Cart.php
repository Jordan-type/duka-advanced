<?php

namespace frontend\models;
use common\models\User;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $cart_id
 * @property int $shoe_id
 * @property int $user_id
 *
 * @property Shoes $shoe
 * @property User $user
 * @property Order[] $orders
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shoe_id', 'user_id'], 'required'],
            [['shoe_id', 'user_id'], 'integer'],
            [['shoe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shoes::className(), 'targetAttribute' => ['shoe_id' => 'shoe_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cart_id' => 'Cart ID',
            'shoe_id' => 'Shoe ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Shoe]].
     *
     * @return \yii\db\ActiveQuery|\frontend\models\query\ShoesQuery
     */
    public function getShoe()
    {
        return $this->hasOne(Shoes::className(), ['shoe_id' => 'shoe_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|\frontend\models\query\UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery|\frontend\models\query\OrderQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['cart_id' => 'cart_id']);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\CartQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\CartQuery(get_called_class());
    }
}
