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
use app\models\hrd\Jabatan;
use modulprj\models\system\side_menu\M1000;

/*	KARTIK WIDGET -> Penambahan componen dari yii2 dan nampak lebih cantik*/
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
use kartik\sidenav\SideNav;

use backend\assets\AppAsset; 	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
AppAsset::register($this);		/* INDEPENDENT CSS/JS/THEME FOR PAGE  Author: -ptr.nov-*/

/*Title page Modul*/
$this->mddPage = 'hrd';
$this->title = Yii::t('app', 'Jabatan');
$this->params['breadcrumbs'][] = $this->title;

/*variable Dropdown*/
$side_menu=\yii\helpers\Json::decode(M1000::find()->findMenu('hrd')->one()->jval);
?>

<?php
	/*DEPARTMENT Author: -ptr.nov */
	//print_r($dataProvider);
$widget_jabatan= GridView::widget([
		'dataProvider' => $dataProvider_Jab,
		'filterModel' => $searchModel_Jab,
		'columns' => [
			//['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
			'JAB_ID',
			'JAB_NM',

			//['class' => 'yii\grid\CheckboxColumn'],
			//['class' => '\kartik\grid\RadioColumn'],
		],
		'panel'=>[
            //'heading' =>true,// $hdr,//<div class="col-lg-4"><h8>'. $hdr .'</h8></div>',
            'type' =>GridView::TYPE_SUCCESS,//TYPE_WARNING, //TYPE_DANGER, //GridView::TYPE_SUCCESS,//GridView::TYPE_INFO, //TYPE_PRIMARY, TYPE_INFO
            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Create {modelClass}',
            ['modelClass' => 'Jabatan',]),
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
        'label'=>'<i class="glyphicon glyphicon-home"></i> Jabatan List','content'=>$widget_jabatan,
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
	

