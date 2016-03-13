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
use modulprj\master\models\karyawan;
use modulprj\master\models\Dept;
use modulprj\master\models\cbg;
use modulprj\master\models\Jabatan;
use modulprj\master\models\Status;
use modulprj\sistem\models\M1000;

/*	KARTIK WIDGET -> Penambahan componen dari yii2 dan nampak lebih cantik*/
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
use kartik\sidenav\SideNav;

use modulprj\assets\AppAsset; 	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
AppAsset::register($this);		/* INDEPENDENT CSS/JS/THEME FOR PAGE  Author: -ptr.nov-*/

/*Title page Modul*/
$this->mddPage = 'hrd';
$this->params['breadcrumbs'][] = $this->title;
$this->sideCorp="Employee"; 

/*variable Dropdown*/
$Combo_Dept = ArrayHelper::map(Dept::find()->all(), 'DEP_NM','DEP_NM');//->orderBy('SORT')->asArray()->all(), 'DEP_NM','DEP_NM');
$ComboDept = ArrayHelper::map(Dept::find()->all(), 'DEP_NM','DEP_NM');//->orderBy('SORT')->asArray()->all(), 'DEP_NM','DEP_NM');
$Combo_Cab=ArrayHelper::map(Cbg::find()->all(), 'CAB_NM','CAB_NM');
$Combo_Jab = ArrayHelper::map(Jabatan::find()->all(), 'JAB_NM','JAB_NM');
$Combo_Status = ArrayHelper::map(Status::find()->all(), 'KAR_STS_NM','KAR_STS_NM');

//$Combo_Corp = ArrayHelper::map(Corp::find()->orderBy('SORT')->asArray()->all(), 'CORP_NM','CORP_NM');

//$side_menu=\yii\helpers\Json::decode(M1000::find()->findMenu('hrd')->one()->jval);

$tab_employe_active= GridView::widget([
    'id'=>'active',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
	'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],				
    'columns' => $dinamkkColumn,
	'toolbar' => [
		'{export}',
	],	
    'panel'=>[
        //'heading' =>true,// $hdr,//<div class="col-lg-4"><h8>'. $hdr .'</h8></div>',
        'type' =>GridView::TYPE_SUCCESS,//TYPE_WARNING, //TYPE_DANGER, //GridView::TYPE_SUCCESS,//GridView::TYPE_INFO, //TYPE_PRIMARY, TYPE_INFO
        //'after'=> Html::a('<i class="glyphicon glyphicon-plus"></i> Add', '#', ['class'=>'btn btn-success']) . ' ' .
            //Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Save', ['class'=>'btn btn-primary']) . ' ' .
        //    Html::a('<i class="glyphicon glyphicon-remove"></i> Delete  ', '#', ['class'=>'btn btn-danger'])
        'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Create {modelClass}',
                ['modelClass' => 'Karyawan',]),
                ['create'], ['class' => 'btn btn-success btn-sm']),
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

$tab_employe_resign= GridView::widget([
    'id'=>'resign',
    'dataProvider' => $dataProvider1,
    'filterModel' => $searchModel1,
    'columns' => [
        //['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
            //'template' => '{view} {update}',
            //Yii::t('app', 'Emplo'),
        ],

        [
            // Author -ptr.nov- image
            'attribute' => 'PIC',
            'format' => 'html', //'format' => 'image',
            'value'=>function($data){
                    return Html::img(Yii::getAlias('@HRD_EMP_UploadUrl') . '/'. $data->EMP_IMG, ['width'=>'40']);
                },
        ],

        'KAR_ID',
        'KAR_NM',

        [
            //--DEPARMENT-- Author -ptr.nov-
            'attribute' =>'deptOne.DEP_NM',
            'filter' => $Combo_Dept,
        ],
        [
            //--CABANG-- Author -ptr.nov-
            'attribute' =>'cabOne.CAB_NM',
            'filter' => $Combo_Cab,
        ],
        [
            //--JABATAN-- Author -ptr.nov-
            'attribute' =>'jabOne.JAB_NM',
            'filter' => $Combo_Jab,
        ],
        [
            //--STSTUS-- Author -ptr.nov-
            'attribute' =>'stsOne.KAR_STS_NM',
            'filter' => $Combo_Status,
        ],
        [
            'attribute' =>'KAR_TGLM',
            'filterType'=> \kartik\grid\GridView::FILTER_DATE_RANGE,
            'filterWidgetOptions' =>([
                    'attribute' =>'KAR_TGLM',
                    'presetDropdown'=>TRUE,
                    'convertFormat'=>true,
                    'pluginOptions'=>[
                        'format'=>'Y-m-d',
                        'separator' => ' TO ',
                        'opens'=>'left'
                    ],
                    //'pluginEvents' => [
                    //	"apply.daterangepicker" => "function() { aplicarDateRangeFilter('EMP_JOIN_DATE') }",
                    //]
                ]),

        ],
        [
            'attribute' =>'KAR_TGLK',
            'filterType'=> \kartik\grid\GridView::FILTER_DATE_RANGE,
            'filterWidgetOptions' =>([
                    'attribute' =>'KAR_TGLK',
                    'presetDropdown'=>TRUE,
                    'convertFormat'=>true,
                    'pluginOptions'=>[
                        'format'=>'Y-m-d',
                        'separator' => ' TO ',
                        'opens'=>'left'
                    ],
                    //'pluginEvents' => [
                    //	"apply.daterangepicker" => "function() { aplicarDateRangeFilter('EMP_JOIN_DATE') }",
                    //]
                ]),

        ],
        //['class' => 'yii\grid\CheckboxColumn'],
        //['class' => '\kartik\grid\RadioColumn'],
    ],
    'panel'=>[
        //'heading' =>true,// $hdr,//<div class="col-lg-4"><h8>'. $hdr .'</h8></div>',
        'type' =>GridView::TYPE_SUCCESS,//TYPE_WARNING, //TYPE_DANGER, //GridView::TYPE_SUCCESS,//GridView::TYPE_INFO, //TYPE_PRIMARY, TYPE_INFO
        //'after'=> Html::a('<i class="glyphicon glyphicon-plus"></i> Add', '#', ['class'=>'btn btn-success']) . ' ' .
        //Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Save', ['class'=>'btn btn-primary']) . ' ' .
        //    Html::a('<i class="glyphicon glyphicon-remove"></i> Delete  ', '#', ['class'=>'btn btn-danger'])

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


	/* echo Breadcrumbs::widget([
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]);
	*/
	$items=[
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Employe Active','content'=>$tab_employe_active,
			//'active'=>true,

		],
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Employe Resign','content'=>$tab_employe_resign,
		],
        /*
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Test Affix','content'=>$KiriMenu.$affk,//$sortImg,// ,
		],
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Alrt','content'=>$strRat,//$sortImg,// ,
		],
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> RATING','content'=>$strRat,//$sortImg,// ,
		],
		*/

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

