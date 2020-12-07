<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $img_id
 * @property string $img_path
 * @property int $shoe_id
 *
 * @property Shoes $shoe
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img_path', 'shoe_id'], 'required'],
            [['shoe_id'], 'integer'],
            [['img_path'], 'string', 'max' => 255],
            [['shoe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Shoes::className(), 'targetAttribute' => ['shoe_id' => 'shoe_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'img_id' => 'Img ID',
            'img_path' => 'Img Path',
            'shoe_id' => 'Shoe ID',
        ];
    }

    /**
     * Gets query for [[Shoe]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShoe()
    {
        return $this->hasOne(Shoes::className(), ['shoe_id' => 'shoe_id']);
    }
}
