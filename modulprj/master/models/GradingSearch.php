<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\Grading;

/**
 * GradingSearch represents the model behind the search form about `modulprj\master\models\Grading`.
 */
class GradingSearch extends Grading
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'JOBGRADE_STS'], 'integer'],
            [['GF_ID', 'JOBGRADE_ID', 'JOBGRADE_NM', 'JOBGRADE_DCRP', 'CREATED_BY', 'UPDATED_BY', 'UPDATED_TIME'], 'safe'],
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
        $query = Grading::find()->orderby(['JOBGRADE_ID'=>SORT_ASC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
            'JOBGRADE_STS' => $this->JOBGRADE_STS,
            'UPDATED_TIME' => $this->UPDATED_TIME,
        ]);

        $query->andFilterWhere(['like', 'GF_ID', $this->GF_ID])
            ->andFilterWhere(['like', 'JOBGRADE_ID', $this->JOBGRADE_ID])
            ->andFilterWhere(['like', 'JOBGRADE_NM', $this->JOBGRADE_NM])
            ->andFilterWhere(['like', 'JOBGRADE_DCRP', $this->JOBGRADE_DCRP])
            ->andFilterWhere(['like', 'CREATED_BY', $this->CREATED_BY])
            ->andFilterWhere(['like', 'UPDATED_BY', $this->UPDATED_BY]);

        return $dataProvider;
    }
}
