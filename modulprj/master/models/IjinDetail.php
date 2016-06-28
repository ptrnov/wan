<?php

namespace modulprj\master\models;

use Yii;
use modulprj\master\models\Karyawan;
use modulprj\master\models\IjinHeader;
use modulprj\master\models\Cbg;
use modulprj\master\models\Dept;
/**
 * This is the model class for table "ijin_detail".
 *
 * @property string $KAR_ID
 * @property string $IJN_SDATE
 * @property string $IJN_EDATE
 * @property integer $IJN_ID
 * @property string $IJN_NOTE
 */
class IjinDetail extends \yii\db\ActiveRecord
{
	
	
	 /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ijin_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IJN_SDATE', 'IJN_EDATE'], 'safe'],
            [['IJN_ID','IJN_SDATE','IJN_EDATE','KAR_ID'], 'required'],
            [['IJN_ID','DEP_ID'], 'integer'],
            [['IJN_NOTE'], 'string'],
            [['KAR_ID','CAB_ID'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KAR_ID' => Yii::t('app', 'Employee Id'),
            'IJN_SDATE' => Yii::t('app', 'Start Date'),
            'IJN_EDATE' => Yii::t('app', 'End Date'),
            'IJN_ID' => Yii::t('app', 'Ijin.Id'),
            'IJN_NOTE' => Yii::t('app', 'Note'),
            'CAB_ID' => Yii::t('app', 'Cabang'),
            'DEP_ID' => Yii::t('app', 'Department'),
        ];
    }
	
	/*Join Karyawan*/
	public function getEmp(){
		 return $this->hasOne(Karyawan::className(), ['KAR_ID' => 'KAR_ID']);
	}
	
	public function getEmpNm(){
		return $this->emp!=''?$this->emp->KAR_NM:'none';
	}
	
	/*Join Ijin Header*/
	public function getIjinHdr(){
		 return $this->hasOne(IjinHeader::className(), ['IJN_ID' => 'IJN_ID']);
	}
	
	public function getIjinNm(){
		return $this->ijinHdr!=''?$this->ijinHdr->IIJN_NM:'none';
	}
	
	/*Join Ijin Cabang*/
	public function getDepartment(){
		 return $this->hasOne(Dept::className(), ['DEP_ID' => 'DEP_ID']);
	}
	
	public function getDepNm(){
		return $this->department!=''?$this->department->DEP_NM:'none';
	}
	
	/*Join Ijin Cabang*/
	public function getCabang(){
		 return $this->hasOne(Cbg::className(), ['CAB_ID' => 'CAB_ID']);
	}
	
	public function getCabNm(){
		return $this->cabang!=''?$this->cabang->CAB_NM:'none';
	}
}
