<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\PayrollLoanDetail;

/**
 * PayrollLoanDetailSearch represents the model behind the search form about `modulprj\master\models\PayrollLoanDetail`.
 */
class PayrollLoanDetailSearch extends PayrollLoanDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KAR_ID', 'PNJ_FLT'], 'integer'],
            [['TGL', 'PNJ_NM'], 'safe'],
            [['PNJ_PAY'], 'number'],
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
        $query = PayrollLoanDetail::find();

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
            'KAR_ID' => $this->KAR_ID,
            'TGL' => $this->TGL,
            'PNJ_PAY' => $this->PNJ_PAY,
            'PNJ_FLT' => $this->PNJ_FLT,
        ]);

        $query->andFilterWhere(['like', 'PNJ_NM', $this->PNJ_NM]);

        return $dataProvider;
    }
}
