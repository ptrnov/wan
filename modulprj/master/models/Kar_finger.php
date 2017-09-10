<?php

namespace modulprj\master\models;

use Yii;
use modulprj\master\models\Karyawan;
use modulprj\master\models\Machine;
/**
 * This is the model class for table "kar_finger".
 *
 * @property string $NO_URUT
 * @property string $TerminalID
 * @property string $KAR_ID
 * @property string $FingerPrintID
 * @property string $FingerTmpl
 * @property string $UPDT
 */
class Kar_finger extends \yii\db\ActiveRecord
{
	public $userNameFinger;
	public $tmpCab;
	public $tmpDept;
	public $karNm;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kar_finger';
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
			[['KAR_ID'], 'required'],
            [['KAR_ID'], 'string', 'max' => 15],
			['KAR_ID','findKarids'],
            [['FingerTmpl','userNameFinger'], 'string'],
            [['tmpCab','tmpDept'], 'integer'],
            [['UPDT'], 'safe'],
            [['TerminalID', 'FingerPrintID'], 'string', 'max' => 100],
			
        ];
    }
	
	/**
     * SATU MESIN ABSEN SATU EMPLOYE AND FINGER
	 * @author ptrnov  <piter@lukison.com>
	 * @since 1.1
     */
	public function findKarids($attribute, $params)
    {
		if (!$this->hasErrors()) {
			$data = $this::find()->where("TerminalID='".$this->TerminalID."' AND KAR_ID='".$this->KAR_ID."'")->one();
			if ($data!=0)
            {
              $this->addError($attribute, 'Employee Already Register to Machine, please delete first to register again');
            }       
       }
    }
	
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'NO_URUT' => 'No  Urut',
            'TerminalID' => 'Terminal ID',
            'KAR_ID' => 'Kar  ID',
            'FingerPrintID' => 'Finger Print ID',
            'FingerTmpl' => 'Finger Tmpl',
            'UPDT' => 'Updt',
        ];
    }
	
	/*Join Karyawan*/
	public function getEmp(){
		 return $this->hasOne(Karyawan::className(), ['KAR_ID' => 'KAR_ID']);
	}
	
	public function getEmpNm(){
		return $this->emp!=''?$this->emp->KAR_NM:'none';
	}
	
	/*Join Karyawan*/
	public function getMesin(){
		 return $this->hasOne(Machine::className(), ['TerminalID' => 'TerminalID']);
	}
	
	public function getCabNm(){
		return $this->mesin!=''?$this->mesin->CabNm:'none';
	}
}
