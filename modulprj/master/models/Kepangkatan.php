<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "Kepangkatan".
 *
 * @property string $ID
 * @property string $GF_ID
 * @property string $GF_NM
 * @property string $GF_DCRP
 * @property integer $STATUS
 * @property string $CREATED_BY
 * @property string $UPDATED_BY
 * @property string $UPDATED_TIME
 */
class Kepangkatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Kepangkatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GF_ID'], 'required'],
            [['GF_DCRP'], 'string'],
            [['STATUS'], 'integer'],
            [['UPDATED_TIME'], 'safe'],
            [['GF_ID'], 'string', 'max' => 10],
            [['GF_NM'], 'string', 'max' => 30],
            [['CREATED_BY', 'UPDATED_BY'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'GF_ID' => Yii::t('app', 'Gf  ID'),
            'GF_NM' => Yii::t('app', 'Gf  Nm'),
            'GF_DCRP' => Yii::t('app', 'Gf  Dcrp'),
            'STATUS' => Yii::t('app', 'Status'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'UPDATED_BY' => Yii::t('app', 'Updated  By'),
            'UPDATED_TIME' => Yii::t('app', 'Updated  Time'),
        ];
    }
}