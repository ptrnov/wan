<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "payroll_salary".
 *
 * @property string $ID
 * @property string $KAR_ID
 * @property double $PAY_DAY
 * @property double $PAY_MONTH
 * @property double $PAY_TUNJANGAN
 * @property double $PAY_TRANPORT
 * @property double $PAY_EAT
 * @property double $BONUS
 * @property double $PAY_ENTERTAIN
 * @property integer $STATUS_ACTIVE
 */
class PayrollSalary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payroll_salary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KAR_ID'], 'required'],
            [['PAY_DAY', 'PAY_MONTH', 'PAY_TUNJANGAN', 'PAY_TRANPORT', 'PAY_EAT', 'BONUS', 'PAY_ENTERTAIN'], 'number'],
            [['STATUS_ACTIVE'], 'integer'],
            [['KAR_ID'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'KAR_ID' => Yii::t('app', 'Kar  ID'),
            'PAY_DAY' => Yii::t('app', 'Pay  Day'),
            'PAY_MONTH' => Yii::t('app', 'Pay  Month'),
            'PAY_TUNJANGAN' => Yii::t('app', 'Pay  Tunjangan'),
            'PAY_TRANPORT' => Yii::t('app', 'Pay  Tranport'),
            'PAY_EAT' => Yii::t('app', 'Pay  Eat'),
            'BONUS' => Yii::t('app', 'Bonus'),
            'PAY_ENTERTAIN' => Yii::t('app', 'Pay  Entertain'),
            'STATUS_ACTIVE' => Yii::t('app', 'Status  Active'),
        ];
    }
}
