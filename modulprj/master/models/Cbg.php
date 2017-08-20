<?php
/**
 * NOTE: Nama Class harus diawali Hurup Besar
 * Server Linux 	: hurup besar/kecil bermasalah -case sensitif-
 * Server Windows 	: hurup besar/kecil tidak bermasalah
 * Author: -ptr.nov-
*/

namespace modulprj\master\models;
use kartik\builder\Form;
use Yii;

/**
 * CORPORATION CLASS Author: -ptr.nov-
 */
class Cbg extends \yii\db\ActiveRecord
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
        return '{{cabang}}';
    }

	/* [3] RULE SCENARIO -> DetailView */
    public function rules()
    {
        return [
            [['CAB_ID'], 'required'],
            [['CAB_ID'], 'string', 'max' => 5],
            [['CAB_NM'], 'string', 'max' => 30],
         ];
    }

    public function attributeLabels()
    {
        return [
            'CAB_ID' => Yii::t('app', 'Cabang.ID'),
            'CAB_NM' => Yii::t('app', 'Cabang.Name'),
        ];
    }
}


