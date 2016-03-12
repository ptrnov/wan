<?php
/*
 * By ptr.nov
 * Load Config CSS/JS
 */
/* YII CLASS */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;

/* TABLE CLASS DEVELOPE -> |DROPDOWN,PRIMARYKEY-> ATTRIBUTE */
use modulprj\master\models\Dept;
/*	KARTIK WIDGET -> Penambahan componen dari yii2 dan nampak lebih cantik*/
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;

use modulprj\assets\AppAsset; 	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
AppAsset::register($this);		/* INDEPENDENT CSS/JS/THEME FOR PAGE  Author: -ptr.nov-*/

/*Title page Modul*/
$this->mddPage = 'hrd';
$this->title = Yii::t('app', 'Department');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
	/*DEPARTMENT Author: -ptr.nov */
	//print_r($dataProvider);
	$widget_dept= GridView::widget([
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
                'id'=>'active',
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


$items=[
    [
        'label'=>'<i class="glyphicon glyphicon-home"></i> Department List','content'=>$widget_dept,
        //'active'=>true,

    ],

];



echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    //'height'=>'tab-height-xs',
    'bordered'=>true,
    'encodeLabels'=>false,
    //'align'=>TabsX::ALIGN_LEFT,

]);
?>

