<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\TimetableKategori;

/**
 * TimetableKategoriSearch represents the model behind the search form about `modulprj\master\models\TimetableKategori`.
 */
class TimetableKategoriSearch extends TimetableKategori
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TT_TYPE_KTG'], 'integer'],
            [['TT_TYPE'], 'safe'],
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
        $query = TimetableKategori::find();

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
            'TT_TYPE_KTG' => $this->TT_TYPE_KTG,
        ]);

        $query->andFilterWhere(['like', 'TT_TYPE', $this->TT_TYPE]);

        return $dataProvider;
    }
}
