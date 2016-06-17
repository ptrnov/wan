<?php

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\master\models\TimetableOvertime;

/**
 * TimetableOvertimeSearch represents the model behind the search form about `modulprj\master\models\TimetableOvertime`.
 */
class TimetableOvertimeSearch extends TimetableOvertime
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TT_ID', 'TT_GRP_ID', 'TT_TYP_KTG', 'TT_SDAYS', 'TT_EDAYS', 'TT_ACTIVE', 'RULE_DURATION', 'RULE_FRK_DAY', 'KOMPENSASI'], 'integer'],
            [['TT_TYP', 'TT_SDATE', 'TT_EDATE', 'TT_NOTE', 'TT_UPDT', 'RULE_IN', 'RULE_OUT', 'RULE_TOL_IN', 'RULE_TOL_OUT', 'RULE_BRK_OUT', 'RULE_BRK_IN', 'RULE_DRT_OT_DPN', 'RULE_DRT_OT_BLK', 'LEV1_FOT_MAX_TIME', 'LEV2_FOT_MAX_TIME', 'LEV3_FOT_MAX_TIME'], 'safe'],
            [['LEV1_FOT_HALF', 'LEV1_FOT_HOUR', 'LEV1_FOT_MAX', 'LEV2_FOT_HALF', 'LEV2_FOT_HOUR', 'LEV2_FOT_MAX', 'LEV3_FOT_HALF', 'LEV3_FOT_HOUR', 'LEV3_FOT_MAX'], 'number'],
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
        $query = TimetableOvertime::find();

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
            'TT_ID' => $this->TT_ID,
            'TT_GRP_ID' => $this->TT_GRP_ID,
            'TT_TYP_KTG' => $this->TT_TYP_KTG,
            'TT_SDAYS' => $this->TT_SDAYS,
            'TT_EDAYS' => $this->TT_EDAYS,
            'TT_SDATE' => $this->TT_SDATE,
            'TT_EDATE' => $this->TT_EDATE,
            'TT_UPDT' => $this->TT_UPDT,
            'TT_ACTIVE' => $this->TT_ACTIVE,
            'RULE_IN' => $this->RULE_IN,
            'RULE_OUT' => $this->RULE_OUT,
            'RULE_TOL_IN' => $this->RULE_TOL_IN,
            'RULE_TOL_OUT' => $this->RULE_TOL_OUT,
            'RULE_BRK_OUT' => $this->RULE_BRK_OUT,
            'RULE_BRK_IN' => $this->RULE_BRK_IN,
            'RULE_DRT_OT_DPN' => $this->RULE_DRT_OT_DPN,
            'RULE_DRT_OT_BLK' => $this->RULE_DRT_OT_BLK,
            'RULE_DURATION' => $this->RULE_DURATION,
            'RULE_FRK_DAY' => $this->RULE_FRK_DAY,
            'LEV1_FOT_HALF' => $this->LEV1_FOT_HALF,
            'LEV1_FOT_HOUR' => $this->LEV1_FOT_HOUR,
            'LEV1_FOT_MAX' => $this->LEV1_FOT_MAX,
            'LEV1_FOT_MAX_TIME' => $this->LEV1_FOT_MAX_TIME,
            'LEV2_FOT_HALF' => $this->LEV2_FOT_HALF,
            'LEV2_FOT_HOUR' => $this->LEV2_FOT_HOUR,
            'LEV2_FOT_MAX' => $this->LEV2_FOT_MAX,
            'LEV2_FOT_MAX_TIME' => $this->LEV2_FOT_MAX_TIME,
            'LEV3_FOT_HALF' => $this->LEV3_FOT_HALF,
            'LEV3_FOT_HOUR' => $this->LEV3_FOT_HOUR,
            'LEV3_FOT_MAX' => $this->LEV3_FOT_MAX,
            'LEV3_FOT_MAX_TIME' => $this->LEV3_FOT_MAX_TIME,
            'KOMPENSASI' => $this->KOMPENSASI,
        ]);

        $query->andFilterWhere(['like', 'TT_TYP', $this->TT_TYP])
            ->andFilterWhere(['like', 'TT_NOTE', $this->TT_NOTE]);

        return $dataProvider;
    }
}
