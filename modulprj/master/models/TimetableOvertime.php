<?php

namespace modulprj\master\models;

use Yii;

use modulprj\master\models\TimetableKategori;
use modulprj\master\models\TimetableGroup;
/**
 * This is the model class for table "timetable_ot".
 *
 * @property integer $TT_ID
 * @property integer $TT_GRP_ID
 * @property integer $TT_TYP_KTG
 * @property integer $TT_SDAYS
 * @property integer $TT_EDAYS
 * @property string $TT_SDATE
 * @property string $TT_EDATE
 * @property string $TT_NOTE
 * @property string $TT_UPDT
 * @property integer $TT_ACTIVE
 * @property string $RULE_IN
 * @property string $RULE_OUT
 * @property integer $RULE_DURATION
 * @property integer $RULE_FRK_DAY
 * @property string $LEV1_FOT_HALF
 * @property string $LEV1_FOT_HOUR
 * @property string $LEV1_FOT_MAX
 * @property string $LEV1_FOT_MAX_TIME
 * @property integer $KOMPENSASI
 */
class TimetableOvertime extends \yii\db\ActiveRecord
{
	public $hideTT_GRP_ID;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'timetable_ot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[[
				'TT_TYP_KTG',
				'TT_GRP_ID','TT_SDAYS', 'TT_EDAYS', 'TT_ACTIVE', 'RULE_DURATION',
				'TT_SDATE', 'TT_EDATE', 'TT_UPDT', 'RULE_IN', 'RULE_OUT','LEV1_FOT_MAX_TIME',
				'LEV1_FOT_HALF', 'LEV1_FOT_HOUR', 'LEV1_FOT_MAX'
			], 'required'],
            [['TT_GRP_ID', 'TT_TYP_KTG', 'TT_SDAYS', 'TT_EDAYS', 'TT_ACTIVE', 'RULE_DURATION', 'RULE_FRK_DAY', 'KOMPENSASI'], 'integer'],
            [['TT_SDATE', 'TT_EDATE', 'TT_UPDT', 'RULE_IN', 'RULE_OUT','LEV1_FOT_MAX_TIME'], 'safe'],
            [['LEV1_FOT_HALF', 'LEV1_FOT_HOUR', 'LEV1_FOT_MAX'], 'number'],
            [['TT_NOTE'], 'string', 'max' => 15],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TT_ID' => Yii::t('app', 'Tt  ID'),
            'TT_GRP_ID' => Yii::t('app', 'Tt  Grp  ID'),
            'TT_TYP_KTG' => Yii::t('app', 'Typ  Ktg'),
            'TT_SDAYS' => Yii::t('app', 'Tt  Sdays'),
            'TT_EDAYS' => Yii::t('app', 'Tt  Edays'),
            'TT_SDATE' => Yii::t('app', 'Tt  Sdate'),
            'TT_EDATE' => Yii::t('app', 'Tt  Edate'),
            'TT_NOTE' => Yii::t('app', 'Tt  Note'),
            'TT_UPDT' => Yii::t('app', 'Tt  Updt'),
            'TT_ACTIVE' => Yii::t('app', 'Tt  Active'),
            'RULE_IN' => Yii::t('app', 'Rule  In'),
            'RULE_OUT' => Yii::t('app', 'Rule  Out'),
            'RULE_DURATION' => Yii::t('app', 'Rule  Duration'),
            'RULE_FRK_DAY' => Yii::t('app', 'Rule  Frk  Day'),
            'LEV1_FOT_HALF' => Yii::t('app', 'Lev1  Fot  Half'),
            'LEV1_FOT_HOUR' => Yii::t('app', 'Lev1  Fot  Hour'),
            'LEV1_FOT_MAX' => Yii::t('app', 'Lev1  Fot  Max'),
            'LEV1_FOT_MAX_TIME' => Yii::t('app', 'Lev1  Fot  Max  Time'),          
            'KOMPENSASI' => Yii::t('app', 'Kompensasi'),
        ];
    }
	
	/*Join Kategori*/
	public function getKategori(){
		 return $this->hasOne(TimetableKategori::className(), ['TT_TYPE_KTG' => 'TT_TYP_KTG']);
	}
	
	public function getKtgNm(){
		return $this->kategori!=''?$this->kategori->TT_TYPE:'none';
	}
	/*Join Group*/
	public function getGroup(){
		 return $this->hasOne(TimetableGroup::className(), ['TT_GRP_ID' => 'TT_GRP_ID']);
	}
	
	public function getGrpNm(){
		return $this->group!=''?$this->group->TT_GRP_NM:'none';
	}
	
	private function mingguInt($data){
		if($data==1){
			return 'Minggu';
		}elseif($data==2){
			return 'Senin';
		}elseif($data==3){
			return 'Selasa';
		}elseif($data==4){
			return 'Rabu';
		}elseif($data==5){
			return 'kamis';
		}elseif($data==6){
			return 'Jumat';
		}elseif($data==7){
			return 'Sabtu';
		}
	}
	
	public function getVTT_SDAYS(){
		return  $this->mingguInt($this->TT_SDAYS);
		//return $this->TT_SDAYS;
	}
	public function getVTT_EDAYS(){
		return  $this->mingguInt($this->TT_EDAYS);
		//return $this->TT_SDAYS;
	}
}
