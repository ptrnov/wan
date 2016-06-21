<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "timetable_ktg".
 *
 * @property integer $TT_TYPE_KTG
 * @property string $TT_TYPE
 */
class TimetableKategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'timetable_ktg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TT_TYPE_KTG'], 'integer'],
            [['TT_TYPE'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TT_TYPE_KTG' => Yii::t('app', 'Tt  Type  Ktg'),
            'TT_TYPE' => Yii::t('app', 'Tt  Type'),
        ];
    }
}
