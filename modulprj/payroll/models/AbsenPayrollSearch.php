<?php

namespace modulprj\payroll\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\debug\components\search\Filter;
use yii\debug\components\search\matchers;

use modulprj\payroll\models\AbsenPayroll;


/**
 * AbsenImportSearch represents the model behind the search form about `modulprj\payroll\models\AbsenImport`.
 */
class AbsenPayrollSearch extends AbsenPayroll
{
	public $tglStart;
	public $tglEnd;
	 /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'GRP_ID', 'STATUS'], 'integer'],
			[['tglStart','tglEnd'],'safe'],
            [['TERMINAL_ID', 'FINGER_ID', 'MESIN_NM', 'KAR_ID', 'KAR_NM', 'DEP_ID', 'DEP_NM', 'HARI', 'IN_TGL', 'IN_WAKTU', 'OUT_TGL', 'OUT_WAKTU', 'CREATE_BY', 'CREATE_AT', 'UPDATE_BY', 'UPDATE_AT', 'DCRP_DETIL'], 'safe'],
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
	* SEARCH HEADER [GROUPING KARYAWAN ID].
	* CLOSING STATMENT PER-WEEK
	*/
	public function searchHeader($params)
    {
		//$sql="call NEW_RPT_FROMAT('2017-09-07','2017-09-14')";
		$sql="call NEW_RPT_FROMAT('".date('Y-m-d', strtotime($this->tglStart))."','".date('Y-m-d', strtotime($this->tglEnd))."')";
		//$sql="call NEW_RPT_FROMAT('".$this->tglStart."','".$this->tglEnd."')";
		$qrySql= Yii::$app->db->createCommand($sql)->queryAll(); 		
		$dataProvider= new ArrayDataProvider([
			'allModels'=>$qrySql,			
		]);
		
		if (!($this->load($params) && $this->validate())) {
 			return $dataProvider;
 		}
		
		// print_r($dataProvider);
		// die(); 
		
		$filter = new Filter();
 		$this->addCondition($filter, 'KAR_ID', true);
 		//$this->addCondition($filter, 'EMP_NM', true);	
 		$dataProvider->allModels = $filter->filter($qrySql);
		
        return $dataProvider;
	}
	
	
	
	
	
    /**
     * SEARCH ABSENSI GROUPING
     */
    public function search($params)
    {
        //$query = AbsenPayroll::find();

        // add conditions that should always apply here
		/* $cnt=AbsenPayroll::find()->count();
		
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
        } */
		
		//$cnt=AbsenPayroll::find()->count();
		$sting1="MIN(CASE WHEN DATE_FORMAT(IN_TGL,'%Y-%m-%d') = '";
		$sting2="DATE_FORMAT(x1.TGL_RUN,'%Y-%m-%d')";
		$string31="' THEN VAL_LEMBUR ELSE 0 END) AS 'OT_";
		$string32="THEN VAL_PAGI ELSE 0 END) AS 'PAGI_";
		$strFormat="'%Y-%m-%d'";
		$str1='"';
		$str2="'";
		$sqlStr="
			(".$str1.$sting1.$str1.",
			   DATE_FORMAT(x1.TGL_RUN,".$strFormat."),
			   ".$str1.$string31.$str1.",
			   DATE_FORMAT(x1.TGL_RUN,".$strFormat."),
			   ".$str1.$str2.$str1."														
			)
		";
		
		//$sql="call NEW_RPT_FROMAT()";
		$sql="call NEW_RPT_FROMAT('2017-09-07','2017-09-14')";
		
		// print_r($sql);
		// die();
		$qrySql= Yii::$app->db->createCommand($sql)->queryAll();  
		
		$dataProvider= new ArrayDataProvider([
			'allModels'=>$qrySql,			
			// 'pagination' => [
				// 'pageSize' => 500,
			// ]
		]);
		// print_r($dataProvider);
		// die();
        // grid filtering conditions
        /* $query->andFilterWhere([
            'ID' => $this->ID,
            'IN_TGL' => $this->IN_TGL,
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
            'STATUS' => 0,
        ]);

        $query->andFilterWhere(['like', 'TERMINAL_ID', $this->TERMINAL_ID])
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
		$query->groupBy('KAR_ID'); */
		
		$filter = new Filter();
 		$this->addCondition($filter, 'KAR_ID', true);
 		//$this->addCondition($filter, 'EMP_NM', true);	
 		$dataProvider->allModels = $filter->filter($qrySql);
		
        return $dataProvider;
    }
	
	/**
     * SEARCH ABSENSI: DETAILS
     */
    public function searchdetails($params)
    {
        $query = AbsenPayroll::find();

        // add conditions that should always apply here
		$cnt=AbsenPayroll::find()->count();
		
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
            'IN_TGL' => $this->IN_TGL,
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
            'STATUS' => 1,
        ]);

        $query->andFilterWhere(['like', 'TERMINAL_ID', $this->TERMINAL_ID])
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
		//$query->groupBy('KAR_ID');
        return $dataProvider;
    }
	
	
	public function searchpay($params)
    {
        $query = AbsenPayroll::find();

        // add conditions that should always apply here
		$cnt=AbsenPayroll::find()->count();
		
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
            'IN_TGL' => $this->IN_TGL,
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
            'STATUS' => 1,
        ]);

        $query->andFilterWhere(['like', 'TERMINAL_ID', $this->TERMINAL_ID])
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

        return $dataProvider;
    }
	
	
	
	public function addCondition(Filter $filter, $attribute, $partial = false)
    {
        $value = $this->$attribute;

        if (mb_strpos($value, '>') !== false) {
            $value = intval(str_replace('>', '', $value));
            $filter->addMatcher($attribute, new matchers\GreaterThan(['value' => $value]));

        } elseif (mb_strpos($value, '<') !== false) {
            $value = intval(str_replace('<', '', $value));
            $filter->addMatcher($attribute, new matchers\LowerThan(['value' => $value]));
        } else {
            $filter->addMatcher($attribute, new matchers\SameAs(['value' => $value, 'partial' => $partial]));
        }
    }
}
