<?php
/**
 * NOTE: Nama Class harus diawali Hurup Besar
 * Server Linux 	: hurup besar/kecil bermasalah -case sensitif-
 * Server Windows 	: hurup besar/kecil tidak bermasalah
 * Author: -ptr.nov-
*/

namespace modulprj\models\hrd;
use kartik\builder\Form;
use Yii;

/**
 *  JABATAN CLASS Author: -ptr.nov-	
 */
class Jabatan extends \yii\db\ActiveRecord
{
	/* [1] SOURCE DB */
    public static function getDb()
    {
        /* Author -ptr.nov- : UMUM */
        return \Yii::$app->db1;
    }
	
	/* [2] TABLE SELECT */
    public static function tableName()
    {
        return '{{attpayroll.jabatan}}';
	}

	/* [3] RULE SCENARIO -> DetailView */
    public function rules()
    {
        return [
            [['JAB_ID','JAB_NM'], 'required'],
            [['JAB_ID'], 'integer'],
            [['JAB_NM'], 'string'],
        ];
    }

	/* [4] ATRIBUTE LABEL -> DetailView/GridView */
    public function attributeLabels()
    {
        return [
            'JAB_ID' => Yii::t('app', 'Jabatan.ID   :'),
            'JAB_NM' => Yii::t('app', 'Jabatan.Name :'),
        ];
    }
}


