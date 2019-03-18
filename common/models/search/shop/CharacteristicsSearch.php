<?php

namespace common\models\search\shop;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\shop\ShopCharacteristics;

/**
 * CharacteristicsSearch represents the model behind the search form of `common\models\shop\ShopCharacteristics`.
 */
class CharacteristicsSearch extends ShopCharacteristics
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'required', 'sort'], 'integer'],
            [['name', 'type', 'default', 'variants_json'], 'safe'],
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
        $query = ShopCharacteristics::find();

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
            'required' => $this->required,
            'sort' => $this->sort,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'default', $this->default])
            ->andFilterWhere(['like', 'variants_json', $this->variants_json]);

        return $dataProvider;
    }
}
