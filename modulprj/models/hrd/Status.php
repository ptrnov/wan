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
 *  STATUS CLASS Author: -ptr.nov-	
 */
class Status extends \yii\db\ActiveRecord
{
	/* [1] SOURCE DB */
    public static function getDb()
    {
        /* Author -ptr.nov- */
        return \Yii::$app->db1;
    }
	
	/* [2] TABLE SELECT */
    public static function tableName()
    {
        return '{{attpayroll.kar_stt}}';
    }

	/* [3] RULE SCENARIO -> DetailView */
    public function rules()
    {
        return [
            [['KAR_STS_ID'], 'required'],
            [['KAR_STS_ID'], 'integer'],
            [['KAR_STS_NM'], 'string', 'max' => 30],

        ];
    }
	
	/* [4] ATRIBUTE LABEL -> DetailView/GridView */
    public function attributeLabels()
    {
        return [
            'KAR_STS_ID' => Yii::t('app', 'Status.ID'),
            'KAR_STS_NM' => Yii::t('app', 'Status'),

        ];
    }
}


