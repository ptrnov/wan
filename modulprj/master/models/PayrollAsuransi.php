<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "payroll_asuransi".
 *
 * @property integer $KAR_ID
 * @property string $sDate
 * @property string $eDate
 * @property string $ASR_NM
 * @property double $ASR_PAY_MONTH
 */
class PayrollAsuransi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payroll_asuransi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sDate', 'eDate'], 'safe'],
            [['ASR_PAY_MONTH'], 'number'],
            [['ASR_NM'], 'string', 'max' => 100],
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
            'ASR_NM' => Yii::t('app', 'Asr  Nm'),
            'ASR_PAY_MONTH' => Yii::t('app', 'Asr  Pay  Month'),
        ];
    }
}
