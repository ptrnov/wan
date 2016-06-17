<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "holiday".
 *
 * @property integer $LBR_ID
 * @property string $TAHUN
 * @property string $LBR_SDATE
 * @property string $LBR_EDATE
 * @property string $LBR_NM
 */
class HariLibur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'holiday';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LBR_SDATE', 'LBR_EDATE'], 'safe'],
            [['TAHUN'], 'string', 'max' => 4],
            [['LBR_NM'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LBR_ID' => Yii::t('app', 'Lbr  ID'),
            'TAHUN' => Yii::t('app', 'Tahun'),
            'LBR_SDATE' => Yii::t('app', 'Lbr  Sdate'),
            'LBR_EDATE' => Yii::t('app', 'Lbr  Edate'),
            'LBR_NM' => Yii::t('app', 'Lbr  Nm'),
        ];
    }
}
