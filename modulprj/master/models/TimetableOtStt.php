<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "timetable_ot_stt".
 *
 * @property integer $STT_OT_DPN
 * @property string $STT_OT_DPN_NM
 */
class TimetableOtStt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'timetable_ot_stt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STT_OT_DPN', 'STT_OT_DPN_NM'], 'required'],
            [['STT_OT_DPN'], 'integer'],
            [['STT_OT_DPN_NM'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'STT_OT_DPN' => Yii::t('app', 'Stt  Ot  Dpn'),
            'STT_OT_DPN_NM' => Yii::t('app', 'Stt  Ot  Dpn  Nm'),
        ];
    }
}
