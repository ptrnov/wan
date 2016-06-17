<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\PayrollPtkpFormula;

/**
 * PayrollPtkpFormulaSearch represents the model behind the search form about `modulprj\master\models\PayrollPtkpFormula`.
 */
class PayrollPtkpFormulaSearch extends PayrollPtkpFormula
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NO', 'ANAK'], 'integer'],
            [['PTKP_NM', 'STT_ID'], 'safe'],
            [['PTKP_VALUE', 'PPH21'], 'number'],
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
        $query = PayrollPtkpFormula::find();

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
            'NO' => $this->NO,
            'ANAK' => $this->ANAK,
            'PTKP_VALUE' => $this->PTKP_VALUE,
            'PPH21' => $this->PPH21,
        ]);

        $query->andFilterWhere(['like', 'PTKP_NM', $this->PTKP_NM])
            ->andFilterWhere(['like', 'STT_ID', $this->STT_ID]);

        return $dataProvider;
    }
}
