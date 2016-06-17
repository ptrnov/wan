<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\TimetableGroup;

/**
 * TimetableGroupSearch represents the model behind the search form about `modulprj\master\models\TimetableGroup`.
 */
class TimetableGroupSearch extends TimetableGroup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TT_GRP_ID', 'TT_GRP_STT'], 'integer'],
            [['TT_GRP_NM', 'TT_GRP_DEF'], 'safe'],
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
        $query = TimetableGroup::find();

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
            'TT_GRP_ID' => $this->TT_GRP_ID,
            'TT_GRP_STT' => $this->TT_GRP_STT,
        ]);

        $query->andFilterWhere(['like', 'TT_GRP_NM', $this->TT_GRP_NM])
            ->andFilterWhere(['like', 'TT_GRP_DEF', $this->TT_GRP_DEF]);

        return $dataProvider;
    }
}
