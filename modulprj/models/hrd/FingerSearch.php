<?php
/**
 * NOTE: Nama Class harus diawali Hurup Besar
 * Server Linux 	: hurup besar/kecil bermasalah -case sensitif-
 * Server Windows 	: hurup besar/kecil tidak bermasalah
 * Author: -ptr.nov-
*/

namespace modulprj\models\hrd;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Author -ptr.nov- Employe Search
 */
class FingerSearch extends Finger
{
    public $karOne;
    public $mesinOne;
	/*	[1] FILTER */
    public function rules()
    {
        return [
          //  [['NO_URUT','TerminalID','KAR_ID'], 'required'],
           // [['NO_URUT'], 'integer'],
            [['TerminalID'], 'string', 'max' => 100],
            [['KAR_ID'], 'string', 'max' => 15],
            [['karOne.KAR_NM','mesinOne.MESIN_NM'], 'string', 'max' => 100],
            [['FingerPrintID'], 'integer']
        ];
    }

    public function attributes()
    {
        //Author -ptr.nov- add related fields to searchable attributes
        //return array_merge(parent::attributes(), ['corpOne.CORP_NM','deptOne.DEP_NM','jabOne.JAB_NM','sttOne.STS_NM']);
        return array_merge(parent::attributes(), ['karOne.KAR_NM','mesinOne.MESIN_NM']);
    }
	
	/*	[4] SCNARIO */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
	
	/*	[5] SEARCH dataProvider -> SHOW GRIDVIEW */
    public function search($params)
    {	
		/*[5.1] JOIN TABLE */
		$query = Finger::find()
                        ->JoinWith('karOne',true,'LEFT JOIN')
                        ->JoinWith('mesinOne',true,'LEFT JOIN');
        $dataProvider_Finger = new ActiveDataProvider([
            'query' => $query,
        ]);
        // SORTING Nama Employee Author -ptr.nov-
        $dataProvider_Finger->sort->attributes['karOne.KAR_NM'] = [
            'asc' => ['karyawan.KAR_NM' => SORT_ASC],
            'desc' => ['karyawan.KAR_NM' => SORT_DESC],
        ];
        // SORTING Mesin Finger Author -ptr.nov-
        $dataProvider_Finger->sort->attributes['mesinOne.MESIN_NM'] = [
            'asc' => ['machine.MESIN_NM' => SORT_ASC],
            'desc' => ['machine.MESIN_NM' => SORT_DESC],
        ];
		/*[5.3] LOAD VALIDATION PARAMS */
			/*LOAD FARM VER 1*/
			$this->load($params);
			if (!$this->validate()) {
				return $dataProvider_Finger;
			}

		/*[5.4] FILTER WHERE LIKE (string/integer)*/
			/* FILTER COLUMN Author -ptr.nov-*/
			 $query->andFilterWhere(['like', 'kar_finger.KAR_ID', $this->KAR_ID])
                 ->andFilterWhere(['like', 'karyawan.KAR_NM', $this->getAttribute('karOne.KAR_NM')])
                 ->andFilterWhere(['like', 'kar_finger.TerminalID', $this->TerminalID])
                 ->andFilterWhere(['like', 'machine.MESIN_NM', $this->getAttribute('mesinOne.MESIN_NM')])
                 ->andFilterWhere(['like', 'kar_finger.FingerPrintID', $this->FingerPrintID]);
        return $dataProvider_Finger;
    }
    public function searchview_emp($kar_id_farm)
    {
        /*[5.1] JOIN TABLE */
        $query = Finger::find()
            ->JoinWith('karOne',true,'LEFT JOIN')
            ->JoinWith('mesinOne',true,'LEFT JOIN')
            ->where("kar_finger.KAR_ID='".$kar_id_farm ."'");
        $dataProvider_Finger = new ActiveDataProvider([
            'query' => $query,
        ]);
        // SORTING Nama Employee Author -ptr.nov-
        $dataProvider_Finger->sort->attributes['karOne.KAR_NM'] = [
            'asc' => ['karyawan.KAR_NM' => SORT_ASC],
            'desc' => ['karyawan.KAR_NM' => SORT_DESC],
        ];
        // SORTING Mesin Finger Author -ptr.nov-
        $dataProvider_Finger->sort->attributes['mesinOne.MESIN_NM'] = [
            'asc' => ['machine.MESIN_NM' => SORT_ASC],
            'desc' => ['machine.MESIN_NM' => SORT_DESC],
        ];
        /*[5.3] LOAD VALIDATION PARAMS */
        /*LOAD FARM VER 1*/
        //$this->load($params);
        //if (!$this->validate()) {
        //    return $dataProvider_Finger;
       // }

        /*[5.4] FILTER WHERE LIKE (string/integer)*/
        /* FILTER COLUMN Author -ptr.nov-*/
        //$query->andFilterWhere(['like', 'kar_finger.KAR_ID', $kar_id_farm])
          //  ;//->andFilterWhere(['like', 'karyawan.KAR_NM', $this->getAttribute('karOne.KAR_NM')])
            //->andFilterWhere(['like', 'kar_finger.TerminalID', $this->TerminalID])
            //->andFilterWhere(['like', 'machine.MESIN_NM', $this->getAttribute('mesinOne.MESIN_NM')])
            //->andFilterWhere(['like', 'kar_finger.FingerPrintID', $this->FingerPrintID]);
        return $dataProvider_Finger;
    }
}
