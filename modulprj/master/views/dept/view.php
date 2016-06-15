<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use modulprj\models\hrd\Dept;
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
	$Dept_MDL = Dept::find()->where(['DEP_ID'=>$model->DEP_ID])->orderBy('DEP_NM')->one();
	$Val_Jabatan=$Dept_MDL->DEP_NM;
	$attribute = [
        [
            'group'=>true,
            'label'=>'DEPARTMENT',
            'rowOptions'=>['class'=>'info'],
            //'groupOptions'=>['class'=>'text-center']
        ],
		[
			'attribute' =>'DEP_ID',
            'options'=>[
                    'readonly'=>true,
            ],
			//'inputWidth'=>'20%'
		],	
		[
			'attribute' =>	'DEP_NM',
			//'inputWidth'=>'40%'					
		],

	];
	$dept= DetailView::widget([
		'model' => $model,				
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'panel'=>[
			'heading'=> ' [ ' . $model->DEP_ID . ' ] '.$model->DEP_NM,
			'type'=>DetailView::TYPE_INFO,
		],	
		'attributes'=>$attribute,
	]);			
?>
<div class="col-xs-12 col-sm-12 col-dm-12  col-lg-12">
	<div class="raw">
		<div class="col-xs-12 col-sm-12 col-dm-4  col-lg-4">
			<div class="raw">
				<?=$dept?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-dm-4  col-lg-4">
			<div class="raw">
				<?=$dept?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-dm-4  col-lg-4">
			<div class="raw">
				<?=$dept?>
			</div>
		</div>		
	</div>
<div class="col-xs-12 col-sm-6 col-dm-4  col-lg-4">
