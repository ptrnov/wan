<?php

namespace modulprj\master\models;

use Yii;

/**
 * This is the model class for table "ot_formula".
 *
 * @property integer $FOT_ID
 * @property integer $TT_GRP_ID
 * @property string $FOT_NM
 * @property string $FOT_JAM1
 * @property string $FOT_JAM2
 * @property double $FOT_PERSEN
 */
class FormulaOvertime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ot_formula';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TT_GRP_ID'], 'integer'],
            [['FOT_JAM1', 'FOT_JAM2'], 'safe'],
            [['FOT_PERSEN'], 'number'],
            [['FOT_NM'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FOT_ID' => Yii::t('app', 'Fot  ID'),
            'TT_GRP_ID' => Yii::t('app', 'Tt  Grp  ID'),
            'FOT_NM' => Yii::t('app', 'Fot  Nm'),
            'FOT_JAM1' => Yii::t('app', 'Fot  Jam1'),
            'FOT_JAM2' => Yii::t('app', 'Fot  Jam2'),
            'FOT_PERSEN' => Yii::t('app', 'Fot  Persen'),
        ];
    }
}
