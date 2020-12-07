<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "shoes".
 *
 * @property int $shoe_id
 * @property string $shoe_name
 * @property string $description
 * @property string $shoe_type
 * @property int $cat_id
 * @property int $brand_id
 * @property string $shoe_size
 * @property float $price
 * @property string $img_path
 * @property string $created_at
 *
 * @property Cart[] $carts
 * @property Images[] $images
 * @property ShoeBrand $brand
 * @property ShoeCategory $cat
 */
class Shoes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shoes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shoe_name', 'description', 'shoe_type', 'cat_id', 'brand_id', 'shoe_size', 'price'], 'required'],
            [['cat_id', 'brand_id'], 'integer'],
            [['price'], 'number'],
            [['created_at'], 'safe'],
            [['shoe_name', 'description', 'shoe_type', 'shoe_size', 'img_path'], 'string', 'max' => 255],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShoeBrand::className(), 'targetAttribute' => ['brand_id' => 'brand_id']],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShoeCategory::className(), 'targetAttribute' => ['cat_id' => 'cat_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'shoe_id' => 'Shoe ID',
            'shoe_name' => 'Shoe Name',
            'description' => 'Description',
            'shoe_type' => 'Shoe Type',
            'cat_id' => 'Cat ID',
            'brand_id' => 'Brand ID',
            'shoe_size' => 'Shoe Size',
            'price' => 'Price',
            'img_path' => 'Img Path',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Carts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['shoe_id' => 'shoe_id']);
    }

    /**
     * Gets query for [[Images]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['shoe_id' => 'shoe_id']);
    }

    /**
     * Gets query for [[Brand]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(ShoeBrand::className(), ['brand_id' => 'brand_id']);
    }

    /**
     * Gets query for [[Cat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(ShoeCategory::className(), ['cat_id' => 'cat_id']);
    }
}
