<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\Pendidikan;

/**
 * PendidikanSearch represents the model behind the search form about `modulprj\master\models\Pendidikan`.
 */
class PendidikanSearch extends Pendidikan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PEN_ID'], 'integer'],
            [['PEN_NM', 'USER', 'UPDT'], 'safe'],
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
        $query = Pendidikan::find();

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
            'PEN_ID' => $this->PEN_ID,
            'UPDT' => $this->UPDT,
        ]);

        $query->andFilterWhere(['like', 'PEN_NM', $this->PEN_NM])
            ->andFilterWhere(['like', 'USER', $this->USER]);

        return $dataProvider;
    }
}
