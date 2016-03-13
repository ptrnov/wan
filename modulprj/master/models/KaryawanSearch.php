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
    public $deptOne;
    public $cabOne;
    public $jabOne;
    public $stsOne;
    public $golonganOne;
	
    //public $emp;
     //public $pen;
	 //public $user;
     //public $corpOne;
     //public $sttOne;
	
	//	[2] RELATED ATTRIBUTE JOIN TABLE

	public function attributes()
	{
		//Author -ptr.nov- add related fields to searchable attributes
        //return array_merge(parent::attributes(), ['corpOne.CORP_NM','deptOne.DEP_NM','jabOne.JAB_NM','sttOne.STS_NM']);
        return array_merge(parent::attributes(), ['deptOne.DEP_NM','cabOne.CAB_NM','jabOne.JAB_NM','stsOne.KAR_STS_NM','golonganOne.TT_GRP_NM']);
    }


	/*	[3] FILTER */
    public function rules()
    {
        return [
            [['KAR_ID', 'KAR_NM','KAR_TGLM','KAR_TGLK','golonganOne.TT_GRP_NM'], 'safe'],
			//[['KAR_ID','EMP_CORP_ID'], 'string', 'max' => 10],
			//[['corpOne.CORP_NM','deptOne.DEP_NM','jabOne.JAB_NM','sttOne.STS_NM'], 'safe'],
            // JOIIN ATTRIBUTE --
            [['deptOne.DEP_NM','cabOne.CAB_NM','jabOne.JAB_NM','stsOne.KAR_STS_NM'], 'safe'],
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
						 ->JoinWith('jabOne',true,'left JOIN')
						 ->JoinWith('stsOne',true,'left JOIN')
						 ->JoinWith('golonganOne',true,'left JOIN')
						 ->where('karyawan.KAR_STS<> 3');
						 // SUB JOIN
						//$query->leftJoin(['company'=>$queryCop],'company.CORP_ID=a0001.EMP_CORP_ID');//->orderBy(['company.CORP_ID'=>SORT_ASC]);
						 //->andFilterWhere(['EMP_ID'=>'006']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		/*
		//[5.2] SHORTING
			// SORTING CORPORATE Author -ptr.nov-
			$dataProvider->sort->attributes['corpOne.CORP_NM'] = [
				'asc' => ['a0001.CORP_NM' => SORT_ASC],
				'desc' => ['a0001.CORP_NM' => SORT_DESC],
			];
			// SORTING DEPARTMENT Author -ptr.nov-
		*/
            // SORTING Department Author -ptr.nov-
            $dataProvider->sort->attributes['deptOne.DEP_NM'] = [
                'asc' => ['departemen.DEP_NM' => SORT_ASC],
                'desc' => ['departemen.DEP_NM' => SORT_DESC],
            ];
            // SORTING CABANG Author -ptr.nov-
            $dataProvider->sort->attributes['cabOne.CAB_NM'] = [
                'asc' => ['cabang.CAB_NM' => SORT_ASC],
                'desc' => ['cabang.CAB_NM' => SORT_DESC],
            ];

			// SORTING JABATAN Author -ptr.nov-
			$dataProvider->sort->attributes['jabOne.JAB_NM'] = [	
				'asc' => ['jabatan.JAB_NM' => SORT_ASC],
				'desc' => ['jabatan.JAB_NM' => SORT_DESC],
			];

             // SORTING STATUS Author -ptr.nov-
             $dataProvider->sort->attributes['stsOne.KAR_STS_NM'] = [
                 'asc' => ['kar_stt.KAR_STS_NM' => SORT_ASC],
                 'desc' => ['kar_stt.KAR_STS_NM' => SORT_DESC],
             ];
			// SORTING STATUS Author -ptr.nov-
            $dataProvider->sort->attributes['golonganOne.TT_GRP_NM'] = [
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
                    ->andFilterWhere(['like', 'timetable_grp.TT_GRP_NM', $this->getAttribute('golonganOne.TT_GRP_NM')])
                    ->andFilterWhere(['like', 'departemen.DEP_NM', $this->getAttribute('deptOne.DEP_NM')])
                    ->andFilterWhere(['like', 'cabang.CAB_NM', $this->getAttribute('cabOne.CAB_NM')])
                    ->andFilterWhere(['like', 'jabatan.JAB_NM', $this->getAttribute('jabOne.JAB_NM')])
                    ->andFilterWhere(['like', 'kar_stt.KAR_STS_NM',$this->getAttribute('stsOne.KAR_STS_NM')]);


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
            ->JoinWith('jabOne',true,'left JOIN')
            ->JoinWith('stsOne',true,'left JOIN')
            ->where('karyawan.KAR_STS=3');
        // SUB JOIN
        //$query->leftJoin(['company'=>$queryCop],'company.CORP_ID=a0001.EMP_CORP_ID');//->orderBy(['company.CORP_ID'=>SORT_ASC]);
        //->andFilterWhere(['EMP_ID'=>'006']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        /*
        //[5.2] SHORTING
            // SORTING CORPORATE Author -ptr.nov-
            $dataProvider->sort->attributes['corpOne.CORP_NM'] = [
                'asc' => ['a0001.CORP_NM' => SORT_ASC],
                'desc' => ['a0001.CORP_NM' => SORT_DESC],
            ];
            // SORTING DEPARTMENT Author -ptr.nov-
        */
        // SORTING Department Author -ptr.nov-
        $dataProvider->sort->attributes['deptOne.DEP_NM'] = [
            'asc' => ['departemen.DEP_NM' => SORT_ASC],
            'desc' => ['departemen.DEP_NM' => SORT_DESC],
        ];
        // SORTING CABANG Author -ptr.nov-
        $dataProvider->sort->attributes['cabOne.CAB_NM'] = [
            'asc' => ['cabang.CAB_NM' => SORT_ASC],
            'desc' => ['cabang.CAB_NM' => SORT_DESC],
        ];

        // SORTING JABATAN Author -ptr.nov-
        $dataProvider->sort->attributes['jabOne.JAB_NM'] = [
            'asc' => ['jabatan.JAB_NM' => SORT_ASC],
            'desc' => ['jabatan.JAB_NM' => SORT_DESC],
        ];

        // SORTING STATUS Author -ptr.nov-
        $dataProvider->sort->attributes['stsOne.KAR_STS_NM'] = [
            'asc' => ['kar_stt.KAR_STS_NM' => SORT_ASC],
            'desc' => ['kar_stt.KAR_STS_NM' => SORT_DESC],
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
            ->andFilterWhere(['like', 'departemen.DEP_NM', $this->getAttribute('deptOne.DEP_NM')])
            ->andFilterWhere(['like', 'cabang.CAB_NM', $this->getAttribute('cabOne.CAB_NM')])
            ->andFilterWhere(['like', 'jabatan.JAB_NM', $this->getAttribute('jabOne.JAB_NM')])
            ->andFilterWhere(['like', 'kar_stt.KAR_STS_NM',$this->getAttribute('stsOne.KAR_STS_NM')]);


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
