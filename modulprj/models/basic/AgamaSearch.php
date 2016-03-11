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
class AgamaSearch extends Agama
{
	/*	[1] FILTER */
    public function rules()
    {
        return [
            [['AGAMA_ID'], 'integer'],
            [['AGAMA_NM'], 'string', 'max' => 50],
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
		$query = Agama::find();
        $dataProvider_Agama = new ActiveDataProvider([
            'query' => $query,
        ]);
		
		/*[5.3] LOAD VALIDATION PARAMS */
			/*LOAD FARM VER 1*/
			$this->load($params);
			if (!$this->validate()) {
				return $dataProvider_Agama;
			}

		/*[5.4] FILTER WHERE LIKE (string/integer)*/
			/* FILTER COLUMN Author -ptr.nov-*/
			 $query->andFilterWhere(['like', 'AGAMA_ID', $this->AGAMA_ID])
					->andFilterWhere(['like', 'AGAMA_NM', $this->AGAMA_NM]);
        return $dataProvider_Agama;
    }
}
