<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;


$emp_active= GridView::widget([
    'id'=>'active-emp',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
	'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],				
    'columns' => $dinamkkColumn,
	'toolbar' => [
		'{export}',
	],	
    'panel'=>[
        'heading'=>'<h3 class="panel-title">Employee List</h3>',
		'type'=>'warning',
		'before'=> Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Create Employee ',
								['modelClass' => 'Kategori',]),'/master/employe/create',[
									'data-toggle'=>"modal",
									'data-target'=>"#modal-create",
									'class' => 'btn btn-success btn-sm'
								]
						),
		'showFooter'=>false,
    ],
    'pjax'=>true,
    'pjaxSettings'=>[
        'options'=>[
            'enablePushState'=>false,
            'id'=>'active-emp',
        ],
    ],
    'hover'=>true, //cursor select
    'responsive'=>true,
    'bordered'=>true,
    'striped'=>true,
    //'autoXlFormat'=>true,
    'export'=>[//export like view grid --ptr.nov-
        'fontAwesome'=>true,
        'showConfirmAlert'=>false,
        'target'=>GridView::TARGET_BLANK
    ],
	//'floatHeader'=>false,
	 'floatHeaderOptions'=>['scrollingTop'=>'200'] 
]);

?>

	<?=$emp_active?>
