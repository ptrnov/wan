<?php

namespace modulprj\absensi\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use modulprj\absensi\models\AbsenImport;

/**
 * AbsenImportSearch represents the model behind the search form about `modulprj\absensi\models\AbsenImport`.
 */
class AbsenImportSearch extends AbsenImport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'GRP_ID', 'STATUS'], 'integer'],
            [['TERMINAL_ID', 'FINGER_ID', 'MESIN_NM', 'KAR_ID', 'KAR_NM', 'DEP_ID', 'DEP_NM', 'HARI', 'IN_TGL', 'IN_WAKTU', 'OUT_TGL', 'OUT_WAKTU', 'CREATE_BY', 'CREATE_AT', 'UPDATE_BY', 'UPDATE_AT', 'DCRP_DETIL','STT_LEMBUR','LEBIH_WAKTU'], 'safe'],
            [['PAY_DAY', 'VAL_PAGI', 'VAL_LEMBUR', 'PAY_PAGI', 'PAY_LEMBUR'], 'number'],
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
		$modelPrd=AbsenImportPeriode::find()->where(['TIPE'=>'0','AKTIF'=>'1'])->one();
        $query = AbsenImport::find()->andWhere('STATUS<>2');

        // add conditions that should always apply here
		$cnt=AbsenImport::find()->count();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'pagination' => [
				 'pageSize' => $cnt,
			]
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
            //'IN_TGL' => $this->IN_TGL,
            'IN_WAKTU' => $this->IN_WAKTU,
            'OUT_TGL' => $this->OUT_TGL,
            'OUT_WAKTU' => $this->OUT_WAKTU,
            'GRP_ID' => $this->GRP_ID,
            'PAY_DAY' => $this->PAY_DAY,
            'VAL_PAGI' => $this->VAL_PAGI,
            'VAL_LEMBUR' => $this->VAL_LEMBUR,
            'PAY_PAGI' => $this->PAY_PAGI,
            'PAY_LEMBUR' => $this->PAY_LEMBUR,
            'CREATE_AT' => $this->CREATE_AT,
            'UPDATE_AT' => $this->UPDATE_AT,
            'STATUS' => $this->STATUS,
        ]);

        $query->andFilterWhere(['like', 'TERMINAL_ID', $this->TERMINAL_ID])
			->andFilterWhere(['between', 'IN_TGL', $modelPrd->TGL_START, $modelPrd->TGL_END])
            ->andFilterWhere(['like', 'FINGER_ID', $this->FINGER_ID])
            ->andFilterWhere(['like', 'MESIN_NM', $this->MESIN_NM])
            ->andFilterWhere(['like', 'KAR_ID', $this->KAR_ID])
            ->andFilterWhere(['like', 'KAR_NM', $this->KAR_NM])
            ->andFilterWhere(['like', 'DEP_ID', $this->DEP_ID])
            ->andFilterWhere(['like', 'DEP_NM', $this->DEP_NM])
            ->andFilterWhere(['like', 'HARI', $this->HARI])
            ->andFilterWhere(['like', 'CREATE_BY', $this->CREATE_BY])
            ->andFilterWhere(['like', 'UPDATE_BY', $this->UPDATE_BY])
            ->andFilterWhere(['like', 'DCRP_DETIL', $this->DCRP_DETIL]);
		 //$query->orderBy(['IN_TGL'=>SORT_DESC]);
		 $query->orderBy(['KAR_NM'=>SORT_ASC,'IN_TGL'=>SORT_ASC]);
        return $dataProvider;
    }
}
