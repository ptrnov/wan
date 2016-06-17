<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "payroll_pph21".
 *
 * @property string $KAR_ID
 * @property string $sDate
 * @property string $eDate
 * @property double $TTL_UPAH
 * @property string $PTKP_NM
 * @property double $PTKP_VALUE
 * @property double $UPAH_PTKP
 * @property double $TTL_PTKP
 * @property double $PPH21
 */
class PayrollTax extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payroll_pph21';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KAR_ID'], 'required'],
            [['sDate', 'eDate'], 'safe'],
            [['TTL_UPAH', 'PTKP_VALUE', 'UPAH_PTKP', 'TTL_PTKP', 'PPH21'], 'number'],
            [['KAR_ID'], 'string', 'max' => 20],
            [['PTKP_NM'], 'string', 'max' => 15],
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
            'TTL_UPAH' => Yii::t('app', 'Ttl  Upah'),
            'PTKP_NM' => Yii::t('app', 'Ptkp  Nm'),
            'PTKP_VALUE' => Yii::t('app', 'Ptkp  Value'),
            'UPAH_PTKP' => Yii::t('app', 'Upah  Ptkp'),
            'TTL_PTKP' => Yii::t('app', 'Ttl  Ptkp'),
            'PPH21' => Yii::t('app', 'Pph21'),
        ];
    }
}
