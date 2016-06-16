<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "Grading".
 *
 * @property integer $ID
 * @property string $GF_ID
 * @property string $JOBGRADE_ID
 * @property string $JOBGRADE_NM
 * @property string $JOBGRADE_DCRP
 * @property integer $JOBGRADE_STS
 * @property string $CREATED_BY
 * @property string $UPDATED_BY
 * @property string $UPDATED_TIME
 */
class Grading extends \yii\db\ActiveRecord
{
	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Grading';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['JOBGRADE_ID','GF_ID'], 'required'],
            [['JOBGRADE_DCRP'], 'string'],
            [['JOBGRADE_STS'], 'integer'],
            [['UPDATED_TIME'], 'safe'],
            [['GF_ID'], 'string', 'max' => 10],
            [['JOBGRADE_ID'], 'string', 'max' => 5],
            [['JOBGRADE_NM'], 'string', 'max' => 100],
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
            'JOBGRADE_ID' => Yii::t('app', 'ID'),
            'JOBGRADE_NM' => Yii::t('app', 'Job Grading'),
            'JOBGRADE_DCRP' => Yii::t('app', 'Jobgrade  Dcrp'),
            'JOBGRADE_STS' => Yii::t('app', 'Jobgrade  Sts'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'UPDATED_BY' => Yii::t('app', 'Updated  By'),
            'UPDATED_TIME' => Yii::t('app', 'Updated  Time'),
        ];
    }
}
