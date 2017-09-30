<?php

namespace modulprj\payroll\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\debug\components\search\Filter;
use yii\debug\components\search\matchers;

use modulprj\payroll\models\AbsenPaid;

class AbsenPayrollPrintSearch extends AbsenPaid
{
	public $tglStart;
	public $tglEnd;
	Public $aryKarID;

	/**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'GRP_ID', 'STATUS'], 'integer'],
			[['tglStart','tglEnd','aryKarID'],'safe'],
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
	public function searchPrint($params)
    {
		// print_r($aryKarID);
		// die();
		//$aryKarID="('3.0915.0001','3.0915.0002','3.0915.0004')";
		$aryKar=$this->aryKarID!=''?$this->aryKarID:"('')";
		$sql='call NEW_RPT_FROMAT_PRINT("'.date("Y-m-d", strtotime($this->tglStart)).'","'.date("Y-m-d", strtotime($this->tglEnd)).'","'.$aryKar.'")';
		//$sql="call NEW_RPT_FROMAT('".$this->tglStart."','".$this->tglEnd."')";
		$qrySql= Yii::$app->db->createCommand($sql)->queryAll(); 		
		$dataProvider= new ArrayDataProvider([	
			'allModels'=>$qrySql,	
			'pagination' => [
				'pageSize' =>1000,
			],			
		]);
		
		if (!($this->load($params) && $this->validate())) {
 			return $dataProvider;
 		}
		
		// print_r($dataProvider);
		// die(); 
		
		$filter = new Filter();
 		$this->addCondition($filter, 'KAR_ID', true);
 		$this->addCondition($filter, 'KAR_NM', true);	
 		$this->addCondition($filter, 'DEP_NM', true);	
		$this->addCondition($filter, 'STATUS', true);	
 		$dataProvider->allModels = $filter->filter($qrySql);
		
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