<?php

namespace modulprj\master\models;

use Yii;
use modulprj\master\models\Karyawan;
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
	public $cAB_ID;
	public $dEP_ID;
	
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
			['KAR_ID','findKarids'],
            [['PAY_DAY', 'PAY_MONTH', 'PAY_TUNJANGAN', 'PAY_TRANPORT', 'PAY_EAT', 'BONUS', 'PAY_ENTERTAIN'], 'number'],
            [['STATUS_ACTIVE'], 'integer'],
            [['CREATE_BY','UPDATE_BY'], 'string'],
            [['CREATE_AT','UPDATE_AT','NOTE'], 'safe'],
            [['KAR_ID'], 'string', 'max' => 20],
        ];
    }

	/**
     * SATU MESIN ABSEN SATU EMPLOYE AND FINGER
	 * @author ptrnov  <piter@lukison.com>
	 * @since 1.1
     */
	public function findKarids($attribute, $params)
    {
		if (!$this->hasErrors()) {
			$data = $this::find()->where("KAR_ID='".$this->KAR_ID."'")->one();
			if ($data!=0)
            {
              $this->addError($attribute, 'Employee Already Register to Salary, please use button Avction View Salary Update');
            }       
       }
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
			'NOTE' => Yii::t('app', 'Note'),
            'CREATE_BY' => Yii::t('app', 'Create By'),
            'UPDATE_BY' => Yii::t('app', 'Update By'),            
            'CREATE_AT' => Yii::t('app', 'Create At'),
            'UPDATE_AT' => Yii::t('app', 'Update At'),
        ];
    }
	
	/*Join Karyawan*/
	public function getEmp(){
		 return $this->hasOne(Karyawan::className(), ['KAR_ID' => 'KAR_ID']);
	}
	
	public function getEmpNm(){
		return $this->emp!=''?$this->emp->KAR_NM:'none';
	}
}
