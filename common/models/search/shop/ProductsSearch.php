<?php

namespace common\models\search\shop;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\shop\ShopProducts;

/**
 * ProductsSearch represents the model behind the search form of `common\models\shop\ShopProducts`.
 */
class ProductsSearch extends ShopProducts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'created_at', 'price_old', 'price_new', 'main_photo_id', 'status', 'weight', 'quantity'], 'integer'],
            [['code', 'name', 'description', 'meta_json'], 'safe'],
            [['rating'], 'number'],
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
        $query = ShopProducts::find();

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
            'id' => $this->id,
            'category_id' => $this->category_id,
            'created_at' => $this->created_at,
            'price_old' => $this->price_old,
            'price_new' => $this->price_new,
            'rating' => $this->rating,
            'main_photo_id' => $this->main_photo_id,
            'status' => $this->status,
            'weight' => $this->weight,
            'quantity' => $this->quantity,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'meta_json', $this->meta_json]);

        return $dataProvider;
    }
}
