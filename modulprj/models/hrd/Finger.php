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
 * DEPARTMENT CLASS  Author: -ptr.nov-
 */
class Finger extends \yii\db\ActiveRecord
{
	/* [1] SOURCE DB */

    public static function getDb()
    {
        /* Author -ptr.nov- :UMUM */
        return \Yii::$app->db;
    }
	
	/* [2] TABLE SELECT */
    public static function tableName()
    {
        return '{{kar_finger}}';
    }

	/* [3] RULE SCENARIO -> DetailView */
    public function rules()
    {
        return [
            [['NO_URUT','TerminalID','KAR_ID','FingerPrintID'], 'required'],
            [['NO_URUT'], 'integer'],
            [['TerminalID'], 'string', 'max' => 50],
            [['KAR_ID'], 'string', 'max' => 15],
            [['FingerPrintID'], 'integer'],
        ];
    }

	/* [4] ATRIBUTE LABEL -> DetailView/GridView */
    public function attributeLabels()
    {
        return [
            'NO_URUT' => Yii::t('app', 'No.Urut  :'),
            'TerminalID' => Yii::t('app', 'Finger Terminal    :'),
            'KAR_ID' => Yii::t('app', 'Employe.ID    :'),
            'FingerPrintID' => Yii::t('app', 'Finger.ID   :'),
            'karOne.KAR_ID' => Yii::t('app', 'Employe.ID    :'),
            'mesinOne.TerminalID' => Yii::t('app', 'Machine.ID  :'),
            'mesinOne.MESIN_NM' => Yii::t('app', 'MESIN.name    :'),


        ];
    }
    public function getKarOne()
    {
        return $this->hasOne(Karyawan::className(), ['KAR_ID' => 'KAR_ID']);
    }
    public function getMesinOne()
    {
        return $this->hasOne(Mesin::className(), ['TerminalID' => 'TerminalID']);
    }
}


