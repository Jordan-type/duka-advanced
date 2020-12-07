<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "shoe_brand".
 *
 * @property int $brand_id
 * @property string $brand_name
 * @property string $brand_logo
 *
 * @property Shoes[] $shoes
 */
class ShoeBrand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shoe_brand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_name', 'brand_logo'], 'required'],
            [['brand_name', 'brand_logo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'brand_id' => 'Brand ID',
            'brand_name' => 'Brand Name',
            'brand_logo' => 'Brand Logo',
        ];
    }

    /**
     * Gets query for [[Shoes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShoes()
    {
        return $this->hasMany(Shoes::className(), ['brand_id' => 'brand_id']);
    }
}
