<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\HariLibur;

/**
 * HariLiburSearch represents the model behind the search form about `modulprj\master\models\HariLibur`.
 */
class HariLiburSearch extends HariLibur
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LBR_ID'], 'integer'],
            [['TAHUN', 'LBR_SDATE', 'LBR_EDATE', 'LBR_NM'], 'safe'],
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
        $query = HariLibur::find();

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
            'LBR_ID' => $this->LBR_ID,
            'LBR_SDATE' => $this->LBR_SDATE,
            'LBR_EDATE' => $this->LBR_EDATE,
        ]);

        $query->andFilterWhere(['like', 'TAHUN', $this->TAHUN])
            ->andFilterWhere(['like', 'LBR_NM', $this->LBR_NM]);

        return $dataProvider;
    }
}
