<?php

namespace frontend\models\query;

/**
 * This is the ActiveQuery class for [[\frontend\models\Shoes]].
 *
 * @see \frontend\models\Shoes
 */
class ShoesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \frontend\models\Shoes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\Shoes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

     public function latest()
    {
        return $this->orderBy(['created_at' => SORT_DESC]);
    }


// search bar find function
     public function byKeyword($keyword)
    {
        return $this->andWhere("MATCH(shoe_name, description)
        AGAINST (:keyword)", ['keyword' => $keyword]);
    }
}
