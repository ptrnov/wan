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
	public $MESIN_NM;
	public $DEP_NM;

	/**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'GRP_ID', 'STATUS'], 'integer'],
			[['tglStart','tglEnd'],'safe'],
            [['TERMINAL_ID', 'FINGER_ID', 'MESIN_NM', 'KAR_ID', 'KAR_NM', 'DEP_ID', 'DEP_NM', 'HARI', 'IN_TGL', 'IN_WAKTU', 'OUT_TGL', 'OUT_WAKTU', 'CREATE_BY', 'CREATE_AT', 'UPDATE_BY', 'UPDATE_AT', 'DCRP_DETIL'], 'safe'],
            [['PAY_DAY', 'VAL_PAGI', 'VAL_LEMBUR', 'PAY_PAGI', 'PAY_LEMBUR','STT_LEMBUR'], 'number'],
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
		$sql="call NEW_RPT_FROMAT_PAYROLL('".date('Y-m-d', strtotime($this->tglStart))."','".date('Y-m-d', strtotime($this->tglEnd))."')";
		//$sql="call NEW_RPT_FROMAT('".$this->tglStart."','".$this->tglEnd."')";
		$qrySql= Yii::$app->db->createCommand($sql)->queryAll(); 		
		$dataProvider= new ArrayDataProvider([
			'allModels'=>$qrySql,	
			'pagination' => [
				'pageSize' =>50,
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
 		$this->addCondition($filter, 'MESIN_NM', true);	
 		$this->addCondition($filter, 'DEP_NM', true);	
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
