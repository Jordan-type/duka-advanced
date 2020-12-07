<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "shoe_category".
 *
 * @property int $cat_id
 * @property string $cat_name
 *
 * @property Shoes[] $shoes
 */
class ShoeCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shoe_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cat_name'], 'required'],
            [['cat_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cat_id' => 'Cat ID',
            'cat_name' => 'Cat Name',
        ];
    }

    /**
     * Gets query for [[Shoes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShoes()
    {
        return $this->hasMany(Shoes::className(), ['cat_id' => 'cat_id']);
    }
}
