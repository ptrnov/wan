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
class Mesin extends \yii\db\ActiveRecord
{
	/* [1] SOURCE DB */

    public static function getDb()
    {
        /* Author -ptr.nov- :UMUM */
        return \Yii::$app->db1;
    }
	
	/* [2] TABLE SELECT */
    public static function tableName()
    {
        return '{{attpayroll.machine}}';
    }

	/* [3] RULE SCENARIO -> DetailView */
    public function rules()
    {
        return [
            [['TerminalID','TerminalID','MESIN_NM','MESIN_SN'], 'required'],
            [['TerminalID'], 'string', 'max' => 50],
            [['MESIN_NM'], 'string', 'max' => 20],
            [['MESIN_SN'], 'string', 'max' => 50]
        ];
    }

	/* [4] ATRIBUTE LABEL -> DetailView/GridView */
    public function attributeLabels()
    {
        return [
            'TerminalID' => Yii::t('app', 'Machine.ID  :'),
            'MESIN_NM' => Yii::t('app', 'Machine Name    :'),
            'MESIN_SN' => Yii::t('app', 'Machine.Seri    :'),
        ];
    }
    public function getKarOne()
    {
        return $this->hasOne(Karyawan::className(), ['KAR_ID' => 'KAR_ID']);
    }

}


