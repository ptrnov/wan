<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "payroll_jamsos_formula".
 *
 * @property string $SOS_ID
 * @property double $DATA_UPAH
 * @property double $JML_SOS
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
class PayrollJamsosFormula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payroll_jamsos_formula';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SOS_ID'], 'required'],
            [['DATA_UPAH', 'JML_SOS', 'JKK', 'JKM', 'JPK', 'JHT_TK', 'JHT', 'SOS_TTL', 'PERSEN_JKK', 'PERSEN_JKM', 'PERSEN_JPK', 'PERSEN_JHT_TK', 'PERSEN_JHT'], 'number'],
            [['SOS_ID'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SOS_ID' => Yii::t('app', 'Sos  ID'),
            'DATA_UPAH' => Yii::t('app', 'Data  Upah'),
            'JML_SOS' => Yii::t('app', 'Jml  Sos'),
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
