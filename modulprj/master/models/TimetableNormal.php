<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "timetable_normal".
 *
 * @property integer $TT_ID
 * @property integer $TT_GRP_ID
 * @property string $TT_TYP
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
 * @property string $RULE_TOL_IN
 * @property string $RULE_TOL_OUT
 * @property string $RULE_BRK_OUT
 * @property string $RULE_BRK_IN
 * @property string $RULE_DRT_OT_DPN
 * @property string $RULE_DRT_OT_BLK
 * @property integer $RULE_DURATION
 * @property integer $RULE_FRK_DAY
 * @property string $LEV1_FOT_HALF
 * @property string $LEV1_FOT_HOUR
 * @property string $LEV1_FOT_MAX
 * @property string $LEV1_FOT_MAX_TIME
 * @property string $LEV2_FOT_HALF
 * @property string $LEV2_FOT_HOUR
 * @property string $LEV2_FOT_MAX
 * @property string $LEV2_FOT_MAX_TIME
 * @property string $LEV3_FOT_HALF
 * @property string $LEV3_FOT_HOUR
 * @property string $LEV3_FOT_MAX
 * @property string $LEV3_FOT_MAX_TIME
 * @property integer $KOMPENSASI
 */
class TimetableNormal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'timetable_normal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TT_GRP_ID', 'TT_TYP_KTG', 'TT_SDAYS', 'TT_EDAYS', 'TT_ACTIVE', 'RULE_DURATION', 'RULE_FRK_DAY', 'KOMPENSASI'], 'integer'],
            [['TT_SDATE', 'TT_EDATE', 'TT_UPDT', 'RULE_IN', 'RULE_OUT', 'RULE_TOL_IN', 'RULE_TOL_OUT', 'RULE_BRK_OUT', 'RULE_BRK_IN', 'RULE_DRT_OT_DPN', 'RULE_DRT_OT_BLK', 'LEV1_FOT_MAX_TIME', 'LEV2_FOT_MAX_TIME', 'LEV3_FOT_MAX_TIME'], 'safe'],
            [['LEV1_FOT_HALF', 'LEV1_FOT_HOUR', 'LEV1_FOT_MAX', 'LEV2_FOT_HALF', 'LEV2_FOT_HOUR', 'LEV2_FOT_MAX', 'LEV3_FOT_HALF', 'LEV3_FOT_HOUR', 'LEV3_FOT_MAX'], 'number'],
            [['TT_TYP'], 'string', 'max' => 10],
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
            'TT_TYP' => Yii::t('app', 'Tt  Typ'),
            'TT_TYP_KTG' => Yii::t('app', 'Tt  Typ  Ktg'),
            'TT_SDAYS' => Yii::t('app', 'Tt  Sdays'),
            'TT_EDAYS' => Yii::t('app', 'Tt  Edays'),
            'TT_SDATE' => Yii::t('app', 'Tt  Sdate'),
            'TT_EDATE' => Yii::t('app', 'Tt  Edate'),
            'TT_NOTE' => Yii::t('app', 'Tt  Note'),
            'TT_UPDT' => Yii::t('app', 'Tt  Updt'),
            'TT_ACTIVE' => Yii::t('app', 'Tt  Active'),
            'RULE_IN' => Yii::t('app', 'Rule  In'),
            'RULE_OUT' => Yii::t('app', 'Rule  Out'),
            'RULE_TOL_IN' => Yii::t('app', 'Rule  Tol  In'),
            'RULE_TOL_OUT' => Yii::t('app', 'Rule  Tol  Out'),
            'RULE_BRK_OUT' => Yii::t('app', 'Rule  Brk  Out'),
            'RULE_BRK_IN' => Yii::t('app', 'Rule  Brk  In'),
            'RULE_DRT_OT_DPN' => Yii::t('app', 'Rule  Drt  Ot  Dpn'),
            'RULE_DRT_OT_BLK' => Yii::t('app', 'Rule  Drt  Ot  Blk'),
            'RULE_DURATION' => Yii::t('app', 'Rule  Duration'),
            'RULE_FRK_DAY' => Yii::t('app', 'Rule  Frk  Day'),
            'LEV1_FOT_HALF' => Yii::t('app', 'Lev1  Fot  Half'),
            'LEV1_FOT_HOUR' => Yii::t('app', 'Lev1  Fot  Hour'),
            'LEV1_FOT_MAX' => Yii::t('app', 'Lev1  Fot  Max'),
            'LEV1_FOT_MAX_TIME' => Yii::t('app', 'Lev1  Fot  Max  Time'),
            'LEV2_FOT_HALF' => Yii::t('app', 'Lev2  Fot  Half'),
            'LEV2_FOT_HOUR' => Yii::t('app', 'Lev2  Fot  Hour'),
            'LEV2_FOT_MAX' => Yii::t('app', 'Lev2  Fot  Max'),
            'LEV2_FOT_MAX_TIME' => Yii::t('app', 'Lev2  Fot  Max  Time'),
            'LEV3_FOT_HALF' => Yii::t('app', 'Lev3  Fot  Half'),
            'LEV3_FOT_HOUR' => Yii::t('app', 'Lev3  Fot  Hour'),
            'LEV3_FOT_MAX' => Yii::t('app', 'Lev3  Fot  Max'),
            'LEV3_FOT_MAX_TIME' => Yii::t('app', 'Lev3  Fot  Max  Time'),
            'KOMPENSASI' => Yii::t('app', 'Kompensasi'),
        ];
    }
}
