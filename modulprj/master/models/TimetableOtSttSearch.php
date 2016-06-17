<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\TimetableOtStt;

/**
 * TimetableOtSttSearch represents the model behind the search form about `modulprj\master\models\TimetableOtStt`.
 */
class TimetableOtSttSearch extends TimetableOtStt
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STT_OT_DPN'], 'integer'],
            [['STT_OT_DPN_NM'], 'safe'],
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
        $query = TimetableOtStt::find();

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
            'STT_OT_DPN' => $this->STT_OT_DPN,
        ]);

        $query->andFilterWhere(['like', 'STT_OT_DPN_NM', $this->STT_OT_DPN_NM]);

        return $dataProvider;
    }
}
