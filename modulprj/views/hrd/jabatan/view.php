<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use modulprj\models\hrd\Jabatan;
use kartik\detail\DetailView;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveField;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\icons\Icon;
use kartik\widgets\Growl;

$this->mddPage = 'hrd';
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Maxiprodaks'), 'url' => ['prodak']];
//$this->params['breadcrumbs'][] = $this->title;
?>

<?php	
	$Jabatan_MDL = Jabatan::find()->where(['JAB_ID'=>$model->JAB_ID])->orderBy('JAB_ID')->one();
	$Val_Jabatan=$Jabatan_MDL->JAB_NM;
	$attribute = [
        [
            'group'=>true,
            'label'=>'JABATAN',
            'rowOptions'=>['class'=>'info'],
            //'groupOptions'=>['class'=>'text-center']
        ],
		[
			'attribute' =>'JAB_ID',
            'options'=>[
                'readonly'=>true,
            ],
		],	
		[
			'attribute' =>	'JAB_NM',
			//'inputWidth'=>'40%'					
		],

	];
	echo DetailView::widget([
		'model' => $model,
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'panel'=>[
			'heading'=>' [ ' . $model->JAB_ID . ' ] '.$model->JAB_NM,
			'type'=>DetailView::TYPE_INFO,
		],	
		'attributes'=>$attribute,
	]);			
?>
	

