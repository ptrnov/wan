<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\TimetableLevel;

/**
 * TimetableLevelSearch represents the model behind the search form about `modulprj\master\models\TimetableLevel`.
 */
class TimetableLevelSearch extends TimetableLevel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LVL_ID'], 'integer'],
            [['LVL_NM'], 'safe'],
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
        $query = TimetableLevel::find();

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
            'LVL_ID' => $this->LVL_ID,
        ]);

        $query->andFilterWhere(['like', 'LVL_NM', $this->LVL_NM]);

        return $dataProvider;
    }
}
