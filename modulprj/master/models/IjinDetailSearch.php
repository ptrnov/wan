<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\IjinDetail;

/**
 * IjinDetailSearch represents the model behind the search form about `modulprj\master\models\IjinDetail`.
 */
class IjinDetailSearch extends IjinDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'IJN_ID'], 'integer'],
            [['KAR_ID', 'IJN_SDATE', 'IJN_EDATE', 'IJN_NOTE'], 'safe'],
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
        $query = IjinDetail::find();

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
            'IJN_SDATE' => $this->IJN_SDATE,
            'IJN_EDATE' => $this->IJN_EDATE,
            'IJN_ID' => $this->IJN_ID,
        ]);

        $query->andFilterWhere(['like', 'KAR_ID', $this->KAR_ID])
            ->andFilterWhere(['like', 'IJN_NOTE', $this->IJN_NOTE]);

        return $dataProvider;
    }
}