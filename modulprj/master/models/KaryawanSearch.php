<?php
/**
 * NOTE: Nama Class harus diawali Hurup Besar
 * Server Linux 	: hurup besar/kecil bermasalah -case sensitif-
 * Server Windows 	: hurup besar/kecil tidak bermasalah
 * Author: -ptr.nov-
*/

namespace modulprj\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Author -ptr.nov- Employe Search
 */
class KaryawanSearch extends Karyawan
{
	 /* [1] PUBLIC ALIAS TABLE*/
   
	//	[2] RELATED ATTRIBUTE JOIN TABLE

	public function attributes()
	{
		//Author -ptr.nov- add related fields to searchable attributes
       return array_merge(parent::attributes(), ['golonganOne.TT_GRP_NM','cabNm','depNm','gfNm','gradingNm','stsKerjaNm','timeTableNm']);
    }


	/*	[3] FILTER */
    public function rules()
    {
        return [
            [['KAR_ID', 'KAR_NM','KAR_TGLM','KAR_TGLK','golonganOne.TT_GRP_NM'], 'safe'],
            [['cabNm','depNm','gfNm','gradingNm','stsKerjaNm','timeTableNm'], 'safe'],
        ];
    }
	
	//	[4] SCNARIO
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
	
	//	[5] SEARCH dataProvider -> SHOW GRIDVIEW
    public function search($params)
    {	
		// [5.1] JOIN TABLE
		$query = Karyawan::find()
                         ->JoinWith('deptOne',true,'left JOIN')
                         ->JoinWith('cabOne',true,'left JOIN')
						 ->JoinWith('stsOne',true,'left JOIN')
						 ->JoinWith('gfOne',true,'left JOIN')
						 ->JoinWith('gradingOne',true,'left JOIN')
						 ->JoinWith('timetablegroupOne',true,'left JOIN')
						 ->where('karyawan.KAR_STS<>3');
	    $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'pagination' => [
				'pageSize' => 100,
			],
        ]);
		
		// SORTING Department Author -ptr.nov-
		$dataProvider->sort->attributes['depNm'] = [
			'asc' => ['departemen.DEP_NM' => SORT_ASC],
			'desc' => ['departemen.DEP_NM' => SORT_DESC],
		];
		// SORTING CABANG Author -ptr.nov-
		$dataProvider->sort->attributes['cabNm'] = [
			'asc' => ['cabang.CAB_NM' => SORT_ASC],
			'desc' => ['cabang.CAB_NM' => SORT_DESC],
		];

		// SORTING KEPANGKATAN  Author -ptr.nov-
		 $dataProvider->sort->attributes['gfNm'] = [	
			'asc' => ['kepangkatan.GF_NM' => SORT_ASC],
			'desc' => ['kepangkatan.GF_NM' => SORT_DESC],
		]; 
		
		// SORTING GRADING  Author -ptr.nov-
		 $dataProvider->sort->attributes['gradingNm'] = [	
			'asc' => ['grading.JOBGRADE_NM' => SORT_ASC],
			'desc' => ['grading.JOBGRADE_NM' => SORT_DESC],
		]; 

		 // SORTING STATUS Author -ptr.nov-
		 $dataProvider->sort->attributes['stsKerjaNm'] = [
			 'asc' => ['kar_stt.KAR_STS_NM' => SORT_ASC],
			 'desc' => ['kar_stt.KAR_STS_NM' => SORT_DESC],
		 ];
		// SORTING STATUS Author -ptr.nov-
		$dataProvider->sort->attributes['timeTableNm'] = [
			'asc' => ['timetable_grp.TT_GRP_NM' => SORT_ASC],
			'desc' => ['timetable_grp.TT_GRP_NM' => SORT_DESC],
		];

		// [5.3] LOAD VALIDATION PARAMS
		//LOAD FARM VER 1
		$this->load($params);
		if (!$this->validate()) {
			return $dataProvider;
		}
		/*
		///LOAD FARM VER 2
		// if (!($this->load($params) && $this->validate()))
		//return $dataProvider;		
		*/
		//[5.4] FILTER WHERE LIKE (string/integer)
			// FILTER COLUMN Author -ptr.nov-
			 $query->andFilterWhere(['like', 'KAR_ID', $this->KAR_ID])
					->andFilterWhere(['like', 'KAR_NM', $this->KAR_NM])
                    ->andFilterWhere(['like', 'timetable_grp.TT_GRP_ID', $this->getAttribute('timeTableNm')])
                    ->andFilterWhere(['like', 'departemen.DEP_ID', $this->getAttribute('depNm')])
                    ->andFilterWhere(['like', 'cabang.CAB_ID', $this->getAttribute('cabNm')])
                    ->andFilterWhere(['like', 'kepangkatan.GF_ID', $this->getAttribute('gfNm')])
                    ->andFilterWhere(['like', 'grading.JOBGRADE_ID', $this->getAttribute('gradingNm')])
                    ->andFilterWhere(['like', 'kar_stt.KAR_STS_ID',$this->getAttribute('stsKerjaNm')]);


		//[5.4] FILTER WHERE LIKE (date)
			// FILTER COLUMN DATE RANGE Author -ptr.nov-
			if(isset($this->KAR_TGLM) && $this->KAR_TGLM!=''){
				$date_explode = explode("-", $this->KAR_TGLM);
				$date1 = trim($date_explode[0]);
				$date2= trim($date_explode[1]);
				$query->andFilterWhere(['between', 'karyawan.KAR_TGLM', $date1,$date2]);
			}
            if(isset($this->KAR_TGLK) && $this->KAR_TGLK!=''){
                $date_explode = explode("-", $this->KAR_TGLK);
                $date1 = trim($date_explode[0]);
                $date2= trim($date_explode[1]);
                $query->andFilterWhere(['between', 'karyawan.KAR_TGLK', $date1,$date2]);
            }
        return $dataProvider;
    }

    public function searchresign($params)
    {
        // [5.1] JOIN TABLE
        $query = Karyawan::find()
						->JoinWith('deptOne',true,'left JOIN')
                         ->JoinWith('cabOne',true,'left JOIN')
						 ->JoinWith('stsOne',true,'left JOIN')
						 ->JoinWith('gfOne',true,'left JOIN')
						 ->JoinWith('gradingOne',true,'left JOIN')
						 ->JoinWith('timetablegroupOne',true,'left JOIN')
						 ->where('karyawan.KAR_STS=3');
						 
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        // SORTING Department Author -ptr.nov-
		$dataProvider->sort->attributes['depNm'] = [
			'asc' => ['departemen.DEP_NM' => SORT_ASC],
			'desc' => ['departemen.DEP_NM' => SORT_DESC],
		];
		// SORTING CABANG Author -ptr.nov-
		$dataProvider->sort->attributes['cabNm'] = [
			'asc' => ['cabang.CAB_NM' => SORT_ASC],
			'desc' => ['cabang.CAB_NM' => SORT_DESC],
		];

		// SORTING KEPANGKATAN Author -ptr.nov-
		 $dataProvider->sort->attributes['gfNm'] = [	
			'asc' => ['kepangkatan.GF_NM' => SORT_ASC],
			'desc' => ['kepangkatan.GF_NM' => SORT_DESC],
		]; 

		// SORTING GRADING  Author -ptr.nov-
		 $dataProvider->sort->attributes['gradingNm'] = [	
			'asc' => ['grading.JOBGRADE_NM' => SORT_ASC],
			'desc' => ['grading.JOBGRADE_NM' => SORT_DESC],
		]; 
		
		 // SORTING STATUS Author -ptr.nov-
		 $dataProvider->sort->attributes['stsKerjaNm'] = [
			 'asc' => ['kar_stt.KAR_STS_NM' => SORT_ASC],
			 'desc' => ['kar_stt.KAR_STS_NM' => SORT_DESC],
		 ];
		// SORTING STATUS Author -ptr.nov-
		$dataProvider->sort->attributes['timeTableNm'] = [
			'asc' => ['timetable_grp.TT_GRP_NM' => SORT_ASC],
			'desc' => ['timetable_grp.TT_GRP_NM' => SORT_DESC],
		];

		// [5.3] LOAD VALIDATION PARAMS
		//LOAD FARM VER 1
		$this->load($params);
		if (!$this->validate()) {
			return $dataProvider;
		}
		/*
		///LOAD FARM VER 2
		// if (!($this->load($params) && $this->validate()))
		//return $dataProvider;		
		*/
		//[5.4] FILTER WHERE LIKE (string/integer)
			// FILTER COLUMN Author -ptr.nov-
			 $query->andFilterWhere(['like', 'KAR_ID', $this->KAR_ID])
					->andFilterWhere(['like', 'KAR_NM', $this->KAR_NM])
                    ->andFilterWhere(['like', 'timetable_grp.TT_GRP_ID', $this->getAttribute('timeTableNm')])
                    ->andFilterWhere(['like', 'departemen.DEP_ID', $this->getAttribute('depNm')])
                    ->andFilterWhere(['like', 'cabang.CAB_ID', $this->getAttribute('cabNm')])
                    ->andFilterWhere(['like', 'kepangkatan.GF_ID', $this->getAttribute('gfNm')])
					->andFilterWhere(['like', 'grading.JOBGRADE_ID', $this->getAttribute('gradingNm')])
                    ->andFilterWhere(['like', 'kar_stt.KAR_STS_ID',$this->getAttribute('stsKerjaNm')]);


		//[5.4] FILTER WHERE LIKE (date)
			// FILTER COLUMN DATE RANGE Author -ptr.nov-
			if(isset($this->KAR_TGLM) && $this->KAR_TGLM!=''){
				$date_explode = explode("-", $this->KAR_TGLM);
				$date1 = trim($date_explode[0]);
				$date2= trim($date_explode[1]);
				$query->andFilterWhere(['between', 'karyawan.KAR_TGLM', $date1,$date2]);
			}
            if(isset($this->KAR_TGLK) && $this->KAR_TGLK!=''){
                $date_explode = explode("-", $this->KAR_TGLK);
                $date1 = trim($date_explode[0]);
                $date2= trim($date_explode[1]);
                $query->andFilterWhere(['between', 'karyawan.KAR_TGLK', $date1,$date2]);
            }
        return $dataProvider;
    }
	
	 public function search_empid($Emp_Id)
    {
        $query = Karyawan::find()
            //->JoinWith('corpOne',true,'LEFT JOIN')
           // ->JoinWith('deptOne',true,'left JOIN')
			//->JoinWith('deptsub',true,'left JOIN')	
			//->JoinWith('groupfunction',true,'left JOIN')
			//->JoinWith('groupseqmen',true,'left JOIN')			
            //->JoinWith('jobgrade',true,'left JOIN')
            //->JoinWith('sttOne',true,'left JOIN')				
            ->where("KAR_ID='". $Emp_Id . "'");
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
    }


}
