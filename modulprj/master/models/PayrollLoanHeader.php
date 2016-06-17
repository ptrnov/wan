<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "payroll_pinjaman_header".
 *
 * @property string $KAR_ID
 * @property string $TGL
 * @property string $PNJ_NM
 * @property integer $PNJ_PAY_REGULASI
 * @property double $PNJ_PAY_MONTH
 * @property double $PNJ_PAY
 * @property integer $STT
 * @property string $KET
 */
class PayrollLoanHeader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payroll_pinjaman_header';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TGL'], 'safe'],
            [['PNJ_PAY_REGULASI', 'STT'], 'integer'],
            [['PNJ_PAY_MONTH', 'PNJ_PAY'], 'number'],
            [['KAR_ID'], 'string', 'max' => 20],
            [['PNJ_NM'], 'string', 'max' => 100],
            [['KET'], 'string', 'max' => 200],
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
            'PNJ_PAY_REGULASI' => Yii::t('app', 'Pnj  Pay  Regulasi'),
            'PNJ_PAY_MONTH' => Yii::t('app', 'Pnj  Pay  Month'),
            'PNJ_PAY' => Yii::t('app', 'Pnj  Pay'),
            'STT' => Yii::t('app', 'Stt'),
            'KET' => Yii::t('app', 'Ket'),
        ];
    }
}
