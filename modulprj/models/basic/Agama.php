<?php
/**
 * NOTE: Nama Class harus diawali Hurup Besar
 * Server Linux 	: hurup besar/kecil bermasalah -case sensitif-
 * Server Windows 	: hurup besar/kecil tidak bermasalah
 * Author: -ptr.nov-
*/

namespace modulprj\models\basic;
use kartik\builder\Form;
use Yii;

/**
 * CORPORATION CLASS Author: -ptr.nov-
 */
class Agama extends \yii\db\ActiveRecord
{
	/* [1] SOURCE DB */
    public static function getDb()
    {
        /* Author -ptr.nov- : UMUM */
        return \Yii::$app->db;
    }

	/* [2] TABLE SELECT */
    public static function tableName()
    {
        return '{{attpayroll.agama}}';
    }

	/* [3] RULE SCENARIO -> DetailView */
    public function rules()
    {
        return [
            [['AGAMA_ID'], 'required'],
            [['AGAMA_ID'], 'integer'],
            [['AGAMA_NM'], 'string', 'max' => 30],
         ];
    }

    public function attributeLabels()
    {
        return [
            'AGAMA_ID' => Yii::t('app', 'Agama.ID'),
            'AGAMA_NM' => Yii::t('app', 'Agama.Name'),
        ];
    }
}


