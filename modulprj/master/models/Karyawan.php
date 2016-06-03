<?php
/**
 * Created by PhpStorm.
 * User: ptr.nov
 * Date: 10/08/15
 * Time: 20:21
 */
namespace modulprj\master\models;
use Yii;
use modulprj\master\models\cbg;
use yii\web\UploadedFile;
//use modulprj\models\hrd\Dept;
use modulprj\master\models\Golongan;

Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/upload/hrd/Employee/';
Yii::$app->params['uploadUrl'] = Yii::$app->urlManager->baseUrl . '/web/upload/hrd/Employee/';

class Karyawan extends \yii\db\ActiveRecord{

    public $upload_file;
	public $cabID;
	
	public $image;
	
	public $vKarId;
	public $vKarNm;
	public $vCabID;
	public $vIMAGE;

    /* [1] SOURCE DB */
    public static function getDb()
    {
        /* Author -ptr.nov- : HRD */
        return \Yii::$app->db;
    }

    /* [2] TABLE SELECT */
    public static function tableName()
    {
        return '{{karyawan}}';
    }

    /* [3] RULE SCENARIO -> DetailView */
    public function rules()
    {
        return [
            //--Emp Identity--
            [['EMP_IMG'], 'string', 'max' => 50],
            [['KAR_ID','KAR_NM','CAB_ID'], 'required'],
            [['KAR_ID'], 'string','max' => 15],                                 //gridview
            [['KAR_NM'], 'string', 'max' => 50],                                //gridview
            [['DEP_ID'], 'integer'],                            //JOIN TABLE    //gridview
            [['CORP_ID'], 'string'],                            //JOIN TABLE    //gridview
            [['CAB_ID'], 'string'],                            //JOIN TABLE    //gridview
            /* [['LVL_ID'], 'integer'],                            //JOIN TABLE    //gridview
            [['JAB_ID'], 'integer'],                            //JOIN TABLE    //gridview
            [['KAR_STS'], 'integer'],                           //JOIN TABLE    //gridview
            [['EMP_STS'], 'integer'],                           //JOIN TABLE    //gridview
            [['KAR_KTP'], 'string'],
            [['KAR_ALMT'], 'string'],
            [['KAR_TLP'], 'string'],
            [['KAR_HP'], 'string'],
            //[['KAR_TGL'], 'date','format' => 'yyyy-mm-dd'],
            [['KAR_AGM'], 'string'],
            [['KAR_STSK'], 'string'],
            //[['KAR_TGLM'], 'date','format' => 'yyyy-mm-dd'],                    //gridview
            //[['KAR_TGLK'], 'date','format' => 'yyyy-mm-dd'],                    //gridview
            [['KAR_STSP'], 'string'],
            [['KAR_MAILP'], 'string'],
            [['KAR_MAILK'], 'string'],
            //[['UPDT'], 'string'],                             //timestamp
            //--Profile--
            [['KAR_KOTA'], 'string'],
            [['KAR_TMP_LAHIR'], 'string'],
            [['KAR_TGL_LAHIR'], 'string'],
            [['KAR_JK'], 'string'],
            [['KAR_DARAH'], 'string'],
            [['KAR_PEN'], 'string'],
            //--Bank--
            [['BANK'], 'string'],
            [['NO_REK'], 'string'],
            //--fasility--
            [['NPWP'], 'string'],                               //JOIN TABLE
            [['NO_JAMSOS'], 'string'],                          //JOIN TABLE
            [['PTKP_NM'], 'string'],                            //JOIN TABLE
            [['STT_ID'], 'string'],                             //JOIN TABLE
            [['JML_ANAK'], 'integer'],                           //JOIN TABLE
            [['NO_ASR'], 'string'],                             //JOIN TABLE
            [['ASR_ID'], 'string'],                             //JOIN TABLE
            [['STT_OT_DPN'], 'integer'],                         //JOIN TABLE
            [['PEN_ID'], 'integer'],                             //JOIN TABLE
            [['KAR_KET'], 'string'],                            //JOIN TABLE
            [['AGAMA_ID'], 'integer'], */

           // [['upload_file'], 'file', 'skipOnEmpty' => true,'extensions'=>'jpg,png,jpeg', 'mimeTypes'=>'image/jpg,image/jpeg, image/png',],
			[['image'], 'file', 'extensions'=>'jpg, gif, png']
        ];
    }

    /* [4] ATRIBUTE LABEL  -> DetailView/GridView */
    public function attributeLabels()
    {
        return [

          //--EMPLOYEE IDENTIFICATION--
            'EMP_IMG' => Yii::t('app', 'Pic'),
            'KAR_ID' => Yii::t('app', 'Employee.ID  :'),
            'KAR_NM' => Yii::t('app', 'Name :'),

          //--'COMPANY IDENTIFICATION--
            'DEP_ID' => Yii::t('app', 'Dept   :'),
            'CORP_ID' => Yii::t('app', 'Corp  :'),
            'CAB_ID' => Yii::t('app', 'Cabang :'),
            'LVL_ID' => Yii::t('app', 'OT.Level'),
            'JAB_ID' => Yii::t('app', 'Jabatan    :'),
            'KAR_STS' => Yii::t('app', 'Status Pekerjaan   :'), //STATUS PEKERJAAn
            'KAR_STSK'  => Yii::t('app', 'Status Karyawan :'),
            'KAR_TGLM' => Yii::t('app', 'Tgl.Masuk    :'),
            'KAR_TGLK'  => Yii::t('app', 'Tgl.Keluar  :'),
            'KAR_STSP' => Yii::t('app', 'Tgl.ID   :'),
            'KAR_TGL'  => Yii::t('app', 'Tgl.ID   :'),
            'KAR_MAILK' => Yii::t('app', 'Email.Kantor    :'),

          //--EMPLOYEE IDENTITY--
            'KAR_KTP'  => Yii::t('app', 'No.KTP :'),
            'KAR_ALMT' => Yii::t('app', 'Alamat :'),
            'KAR_TMP_LAHIR' => Yii::t('app', 'Tmp.Lahir :'),
            'KAR_TGL_LAHIR' => Yii::t('app', 'Tgl Lahir :'),
            'KAR_JK' => Yii::t('app', 'Jenis Kelamin    :'),
            'KAR_AGM' => Yii::t('app', 'Agama   :'),
            'AGAMA_ID'  => Yii::t('app', 'AGAMA_ID  :'),
            'KAR_TLP' => Yii::t('app', 'Tlp :'),
            'STT_ID'  => Yii::t('app', 'Status :'), //STATUS PERNIKAHAN
            'JML_ANAK'  => Yii::t('app', 'Jumlah.Anak	:'),
            'KAR_HP' => Yii::t('app', 'Handphone    :'),
            'NPWP'  => Yii::t('app', 'NPWP	:'),
            'KAR_NPWP'  => Yii::t('app', 'KAR_NPWP'),
            'KAR_MAILP' => Yii::t('app', 'Email.Pribadi :'),
            'KAR_KOTA'  => Yii::t('app', 'Kota'),
            'KAR_DARAH' => Yii::t('app', 'Daerah'),
            'PTKP_NM'  => Yii::t('app', 'PTKP_NM'),             // PTKP PENENTU PAJAK
            'STT_OT_DPN'  => Yii::t('app', 'STT_OT_DPN'),      //OVERTIME LEVEL STATUS DEPAN/BELAKANG
                //'UPDT' => Yii::t('app', 'Employee.ID'),

          //--formal education--
            'KAR_PEN'  => Yii::t('app', 'Pendidikan.ID  :'),
            'PEN_ID'  => Yii::t('app', 'PEN_ID  :'),

         //--social Security--
            'NO_JAMSOS'  => Yii::t('app', 'NO_JAMSOS    :'),
            'NO_ASR'  => Yii::t('app', 'NO_ASR  :'),

           // --Employee wallet bank --
            'BANK'  => Yii::t('app', 'Bank Name :'),
            'NO_REK' => Yii::t('app', 'Bank Reg :'),

           // lain-lain
            'KAR_KET'  => Yii::t('app', 'Catatan    :'),


            /*Image Temporary Upload*/
            'upload_file' => Yii::t('app', 'Upload File'),
           // ---- JOIN ATTRIBUTE ---
            'deptOne.DEP_NM' => Yii::t('app', 'Department'),
            //'cabOne.CAB_NM' => Yii::t('app', 'Cabang'),
            'jabOne.JAB_NM' => Yii::t('app', 'Jabatan'),
            'stsOne.KAR_STS_NM' => Yii::t('app', 'Status'),
        ];
    }
    // Join Class TableDepartment
    public function getDeptOne()
    {
        return $this->hasOne(Dept::className(), ['DEP_ID' => 'DEP_ID']);
    }

    // Join Class Table Cabang
    public function getCabOne()
    {
        return $this->hasOne(Cbg::className(), ['CAB_ID' => 'CAB_ID']);
    }

    /* Join Class Table Jabatan Employe */
    public function getJabOne()
    {
        return $this->hasOne(Jabatan::className(), ['JAB_ID' => 'JAB_ID']);
    }

    /* Join Class Table Status Employe */
    public function getStsOne()
    {
        return $this->hasOne(Status::className(), ['KAR_STS_ID' => 'KAR_STS']);
    }
	
	 /* Join Class Table Golongan Employe */
    public function getGolonganOne()
    {
        return $this->hasOne(Golongan::className(), ['TT_GRP_ID' => 'GRP_ID']);
    }

    /*Function RANDOM FILE image Author: -ptr.nov-*/
   /*  public function uploadFile(){
        $image=UploadedFile::getInstance($this,'upload_file');
        if(empty($image)){
            return false;
        }
        $this->EMP_IMG = time().'.'.$image->extension;
        return $image;
    } */

    /*Function path/default image Author: -ptr.nov-*/
    /* public function getUploadedFile(){
        $pic = isset($this->EMP_IMG) ? $this->EMP_IMG : 'default.jpg';
        //$ppthw = Yii::$app
        return Yii::$app->params['HRD_EMP_UploadUrl'].$pic;
    } */
	
	public function getImageFile()
    {
        return isset($this->EMP_IMG) ? Yii::$app->params['uploadPath'] . $this->EMP_IMG : null;
    }

    public function getImageUrl()
    {
        // return a default image placeholder if your source image is not found
        $image = isset($this->EMP_IMG) ? $this->EMP_IMG : 'default.jpg';
        return Yii::$app->params['uploadUrl'] . $image;
    }

	public function uploadImage() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $image = UploadedFile::getInstance($this, 'image');

        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // store the source file name
        //$this->filename = $image->name;
        $ext = end((explode(".", $image->name)));

        // generate a unique file name
        $this->EMP_IMG = 'wan-'.date('ymdHis').".{$ext}"; //$image->name;//Yii::$app->security->generateRandomString().".{$ext}";

        // the uploaded image instance
        return $image;
    }
} 