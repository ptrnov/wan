<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\PayrollTax;

/**
 * PayrollTaxSearch represents the model behind the search form about `modulprj\master\models\PayrollTax`.
 */
class PayrollTaxSearch extends PayrollTax
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KAR_ID', 'sDate', 'eDate', 'PTKP_NM'], 'safe'],
            [['TTL_UPAH', 'PTKP_VALUE', 'UPAH_PTKP', 'TTL_PTKP', 'PPH21'], 'number'],
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
        $query = PayrollTax::find();

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
            'sDate' => $this->sDate,
            'eDate' => $this->eDate,
            'TTL_UPAH' => $this->TTL_UPAH,
            'PTKP_VALUE' => $this->PTKP_VALUE,
            'UPAH_PTKP' => $this->UPAH_PTKP,
            'TTL_PTKP' => $this->TTL_PTKP,
            'PPH21' => $this->PPH21,
        ]);

        $query->andFilterWhere(['like', 'KAR_ID', $this->KAR_ID])
            ->andFilterWhere(['like', 'PTKP_NM', $this->PTKP_NM]);

        return $dataProvider;
    }
}
