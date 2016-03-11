<?php
/**
 * NOTE: Nama Class harus diawali Hurup Besar
 * Server Linux 	: hurup besar/kecil bermasalah -case sensitif-
 * Server Windows 	: hurup besar/kecil tidak bermasalah
 * Author: -ptr.nov-
*/

namespace app\models\hrd;
use Yii;
use yii\web\UploadedFile;

/**
 * EMPLOYE CLASS  Author: -ptr.nov-
 */
class Employe extends \yii\db\ActiveRecord
{
	public $upload_file;
	
	/* [1] SOURCE DB */
    public static function getDb()
	{
		/* Author -ptr.nov- : HRD */
		return \Yii::$app->db1;
	}
	
	/* [2] TABLE SELECT */
	public static function tableName()
    {
        return '{{attpayroll.a0001}}';
    }   
    
	/* [3] RULE SCENARIO -> DetailView */
    public function rules()
    {
        return [
            [['EMP_ID'], 'required'],
            [['EMP_ID','EMP_ZIP','EMP_CORP_ID'], 'string', 'max' => 15],
            [['EMP_NM','EMP_NM_BLK','EMP_IMG','EMP_KTP','GRP_NM'], 'string', 'max' => 20], 
			[['DEP_ID','JAB_ID'], 'string', 'max' => 5], 
			[['EMP_STS'], 'integer'],
			[['EMP_JOIN_DATE','EMP_TGL_LAHIR','EMP_RESIGN_DATE'], 'safe'],
			[['EMP_JOIN_DATE','EMP_TGL_LAHIR','EMP_RESIGN_DATE'], 'date','format' => 'yyyy-mm-dd'], 
			[['EMP_ALAMAT'],  'filter', 'filter' => function($value) {
                    return trim(htmlentities(strip_tags($value), ENT_QUOTES, 'UTF-8'));}],
			[['EMP_TLP','EMP_HP'], 'string', 'max' => 15], 
			[['EMP_GENDER'], 'string', 'max' => 6], 
			[['EMP_EMAIL'], 'string', 'max' => 30],  			
		    [['EMP_ZIP'], 'string', 'max' => 50],
            [['EMP_IMG'], 'string', 'max' => 50],    
			[['upload_file'], 'file', 'skipOnEmpty' => true,'extensions'=>'jpg,png', 'mimeTypes'=>'image/jpeg, image/png',],
        ];
    }


	/* [4] ATRIBUTE LABEL  -> DetailView/GridView */
    public function attributeLabels()
    {
        return [
			// Employe Identity - Author: -ptr.nov-
			'EMP_IMG' => Yii::t('app', 'Pic'),
            'EMP_ID' => Yii::t('app', 'Employee.ID'),
            'EMP_NM' => Yii::t('app', 'First Name'),
            'EMP_NM_BLK' => Yii::t('app', 'Last Name'),
            
			
			// Employe Coorporation - Author: -ptr.nov-
			'EMP_CORP_ID' => Yii::t('app', 'Corp.ID'),
            'DEP_ID' => Yii::t('app', 'Department'),
			'EMP_GENDER' => Yii::t('app', 'Jenis Kelamin'),
			'EMP_STS' => Yii::t('app', 'Status'),
			'JAB_ID' => Yii::t('app', 'Jabatan'),
			'EMP_JOIN_DATE' => Yii::t('app', 'Join Date'),
			'EMP_RESIGN_DATE' => Yii::t('app', 'Resign Date'),		
						
			//Employe Profile - Author: -ptr.nov-
            'EMP_KTP' => Yii::t('app', 'No.KTP'),
            'EMP_ALAMAT' => Yii::t('app', 'Alamat'),
			'EMP_ZIP' => Yii::t('app', 'Postal Code'),
            'EMP_TLP' => Yii::t('app', 'Telphone'),
            'EMP_HP' => Yii::t('app', 'Handphone'),
			'EMP_TGL_LAHIR' => Yii::t('app', ' BridthDay'),
            'EMP_EMAIL' => Yii::t('app', 'Email'),
			
			/*Modul HRD*/
            'GRP_NM' => Yii::t('app', 'Modul'),
			
			/*Image Temporary Upload*/
			'upload_file' => Yii::t('app', 'Upload File'),
			
			'EMP_JOIN_DATE' => Yii::t('app', 'Join Date'),
			//UMUM
            'corpOne.CORP_NM' => Yii::t('app', 'Company'),
			//UMUM
            'deptOne.DEP_NM' => Yii::t('app', 'Department'),
			//UMUM
			'jabOne.JAB_NM' => Yii::t('app', 'Position'),
			//UMUM
            'sttOne.STS_NM' => Yii::t('app', 'Status'),      
        ];
    }
	 
	 /* [5] ATRIBUTE LABEL DIRECT -> DetailView/GridView */
	 public function getFormAttribs() 
	 {
        return [
            'EMP_ID'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter ...']],
            'EMP_NM'=>['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter ...']],
            'EMP_IMG'=>['type'=>Form::INPUT_TEXT],
           // 'actions'=>['type'=>Form::INPUT_RAW, 'value'=>Html::submitButton('Submit', ['class'=>'btn btn-primary'])];
        ];
    }   
	
	/* [6] JOIN CLASS TABLE */
		 /* Join Class Table Pendidikan */
		public function getPen()
		{
			return $this->hasOne(Pendidikan::className(), ['EMP_ID' => 'EMP_ID']);
			//return $this->hasMany(Pendidikan::className(), ['EMP_ID' => 'EMP_ID']);
		}
		/* Join Class Table Coorporation */    
		public function getCorpOne()
		{
			return $this->hasOne(Corp::className(), ['CORP_ID' => 'EMP_CORP_ID']);
		}		
		/* Join Class Table Department */
		public function getDeptOne()
		{
			return $this->hasOne(Dept::className(), ['DEP_ID' => 'DEP_ID']);
		}
		/* Join Class Table Jabatan Employe */
		public function getJabOne()
		{
			return $this->hasOne(Jabatan::className(), ['JAB_ID' => 'JAB_ID']);
		}	
		/* Join Class Table tatus Employe */
		public function getSttOne()
		{
			return $this->hasOne(Status::className(), ['STS_ID' => 'EMP_STS']);
		}
		
		/*Function RANDOM FILE IMAGE Author: -ptr.nov-*/
		public function uploadFile(){
			$image=UploadedFile::getInstance($this,'upload_file');
			if(empty($image)){
				return false;
			}
			$this->EMP_IMG = time().'.'.$image->extension;
			return $image;
		}
		
		/*Function path/default image Author: -ptr.nov-*/
		public function getUploadedFile(){
			$pic = isset($this->EMP_IMG) ? $this->EMP_IMG : 'default.jpg';
			return Yii::$app->params['HRD_EMP_UploadUrl'];//.$pic;
		}

}


