<?php
/**
 * NOTE: Nama Class harus diawali Hurup Besar
 * Server Linux 	: hurup besar/kecil bermasalah -case sensitif-
 * Server Windows 	: hurup besar/kecil tidak bermasalah
 * Author: -ptr.nov-
*/

namespace modulprj\master\models;
//use modulprj\sistem\Userlogin;
use kartik\builder\Form;
use Yii;

/**
 *  PENDIDIKAN CLASS Author: -ptr.nov-	
 */
class Pendidikan extends \yii\db\ActiveRecord
{
	/* [1] SOURCE DB */
    public static function getDb()
	{
		/* Author -ptr.nov- : HRD | Dashboard I */
		return \Yii::$app->db;
	}
	
	/* [2] TABLE SELECT */
    public static function tableName()
    {
        return '{{pendidikan}}';
    }	
	
	/* [3] RULE SCENARIO -> DetailView */
    public function rules()
    {
        return [
            [['PEN_ID'], 'required'],
            [['PEN_ID'], 'string'],
        ];
    }
 
	/* [4] ATRIBUTE LABEL -> DetailView/GridView */
    public function attributeLabels()
    {
        return [
           // 'emp.EMP_ID' => Yii::t('app', 'EmployeeID'),
            'PEN_ID' => Yii::t('app', 'PendidikanID'),
			'PEN_NM' => Yii::t('app', 'Pendidikan Name'),
			//'TGL_MASUK' => Yii::t('app', 'Tgl Masuk'),
			//'TGL_KELUAR' => Yii::t('app', 'Tgl Keluar'),
			//'NILAI' => Yii::t('app', 'Nilai'),
        ];
    } 
	 
	/* [6] JOIN CLASS TABLE */
		/* Join Class Table tatus Employe */
		/* public function getEmp()
		{
			return $this->hasOne(Employe::className(), ['EMP_ID' => 'EMP_ID']);
		} */
		/* Join Class Table tatus User */
		// public function getUser()
		// {
			// return $this->hasOne(Userlogin::className(), ['EMP_ID' => 'EMP_ID']);
		// }
     
}


