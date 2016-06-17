<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "payroll_ptkp_stt".
 *
 * @property string $STT_ID
 * @property string $STT_NM
 */
class PayrollPtkpStt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payroll_ptkp_stt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STT_ID'], 'required'],
            [['STT_ID'], 'string', 'max' => 2],
            [['STT_NM'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'STT_ID' => Yii::t('app', 'Stt  ID'),
            'STT_NM' => Yii::t('app', 'Stt  Nm'),
        ];
    }
}
