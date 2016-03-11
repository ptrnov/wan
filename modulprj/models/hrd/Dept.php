<?php
/**
 * NOTE: Nama Class harus diawali Hurup Besar
 * Server Linux 	: hurup besar/kecil bermasalah -case sensitif-
 * Server Windows 	: hurup besar/kecil tidak bermasalah
 * Author: -ptr.nov-
*/

namespace modulprj\models\hrd;
use kartik\builder\Form;
use Yii;

/**
 * DEPARTMENT CLASS  Author: -ptr.nov-
 */
class Dept extends \yii\db\ActiveRecord
{
	/* [1] SOURCE DB */
    public static function getDb()
    {
        /* Author -ptr.nov- :UMUM */
        return \Yii::$app->db1;
    }
	
	/* [2] TABLE SELECT */
    public static function tableName()
    {
        return '{{attpayroll.departemen}}';
    }

	/* [3] RULE SCENARIO -> DetailView */
    public function rules()
    {
        return [
            [['DEP_ID','DEP_NM'], 'required'],
            [['DEP_ID'], 'integer'],
            [['DEP_NM'], 'string', 'max' => 30],
        ];
    }

	/* [4] ATRIBUTE LABEL -> DetailView/GridView */
    public function attributeLabels()
    {
        return [
            'DEP_ID' => Yii::t('app', 'Dept.ID  :'),
            'DEP_NM' => Yii::t('app', 'Dept.Name    :'),
        ];
    }
}


