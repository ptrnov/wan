<?php

namespace modulprj\absensi\models;

use Yii;

/**
 * This is the model class for table "absen_import_periode".
 *
 * @property integer $ID
 * @property integer $AKTIF
 * @property integer $TIPE
 * @property string $TGL_START
 * @property string $TGL_END
 */
class AbsenImportPeriode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'absen_import_periode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AKTIF', 'TIPE'], 'integer'],
            [['TGL_START', 'TGL_END'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'AKTIF' => 'Aktif',
            'TIPE' => 'Tipe',
            'TGL_START' => 'Tgl  Start',
            'TGL_END' => 'Tgl  End',
        ];
    }
}
