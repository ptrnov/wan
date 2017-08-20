<?php

namespace modulprj\sistem\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\debug\components\search\Filter;
use yii\debug\components\search\matchers;


use lukisongroup\hrd\models\Personallog;

/**
 * PersonallogSearch represents the model behind the search form about `lukisongroup\hrd\models\Personallog`.
 */
class UserOptionLogin extends Model
{	
	public $id;
	
    /**
     * @inheritdoc	
     */
    public function rules()
    {
        return [
            [['id'], 'safe'],
        ];
    }

  	/*
	 * SISTEM USER LOGIN DATA
	 * @author ptrnov [piter@lukison.com]
	 * @since 1.2
	 *
	*/
	
    public function searchDataLogin($params){
		//$dailyAbsensi= Yii::$app->db->createCommand("CALL SISTEM_login_option")->queryAll();  
		$dailyAbsensi= Yii::$app->db->createCommand("
			SELECT DISTINCT *,
				(CASE WHEN x2.GF_ID<>'' THEN (SELECT GF_NM FROM kepangkatan WHERE GF_ID=x2.GF_ID LIMIT 1) ELSE 'none' END) AS GF_NM,
				(CASE WHEN x2.JOBGRADE_ID<>'' THEN (SELECT JOBGRADE_NM FROM grading WHERE JOBGRADE_ID=x2.JOBGRADE_ID LIMIT 1) ELSE 'none' END) AS GRADING_NM,
				(CASE WHEN x2.DEP_ID<>'' THEN (SELECT DEP_NM FROM departemen WHERE DEP_ID=x2.DEP_ID LIMIT 1) ELSE 'none' END) AS DEP_NM,
				(CASE WHEN x2.CAB_ID<>'' THEN (SELECT CAB_NM FROM cabang WHERE CAB_ID=x2.CAB_ID LIMIT 1) ELSE 'none' END) AS CAB_NM,
				(CASE WHEN x2.KAR_STS<>'' THEN (SELECT KAR_STS_NM FROM kar_stt WHERE KAR_STS_ID=x2.KAR_STS LIMIT 1) ELSE 'none' END) AS KAR_STS_NM,
				 x2.JOBGRADE_ID as Title,
				  DATE_FORMAT(x2.KAR_TGLM,'%d-%m-%Y') as JoinDate
			FROM user x1 RIGHT JOIN karyawan x2 ON x2.KAR_ID=x1.EMP_ID
			WHERE EMP_ID <>''
		")->queryAll();  
		$dataProvider= new ArrayDataProvider([
			'key' => 'id',
			'allModels'=>$dailyAbsensi,			
			'pagination' => [
				'pageSize' => 20,
			]
		]);
		if (!($this->load($params) && $this->validate())) {
 			return $dataProvider;
 		}
		
		$filter = new Filter();
 		$this->addCondition($filter, 'id', true);
 		//$this->addCondition($filter, 'EMP_NM', true);	
 		$dataProvider->allModels = $filter->filter($dailyAbsensi);
		
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
