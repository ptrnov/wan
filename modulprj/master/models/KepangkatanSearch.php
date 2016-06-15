<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\Kepangkatan;

/**
 * KepangkatanSearch represents the model behind the search form about `modulprj\master\models\Kepangkatan`.
 */
class KepangkatanSearch extends Kepangkatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'STATUS'], 'integer'],
            [['GF_ID', 'GF_NM', 'GF_DCRP', 'CREATED_BY', 'UPDATED_BY', 'UPDATED_TIME'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Kepangkatan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
            'STATUS' => $this->STATUS,
            'UPDATED_TIME' => $this->UPDATED_TIME,
        ]);

        $query->andFilterWhere(['like', 'GF_ID', $this->GF_ID])
            ->andFilterWhere(['like', 'GF_NM', $this->GF_NM])
            ->andFilterWhere(['like', 'GF_DCRP', $this->GF_DCRP])
            ->andFilterWhere(['like', 'CREATED_BY', $this->CREATED_BY])
            ->andFilterWhere(['like', 'UPDATED_BY', $this->UPDATED_BY]);

        return $dataProvider;
    }
}
