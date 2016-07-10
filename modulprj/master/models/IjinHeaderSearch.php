<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\IjinHeader;

/**
 * IjinHeaderSearch represents the model behind the search form about `modulprj\master\models\IjinHeader`.
 */
class IjinHeaderSearch extends IjinHeader
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IJN_ID'], 'integer'],
            [['IIJN_NM', 'IJIN_KET'], 'safe'],
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
        $query = IjinHeader::find()->orderBy(['IJN_ID'=>SORT_DESC]);

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
            'IJN_ID' => $this->IJN_ID,
        ]);

        $query->andFilterWhere(['like', 'IIJN_NM', $this->IIJN_NM])
            ->andFilterWhere(['like', 'IJIN_KET', $this->IJIN_KET]);

        return $dataProvider;
    }
}
