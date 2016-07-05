<?php

namespace modulprj\master\models;

use Yii;

use modulprj\master\models\Machine;
use modulprj\master\models\MachineSearch;
use modulprj\master\models\Key_list;
use modulprj\master\models\Key_listSearch;
use modulprj\master\models\Kar_finger;


class Personallog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personallog';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db');
    }

	public function getMachines(){		
		return $this->hasOne(Machine::className(),['TerminalID'=>'TerminalID']);
	}
	
	public function getMachine_nm(){
		//return $this->machines->MESIN_NM;
		return $this->machines!=''?$this->machines->MESIN_NM:'unknown';
	}
	
	public function getKeys(){
		return $this->hasOne(Key_list::className(),['FunctionKey'=>'FunctionKey']);
	}
	
	public function getKeys_nm(){
		//return $this->keys->FunctionKeyNM;
		return $this->keys!=''?$this->keys->FunctionKeyNM:'unknown';
	}
	
	/*Join Karyawan*/
	public function getEmpfinger(){
		 return $this->hasOne(Kar_finger::className(), ['FingerPrintID' => 'UserID']);
	}
	
	public function getEmpNm(){
		return $this->empfinger!=''?$this->empfinger->empNm:'none';
	}
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgllog','tgllate','Edited', 'DateTime', 'tgl', 'waktu'], 'safe'],
            [['TerminalID', 'UserName', 'FlagAbsence'], 'string', 'max' => 100],
            [['UserID'], 'string', 'max' => 50],
            [['FunctionKey'], 'string', 'max' => 15]
        ];
    }

	
/* 	public function fields()
	{
		return [
			'tgl2'=>function($model){
							return 'DateTime';
					},
		];
	} */
	
	
	public function getTgllog(){
		return $this->DateTime;		
	}
	public function getTgllate(){
		return $this->DateTime;		
	}
	
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idno' => 'Idno',
            'TerminalID' => 'Terminal ID',
            'UserID' => 'User ID',
            'FunctionKey' => 'Function Key',
            'Edited' => 'Edited',
            'UserName' => 'User Name',
            'FlagAbsence' => 'Flag Absence',
            'DateTime' => 'Date Time',
            'tgl' => 'Tgl',
            'waktu' => 'Waktu',
        ];
    }
}
