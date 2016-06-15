<?php
use kartik\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
use modulprj\assets\AppAsset; 	
AppAsset::register($this);
use modulprj\master\models\Dept;

	/*DEPARTMENT Author: -ptr.nov */
	//print_r($dataProvider);
	$gv_dept= GridView::widget([
		'id'=>'id-dept',
		'dataProvider' => $dataProvider_Dept,
		'filterModel' => $searchModel_Dept,
		'columns' => [
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
			//['class' => 'yii\grid\SerialColumn'],
			'DEP_ID',
			'DEP_NM',

		],
		'panel'=>[
            //'heading' =>true,// $hdr,//<div class="col-lg-4"><h8>'. $hdr .'</h8></div>',
            'type' =>GridView::TYPE_SUCCESS,//TYPE_WARNING, //TYPE_DANGER, //GridView::TYPE_SUCCESS,//GridView::TYPE_INFO, //TYPE_PRIMARY, TYPE_INFO
            //'after'=> Html::a('<i class="glyphicon glyphicon-plus"></i> Add', '#', ['class'=>'btn btn-success']) . ' ' .
            //Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Save', ['class'=>'btn btn-primary']) . ' ' .
            //    Html::a('<i class="glyphicon glyphicon-remove"></i> Delete  ', '#', ['class'=>'btn btn-danger'])
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Create {modelClass}',
                        ['modelClass' => 'Department',]),
                    ['create'], ['class' => 'btn btn-success']),
        ],
        'pjax'=>true,
        'pjaxSettings'=>[
            'options'=>[
                'enablePushState'=>false,
                'id'=>'id-dept',
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
	]);
?>
	<?=$gv_dept?>




