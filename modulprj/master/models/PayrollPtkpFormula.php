<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "payroll_ptkp_formula".
 *
 * @property integer $NO
 * @property string $PTKP_NM
 * @property string $STT_ID
 * @property integer $ANAK
 * @property double $PTKP_VALUE
 * @property string $PPH21
 */
class PayrollPtkpFormula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payroll_ptkp_formula';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NO'], 'required'],
            [['NO', 'ANAK'], 'integer'],
            [['PTKP_VALUE', 'PPH21'], 'number'],
            [['PTKP_NM', 'STT_ID'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'NO' => Yii::t('app', 'No'),
            'PTKP_NM' => Yii::t('app', 'Ptkp  Nm'),
            'STT_ID' => Yii::t('app', 'Stt  ID'),
            'ANAK' => Yii::t('app', 'Anak'),
            'PTKP_VALUE' => Yii::t('app', 'Ptkp  Value'),
            'PPH21' => Yii::t('app', 'Pph21'),
        ];
    }
}
