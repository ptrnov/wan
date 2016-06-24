<?php

namespace modulprj\master\models;

use Yii;
use modulprj\master\models\Karyawan;
use modulprj\master\models\IjinHeader;
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
	
	public $cabang;
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
            [['IJN_ID'], 'integer'],
            [['IJN_NOTE'], 'string'],
            [['KAR_ID'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KAR_ID' => Yii::t('app', 'Kar  ID'),
            'IJN_SDATE' => Yii::t('app', 'Ijn  Sdate'),
            'IJN_EDATE' => Yii::t('app', 'Ijn  Edate'),
            'IJN_ID' => Yii::t('app', 'Ijn  ID'),
            'IJN_NOTE' => Yii::t('app', 'Ijn  Note'),
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
}
