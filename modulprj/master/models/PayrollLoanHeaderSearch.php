<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\PayrollLoanHeader;

/**
 * PayrollLoanHeaderSearch represents the model behind the search form about `modulprj\master\models\PayrollLoanHeader`.
 */
class PayrollLoanHeaderSearch extends PayrollLoanHeader
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'PNJ_PAY_REGULASI', 'STT'], 'integer'],
            [['KAR_ID', 'TGL', 'PNJ_NM', 'KET'], 'safe'],
            [['PNJ_PAY_MONTH', 'PNJ_PAY'], 'number'],
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
        $query = PayrollLoanHeader::find();

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
            'ID' => $this->ID,
            'TGL' => $this->TGL,
            'PNJ_PAY_REGULASI' => $this->PNJ_PAY_REGULASI,
            'PNJ_PAY_MONTH' => $this->PNJ_PAY_MONTH,
            'PNJ_PAY' => $this->PNJ_PAY,
            'STT' => $this->STT,
        ]);

        $query->andFilterWhere(['like', 'KAR_ID', $this->KAR_ID])
            ->andFilterWhere(['like', 'PNJ_NM', $this->PNJ_NM])
            ->andFilterWhere(['like', 'KET', $this->KET]);

        return $dataProvider;
    }
}
