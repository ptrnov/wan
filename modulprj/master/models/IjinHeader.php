<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "ijin_header".
 *
 * @property integer $IJN_ID
 * @property string $IIJN_NM
 * @property string $IJIN_KET
 */
class IjinHeader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ijin_header';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IIJN_NM'], 'string', 'max' => 100],
            [['IJIN_KET'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IJN_ID' => Yii::t('app', 'Ijn  ID'),
            'IIJN_NM' => Yii::t('app', 'Iijn  Nm'),
            'IJIN_KET' => Yii::t('app', 'Ijin  Ket'),
        ];
    }
}
