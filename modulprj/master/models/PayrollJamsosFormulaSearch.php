<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\PayrollJamsosFormula;

/**
 * PayrollJamsosFormulaSearch represents the model behind the search form about `modulprj\master\models\PayrollJamsosFormula`.
 */
class PayrollJamsosFormulaSearch extends PayrollJamsosFormula
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SOS_ID'], 'safe'],
            [['DATA_UPAH', 'JML_SOS', 'JKK', 'JKM', 'JPK', 'JHT_TK', 'JHT', 'SOS_TTL', 'PERSEN_JKK', 'PERSEN_JKM', 'PERSEN_JPK', 'PERSEN_JHT_TK', 'PERSEN_JHT'], 'number'],
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
        $query = PayrollJamsosFormula::find();

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
            'DATA_UPAH' => $this->DATA_UPAH,
            'JML_SOS' => $this->JML_SOS,
            'JKK' => $this->JKK,
            'JKM' => $this->JKM,
            'JPK' => $this->JPK,
            'JHT_TK' => $this->JHT_TK,
            'JHT' => $this->JHT,
            'SOS_TTL' => $this->SOS_TTL,
            'PERSEN_JKK' => $this->PERSEN_JKK,
            'PERSEN_JKM' => $this->PERSEN_JKM,
            'PERSEN_JPK' => $this->PERSEN_JPK,
            'PERSEN_JHT_TK' => $this->PERSEN_JHT_TK,
            'PERSEN_JHT' => $this->PERSEN_JHT,
        ]);

        $query->andFilterWhere(['like', 'SOS_ID', $this->SOS_ID]);

        return $dataProvider;
    }
}
