<?php

namespace modulprj\absensi\models;

use Yii;
use modulprj\absensi\models\AbsenImportTmp;
use yii\data\ArrayDataProvider;

class AbsenImportTmp extends \yii\db\ActiveRecord
{
	const SCENARIO_CREATE = 'create';
	const SCENARIO_UPDATE = 'update';
	const SCENARIO_EXIST = 'exist';
	
	public $tmpCab;
	public $tmpNm;
	public $tmpTglIn;
	public $tmpTglOut;
	public $msgStatus;
	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'absen_import_tmp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			
			[['tmpCab','tmpNm','TERMINAL_ID','FINGER_ID','tmpTglIn','tmpTglOut'], 'required','on'=>self::SCENARIO_CREATE],
			[['FINGER_ID'], 'findcheck1','on'=>self::SCENARIO_EXIST],
			[['tmpTglIn','tmpTglOut'], 'findcheck2','on'=>self::SCENARIO_EXIST],			
            [['IN_TGL', 'IN_WAKTU', 'OUT_TGL', 'OUT_WAKTU', 'CREATE_AT', 'UPDATE_AT'], 'safe'],
            [['tmpNm','tmpTglOut','tmpTglIn'], 'safe'],
            [['GRP_ID', 'STATUS'], 'integer'],
            [['PAY_DAY', 'VAL_PAGI', 'VAL_LEMBUR', 'PAY_PAGI', 'PAY_LEMBUR'], 'number'],
            [['DCRP_DETIL'], 'string'],
            [['TERMINAL_ID', 'KAR_NM'], 'string', 'max' => 100],
            [['FINGER_ID'], 'string', 'max' => 255],
            [['MESIN_NM', 'HARI'], 'string', 'max' => 20],
            [['KAR_ID'], 'string', 'max' => 15],
            [['DEP_ID'], 'string', 'max' => 5],
            [['DEP_NM', 'CREATE_BY', 'UPDATE_BY'], 'string', 'max' => 50],
        ];
    }

	public function findcheck1($model)
    {        
		$dataTmpImport= new ArrayDataProvider([
			'key' => 'ID',
			'allModels'=>Yii::$app->db->createCommand("
				SELECT x1.ID FROM absen_import_tmp x1 where 
				x1.TERMINAL_ID='".$this->TERMINAL_ID."' AND 
				x1.FINGER_ID='".$this->FINGER_ID."' AND 
				x1.IN_TGL='".date('Y-m-d', strtotime($this->tmpTglIn))."'
			")->queryAll()
		]);
		$cntTmpImport=$dataTmpImport->getCount();
			
		if ($cntTmpImport!=0) {
			//$this->addError($model, 'Duplicate Input Data, pelase use Update'.$this->tmpTglIn);				
			$this->addError($model, 'Duplicate Input Data, pelase use Update');				
		} 
    }
	
	public function findcheck2($model)
    {        
		if(date('Y-m-d H:i:s', strtotime($this->tmpTglIn)) >= date('Y-m-d H:i:s', strtotime($this->tmpTglOut))){
			$this->addError($model, 'Tanggal/Jam Masuk, harus lebih kecil dari Tanggal/Jam Keluar');	
		}
    }  
	
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'TERMINAL_ID' => 'Terminal Mesin',
            'FINGER_ID' => 'Finger  ID',
            'MESIN_NM' => 'Mesin  Nm',
            'KAR_ID' => 'Kar  ID',
            'KAR_NM' => 'Kar  Nm',
            'DEP_ID' => 'Dep  ID',
            'DEP_NM' => 'Dep  Nm',
            'HARI' => 'Hari',
            'IN_TGL' => 'In  Tgl',
            'IN_WAKTU' => 'In  Waktu',
            'OUT_TGL' => 'Out  Tgl',
            'OUT_WAKTU' => 'Out  Waktu',
            'GRP_ID' => 'Grp  ID',
            'PAY_DAY' => 'Pay  Day',
            'VAL_PAGI' => 'Val  Pagi',
            'VAL_LEMBUR' => 'Val  Lembur',
            'PAY_PAGI' => 'Pay  Pagi',
            'PAY_LEMBUR' => 'Pay  Lembur',
            'CREATE_BY' => 'Create  By',
            'CREATE_AT' => 'Create  At',
            'UPDATE_BY' => 'Update  By',
            'UPDATE_AT' => 'Update  At',
            'STATUS' => 'Status',
            'DCRP_DETIL' => 'Dcrp  Detil',
            'tmpTglOut' => 'Tanggal & Jam Keluar',
            'tmpTglIn' => 'Tanggal & Jam Masuk',
        ];
    }
}
