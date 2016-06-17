<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "payroll_asuransi_formula".
 *
 * @property string $ASR_ID
 * @property string $ASR_NM
 * @property double $ASR_PAY_MONTH
 */
class PayrollAsuransiFormula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payroll_asuransi_formula';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ASR_ID', 'ASR_PAY_MONTH'], 'required'],
            [['ASR_PAY_MONTH'], 'number'],
            [['ASR_ID'], 'string', 'max' => 20],
            [['ASR_NM'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ASR_ID' => Yii::t('app', 'Asr  ID'),
            'ASR_NM' => Yii::t('app', 'Asr  Nm'),
            'ASR_PAY_MONTH' => Yii::t('app', 'Asr  Pay  Month'),
        ];
    }
}
