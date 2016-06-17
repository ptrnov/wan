<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "payroll_jamsos".
 *
 * @property string $KAR_ID
 * @property string $sDate
 * @property string $eDate
 * @property string $SOS_ID
 * @property double $DATA UPAH
 * @property double $JKK
 * @property double $JKM
 * @property double $JPK
 * @property double $JHT_TK
 * @property double $JHT
 * @property double $SOS_TTL
 * @property string $PERSEN_JKK
 * @property string $PERSEN_JKM
 * @property string $PERSEN_JPK
 * @property string $PERSEN_JHT_TK
 * @property string $PERSEN_JHT
 */
class PayrollJamsos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payroll_jamsos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KAR_ID', 'PERSEN_JKM', 'PERSEN_JPK', 'PERSEN_JHT_TK', 'PERSEN_JHT'], 'required'],
            [['sDate', 'eDate'], 'safe'],
            [['DATA UPAH', 'JKK', 'JKM', 'JPK', 'JHT_TK', 'JHT', 'SOS_TTL', 'PERSEN_JKK', 'PERSEN_JKM', 'PERSEN_JPK', 'PERSEN_JHT_TK', 'PERSEN_JHT'], 'number'],
            [['KAR_ID'], 'string', 'max' => 30],
            [['SOS_ID'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KAR_ID' => Yii::t('app', 'Kar  ID'),
            'sDate' => Yii::t('app', 'S Date'),
            'eDate' => Yii::t('app', 'E Date'),
            'SOS_ID' => Yii::t('app', 'Sos  ID'),
            'DATA UPAH' => Yii::t('app', 'Data  Upah'),
            'JKK' => Yii::t('app', 'Jkk'),
            'JKM' => Yii::t('app', 'Jkm'),
            'JPK' => Yii::t('app', 'Jpk'),
            'JHT_TK' => Yii::t('app', 'Jht  Tk'),
            'JHT' => Yii::t('app', 'Jht'),
            'SOS_TTL' => Yii::t('app', 'Sos  Ttl'),
            'PERSEN_JKK' => Yii::t('app', 'Persen  Jkk'),
            'PERSEN_JKM' => Yii::t('app', 'Persen  Jkm'),
            'PERSEN_JPK' => Yii::t('app', 'Persen  Jpk'),
            'PERSEN_JHT_TK' => Yii::t('app', 'Persen  Jht  Tk'),
            'PERSEN_JHT' => Yii::t('app', 'Persen  Jht'),
        ];
    }
}
