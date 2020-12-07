<?php

namespace frontend\models;

/**
 * This is the ActiveQuery class for [[Shoes]].
 *
 * @see Shoes
 */
class ShoesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Shoes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Shoes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
