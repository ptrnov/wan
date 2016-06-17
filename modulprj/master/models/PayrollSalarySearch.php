<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\PayrollSalary;

/**
 * PayrollSalarySearch represents the model behind the search form about `modulprj\master\models\PayrollSalary`.
 */
class PayrollSalarySearch extends PayrollSalary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'STATUS_ACTIVE'], 'integer'],
            [['KAR_ID'], 'safe'],
            [['PAY_DAY', 'PAY_MONTH', 'PAY_TUNJANGAN', 'PAY_TRANPORT', 'PAY_EAT', 'BONUS', 'PAY_ENTERTAIN'], 'number'],
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
        $query = PayrollSalary::find();

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
            'PAY_DAY' => $this->PAY_DAY,
            'PAY_MONTH' => $this->PAY_MONTH,
            'PAY_TUNJANGAN' => $this->PAY_TUNJANGAN,
            'PAY_TRANPORT' => $this->PAY_TRANPORT,
            'PAY_EAT' => $this->PAY_EAT,
            'BONUS' => $this->BONUS,
            'PAY_ENTERTAIN' => $this->PAY_ENTERTAIN,
            'STATUS_ACTIVE' => $this->STATUS_ACTIVE,
        ]);

        $query->andFilterWhere(['like', 'KAR_ID', $this->KAR_ID]);

        return $dataProvider;
    }
}
