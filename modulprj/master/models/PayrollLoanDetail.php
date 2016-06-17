<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "payroll_pinjaman_detail".
 *
 * @property integer $KAR_ID
 * @property string $TGL
 * @property string $PNJ_NM
 * @property double $PNJ_PAY
 * @property integer $PNJ_FLT
 */
class PayrollLoanDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payroll_pinjaman_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TGL'], 'safe'],
            [['PNJ_PAY'], 'number'],
            [['PNJ_FLT'], 'integer'],
            [['PNJ_NM'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KAR_ID' => Yii::t('app', 'Kar  ID'),
            'TGL' => Yii::t('app', 'Tgl'),
            'PNJ_NM' => Yii::t('app', 'Pnj  Nm'),
            'PNJ_PAY' => Yii::t('app', 'Pnj  Pay'),
            'PNJ_FLT' => Yii::t('app', 'Pnj  Flt'),
        ];
    }
}
