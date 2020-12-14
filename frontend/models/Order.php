<?php

namespace frontend\models;

use Yii;
use common\models\user;

/**
 * This is the model class for table "order".
 *
 * @property int $order_id
 * @property int $user_id
 * @property string $paymethod
 * @property string $card_no
 *
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
            [['user_id', 'paymethod', 'card_no'], 'required'],
            [['user_id'], 'integer'],
            [['paymethod', 'card_no'], 'string', 'max' => 255],
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
            'user_id' => 'User ID',
            'paymethod' => 'Paymethod',
            'card_no' => 'Card No',
        ];
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
     * {@inheritdoc}
     * @return \frontend\models\query\OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\OrderQuery(get_called_class());
    }
}
