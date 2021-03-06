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
            [['TT_SDATE', 'TT_EDATE', 'TT_NOTE', 'TT_UPDT', 'RULE_IN', 'RULE_OUT','LEV1_FOT_MAX_TIME'], 'safe'],
            [['LEV1_FOT_HALF', 'LEV1_FOT_HOUR', 'LEV1_FOT_MAX'], 'number'],
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
        $query = TimetableOvertime::find()->orderBy(['TT_GRP_ID'=>'ASC','TT_TYP_KTG'=>'ASC']);

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
            'RULE_DURATION' => $this->RULE_DURATION,
            'RULE_FRK_DAY' => $this->RULE_FRK_DAY,
            'LEV1_FOT_HALF' => $this->LEV1_FOT_HALF,
            'LEV1_FOT_HOUR' => $this->LEV1_FOT_HOUR,
            'LEV1_FOT_MAX' => $this->LEV1_FOT_MAX,
            'LEV1_FOT_MAX_TIME' => $this->LEV1_FOT_MAX_TIME,            
            'KOMPENSASI' => $this->KOMPENSASI,
        ]);

      
        return $dataProvider;
    }
}
