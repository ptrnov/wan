<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "timetable_level".
 *
 * @property integer $LVL_ID
 * @property string $LVL_NM
 */
class TimetableLevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'timetable_level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LVL_NM'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LVL_ID' => Yii::t('app', 'Lvl  ID'),
            'LVL_NM' => Yii::t('app', 'Lvl  Nm'),
        ];
    }
}
