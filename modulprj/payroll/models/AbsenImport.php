<?php

namespace modulprj\payroll\models;

use Yii;

/**
 * This is the model class for table "absen_import".
 *
 * @property string $ID
 * @property string $TERMINAL_ID
 * @property string $FINGER_ID
 * @property string $MESIN_NM
 * @property string $KAR_ID
 * @property string $KAR_NM
 * @property string $DEP_ID
 * @property string $DEP_NM
 * @property string $HARI
 * @property string $IN_TGL
 * @property string $IN_WAKTU
 * @property string $OUT_TGL
 * @property string $OUT_WAKTU
 * @property integer $GRP_ID
 * @property string $PAY_DAY
 * @property string $VAL_PAGI
 * @property string $VAL_LEMBUR
 * @property string $PAY_PAGI
 * @property string $PAY_LEMBUR
 * @property string $CREATE_BY
 * @property string $CREATE_AT
 * @property string $UPDATE_BY
 * @property string $UPDATE_AT
 * @property integer $STATUS
 * @property string $DCRP_DETIL
 */
class AbsenImport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'absen_import';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IN_TGL', 'IN_WAKTU', 'OUT_TGL', 'OUT_WAKTU', 'CREATE_AT', 'UPDATE_AT'], 'safe'],
            [['GRP_ID', 'STATUS'], 'integer'],
            [['PAY_DAY', 'VAL_PAGI', 'VAL_LEMBUR', 'PAY_PAGI', 'PAY_LEMBUR'], 'number'],
            [['DCRP_DETIL'], 'string'],
            [['TERMINAL_ID', 'KAR_NM'], 'string', 'max' => 100],
            [['FINGER_ID'], 'string', 'max' => 255],
            [['MESIN_NM', 'HARI'], 'string', 'max' => 20],
            [['KAR_ID'], 'string', 'max' => 15],
            [['DEP_ID'], 'string', 'max' => 5],
            [['DEP_NM', 'CREATE_BY', 'UPDATE_BY'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'TERMINAL_ID' => 'Terminal  ID',
            'FINGER_ID' => 'Finger  ID',
            'MESIN_NM' => 'Mesin  Nm',
            'KAR_ID' => 'Kar  ID',
            'KAR_NM' => 'Kar  Nm',
            'DEP_ID' => 'Dep  ID',
            'DEP_NM' => 'Dep  Nm',
            'HARI' => 'Hari',
            'IN_TGL' => 'In  Tgl',
            'IN_WAKTU' => 'In  Waktu',
            'OUT_TGL' => 'Out  Tgl',
            'OUT_WAKTU' => 'Out  Waktu',
            'GRP_ID' => 'Grp  ID',
            'PAY_DAY' => 'Pay  Day',
            'VAL_PAGI' => 'Val  Pagi',
            'VAL_LEMBUR' => 'Val  Lembur',
            'PAY_PAGI' => 'Pay  Pagi',
            'PAY_LEMBUR' => 'Pay  Lembur',
            'CREATE_BY' => 'Create  By',
            'CREATE_AT' => 'Create  At',
            'UPDATE_BY' => 'Update  By',
            'UPDATE_AT' => 'Update  At',
            'STATUS' => 'Status',
            'DCRP_DETIL' => 'Dcrp  Detil',
        ];
    }
}
