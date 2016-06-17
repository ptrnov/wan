<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\PayrollAsuransi;

/**
 * PayrollAsuransiSearch represents the model behind the search form about `modulprj\master\models\PayrollAsuransi`.
 */
class PayrollAsuransiSearch extends PayrollAsuransi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KAR_ID'], 'integer'],
            [['sDate', 'eDate', 'ASR_NM'], 'safe'],
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
        $query = PayrollAsuransi::find();

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
            'sDate' => $this->sDate,
            'eDate' => $this->eDate,
            'ASR_PAY_MONTH' => $this->ASR_PAY_MONTH,
        ]);

        $query->andFilterWhere(['like', 'ASR_NM', $this->ASR_NM]);

        return $dataProvider;
    }
}
