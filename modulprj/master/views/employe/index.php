<?php
/*
 * By ptr.nov
 * Load Config CSS/JS
 */
/* YII CLASS */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Modal;


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
//use kartik\sidenav\SideNav;

use modulprj\assets\AppAsset; 	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
AppAsset::register($this);		/* INDEPENDENT CSS/JS/THEME FOR PAGE  Author: -ptr.nov-*/

/*Title page Modul*/
$this->mddPage = 'hrd';
$this->params['breadcrumbs'][] = $this->title;
$this->sideCorp="Employee"; 

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
	//'floatHeader'=>false,
	 'floatHeaderOptions'=>['scrollingTop'=>'200'] 
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
            'filter' => $aryDept,
        ],
        [
            //--CABANG-- Author -ptr.nov-
            'attribute' =>'cabOne.CAB_NM',
            'filter' => $aryCbgID,
        ],
        [
            //--JABATAN-- Author -ptr.nov-
            'attribute' =>'jabOne.JAB_NM',
            'filter' => $aryJab,
        ],
        [
            //--STSTUS-- Author -ptr.nov-
            'attribute' =>'stsOne.KAR_STS_NM',
            'filter' => $aryStt,
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
<?php
	/*
	 * CREATE EMPLOYEE JS
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	$this->registerJs("
		 $.fn.modal.Constructor.prototype.enforceFocus = function(){};
		 $('#modal-create').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget)
			var modal = $(this)
			var title = button.data('title')
			var href = button.attr('href')
			//modal.find('.modal-title').html(title)
			modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
			$.post(href)
				.done(function( data ) {
					modal.find('.modal-body').html(data)
				});
			})
	",$this::POS_READY);
    Modal::begin([
        'id' => 'modal-create',
		'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-book"></div><div><h4 class="modal-title">Create Employee</h4></div>',
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(97, 211, 96, 0.3)',
		],
    ]);
    Modal::end();
	
	/*
	 * EDIT EMPLOYEE TITLE
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	$this->registerJs("
		 $.fn.modal.Constructor.prototype.enforceFocus = function(){};
		 $('#edit-title').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget)
			var modal = $(this)
			var title = button.data('title')
			var href = button.attr('href')
			//modal.find('.modal-title').html(title)
			modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
			$.post(href)
				.done(function( data ) {
					modal.find('.modal-body').html(data)
				});
			})
	",$this::POS_READY);
    Modal::begin([
        'id' => 'edit-title',
		'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-book"></div><div><h4 class="modal-title">COMPANY IDENTIFICATION</h4></div>',
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(97, 211, 96, 0.3)',
		],
    ]);
    Modal::end();

	/*
	 * EDIT EMPLOYEE PROFILE
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	$this->registerJs("
		 $.fn.modal.Constructor.prototype.enforceFocus = function(){};
		 $('#edit-profile').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget)
			var modal = $(this)
			var title = button.data('title')
			var href = button.attr('href')
			//modal.find('.modal-title').html(title)
			modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
			$.post(href)
				.done(function( data ) {
					modal.find('.modal-body').html(data)
				});
			})
	",$this::POS_READY);
    Modal::begin([
        'id' => 'edit-profile',
		'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-book"></div><div><h4 class="modal-title">EMPLOYEE IDENTITY</h4></div>',
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(97, 211, 96, 0.3)',
		],
    ]);
    Modal::end();
	
	
	/*
	 * EDIT DATA PAYROLL
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	$this->registerJs("
		 $.fn.modal.Constructor.prototype.enforceFocus = function(){};
		 $('#edit-payroll').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget)
			var modal = $(this)
			var title = button.data('title')
			var href = button.attr('href')
			//modal.find('.modal-title').html(title)
			modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
			$.post(href)
				.done(function( data ) {
					modal.find('.modal-body').html(data)
				});
			})
	",$this::POS_READY);
    Modal::begin([
        'id' => 'edit-payroll',
		'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-book"></div><div><h4 class="modal-title">Edit Payrol Data</h4></div>',
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(97, 211, 96, 0.3)',
		],
    ]);
    Modal::end();
	
	/*
	 * EDIT EMPLOYEE VIEW ALL
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	$this->registerJs("
		 $.fn.modal.Constructor.prototype.enforceFocus = function(){};
		 $('#modal-view').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget)
			var modal = $(this)
			var title = button.data('title')
			var href = button.attr('href')
			//modal.find('.modal-title').html(title)
			modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
			$.post(href)
				.done(function( data ) {
					modal.find('.modal-body').html(data)
				});
			})
	",$this::POS_READY);
    Modal::begin([
        'id' => 'modal-view',
		'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-user"></div><div><h5 class="modal-title"><b>VIEW EMPLOYEE</b></h5></div>',
		'size' => Modal::SIZE_LARGE,
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(97, 211, 96, 0.3)',
		],
    ]);
    Modal::end();

?>
