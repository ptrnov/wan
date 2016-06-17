<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\FormulaOvertime;

/**
 * FormulaOvertimeSearch represents the model behind the search form about `modulprj\master\models\FormulaOvertime`.
 */
class FormulaOvertimeSearch extends FormulaOvertime
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FOT_ID', 'TT_GRP_ID'], 'integer'],
            [['FOT_NM', 'FOT_JAM1', 'FOT_JAM2'], 'safe'],
            [['FOT_PERSEN'], 'number'],
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
        $query = FormulaOvertime::find();

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
            'FOT_ID' => $this->FOT_ID,
            'TT_GRP_ID' => $this->TT_GRP_ID,
            'FOT_JAM1' => $this->FOT_JAM1,
            'FOT_JAM2' => $this->FOT_JAM2,
            'FOT_PERSEN' => $this->FOT_PERSEN,
        ]);

        $query->andFilterWhere(['like', 'FOT_NM', $this->FOT_NM]);

        return $dataProvider;
    }
}
