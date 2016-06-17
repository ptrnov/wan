<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\PayrollAsuransiFormula;

/**
 * PayrollAsuransiFormulaSearch represents the model behind the search form about `modulprj\master\models\PayrollAsuransiFormula`.
 */
class PayrollAsuransiFormulaSearch extends PayrollAsuransiFormula
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ASR_ID', 'ASR_NM'], 'safe'],
            [['ASR_PAY_MONTH'], 'number'],
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
        $query = PayrollAsuransiFormula::find();

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
            'ASR_PAY_MONTH' => $this->ASR_PAY_MONTH,
        ]);

        $query->andFilterWhere(['like', 'ASR_ID', $this->ASR_ID])
            ->andFilterWhere(['like', 'ASR_NM', $this->ASR_NM]);

        return $dataProvider;
    }
}
