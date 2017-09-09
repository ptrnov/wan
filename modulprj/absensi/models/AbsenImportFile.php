<?php

namespace modulprj\absensi\models;

use Yii;
use yii\web\UploadedFile;

Yii::$app->params['uploadPath'] = realpath(Yii::$app->basePath) . '/web/uploads/temp/';
class AbsenImportFile extends \yii\db\ActiveRecord
{
	
	public $uploadExport;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'absen_import_file';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['ID'], 'required'],
            [['ID', 'STATUS'], 'integer'],
            [['USER_ID'], 'string', 'max' => 50],
            [['FILE_PATH', 'FILE_NM'], 'string', 'max' => 255],
            //[['FILE_PATH'], 'string', 'max' => 255],
			[['uploadExport'], 'file', 'extensions'=>'xls, xlsx'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'USER_ID' => 'User  ID',
            'FILE_PATH' => 'File  Path',
            'FILE_NM' => 'File  Nm',
            'STATUS' => 'Status',
        ];
    }
	
	public function getImageFile()
    {
        return isset($this->FILE_NM) ? Yii::$app->params['uploadPath'] . $this->FILE_NM : null;
    }

    public function getImageUrl()
    {
        // return a default image placeholder if your source IMAGE is not found
        $FILE_NM = isset($this->FILE_NM) ? $this->FILE_NM : 'default_import_gudang.xlsx';
        return Yii::$app->params['uploadPath'] . $FILE_NM;
    }

	public function uploadFile() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $uploadData = UploadedFile::getInstance($this, 'uploadExport');

        // if no image was uploaded abort the upload
        if (empty($uploadData)) {
            return false;
        }

        // store the source file name
        //$this->filename = $image->name;
        $ext = end((explode(".", $uploadData->name)));

        // generate a unique file name
        $this->FILE_NM = 'absen_import'.date('Y-m-d-His').".{$ext}"; //$image->name;//Yii::$app->security->generateRandomString().".{$ext}";

        // the uploaded image instance
        return $uploadData;
    }
	
	
	
	
	
}
