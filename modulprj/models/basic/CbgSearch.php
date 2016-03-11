<?php
/**
 * NOTE: Nama Class harus diawali Hurup Besar
 * Server Linux 	: hurup besar/kecil bermasalah -case sensitif-
 * Server Windows 	: hurup besar/kecil tidak bermasalah
 * Author: -ptr.nov-
*/

namespace modulprj\models\basic;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Author -ptr.nov- Employe Search
 */
class CbgSearch extends Cbg
{
	/*	[1] FILTER */
    public function rules()
    {
        return [
            [['CAB_ID'], 'string', 'max' => 5],
            [['CAB_NM'], 'string', 'max' => 50],
        ];
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
		$query = Cbg::find();
        $dataProvider_Cbg = new ActiveDataProvider([
            'query' => $query,
        ]);
		
		/*[5.3] LOAD VALIDATION PARAMS */
			/*LOAD FARM VER 1*/
			$this->load($params);
			if (!$this->validate()) {
				return $dataProvider_Cbg;
			}

		/*[5.4] FILTER WHERE LIKE (string/integer)*/
			/* FILTER COLUMN Author -ptr.nov-*/
			 $query->andFilterWhere(['like', 'CAB_ID', $this->CAB_ID])
					->andFilterWhere(['like', 'CAB_NM', $this->CAB_NM]);
        return $dataProvider_Cbg;
    }
}
