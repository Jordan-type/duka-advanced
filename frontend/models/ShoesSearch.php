<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Shoes;

/**
 * ShoesSearch represents the model behind the search form of `frontend\models\Shoes`.
 */
class ShoesSearch extends Shoes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shoe_id', 'cat_id', 'brand_id'], 'integer'],
            [['shoe_name', 'description', 'shoe_type', 'shoe_size', 'img_path', 'created_at'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Shoes::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'shoe_id' => $this->shoe_id,
            'cat_id' => $this->cat_id,
            'brand_id' => $this->brand_id,
            'price' => $this->price,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'shoe_name', $this->shoe_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'shoe_type', $this->shoe_type])
            ->andFilterWhere(['like', 'shoe_size', $this->shoe_size])
            ->andFilterWhere(['like', 'img_path', $this->img_path]);

        return $dataProvider;
    }
}
