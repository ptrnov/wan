<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "timetable_grp".
 *
 * @property integer $TT_GRP_ID
 * @property string $TT_GRP_NM
 * @property integer $TT_GRP_STT
 * @property string $TT_GRP_DEF
 */
class Timetable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'timetable_grp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TT_GRP_STT'], 'integer'],
            [['TT_GRP_NM', 'TT_GRP_DEF'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TT_GRP_ID' => 'Group',
            'TT_GRP_NM' => 'Tt  Grp  Nm',
            'TT_GRP_STT' => 'Tt  Grp  Stt',
            'TT_GRP_DEF' => 'Tt  Grp  Def',
        ];
    }
}
