<?php
use kartik\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\editable\Editable;

use modulprj\master\models\Machine;
use modulprj\master\models\Key_list;

$aryMachine = ArrayHelper::map(Machine::find()->all(),'TerminalID','MESIN_NM');
$aryKeylist = ArrayHelper::map(Key_list::find()->all(),'FunctionKey','FunctionKeyNM');


/*Title page Modul*/
$this->mddPage = 'hrd';
$this->params['breadcrumbs'][] = $this->title;
$this->sideCorp="Employee";

	$aryFlag= [
		  ['ID' =>0, 'DESCRIP' => 'Online'],		  
		  ['ID' =>1, 'DESCRIP' => 'Offline'],
		  ['ID' =>2, 'DESCRIP' => 'USB']
	];	
	$valFlag = ArrayHelper::map($aryFlag, 'DESCRIP', 'DESCRIP'); 



	/*
	 * COLUMN LOG ABSENSI
	 * @author ptrnov  [piter@lukison.com]
	 * @since 1.2
	*/
	$clmLog=[
		[	//COL-0
			/* Attribute Serial No */
			'class'=>'kartik\grid\SerialColumn',
			'width'=>'10px',
			'header'=>'No.',
			'hAlign'=>'center',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'10px',
					'font-family'=>'tahoma',
					'font-size'=>'8pt',
					'background-color'=>'rgba(0, 95, 218, 0.3)',
				]
			],
			'contentOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'10px',
					'font-family'=>'tahoma',
					'font-size'=>'8pt',
				]
			],
			'pageSummaryOptions' => [
				'style'=>[
						'border-right'=>'0px',
				]
			]
		],
		[  	//col-1
			//Finger Machine
			'attribute' =>'TerminalID',// 'machine_nm',
			'filter'=>$aryMachine,
			'value'=>function($model){
				$nmMachine=Machine::find()->where(['TerminalID'=>$model['TerminalID']])->one();
				return $nmMachine!=''?$nmMachine['MESIN_NM']:'Unknown';
			},
			'label'=>'Finger.Machine',
			'hAlign'=>'left',
			'vAlign'=>'middle',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'50px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
					'background-color'=>'rgba(0, 95, 218, 0.3)',
				]
			],
			'contentOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'50px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
				]
			],
		],
		[  	//col-2
			//CUSTOMER GRAOUP NAME
			'attribute' => 'UserID',
			'label'=>'Finger',
			'hAlign'=>'left',
			'vAlign'=>'middle',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'50px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
					'background-color'=>'rgba(0, 95, 218, 0.3)',
				]
			],
			'contentOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'50px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
				]
			],
		],
		[  	//col-3
			//Employee-Name
			'attribute' => 'UserName',
			'label'=>'Finger-UserName',
			'hAlign'=>'left',
			'vAlign'=>'middle',
			'noWrap'=>true,
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'80px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
					'background-color'=>'rgba(0, 95, 218, 0.3)',
				]
			],
			'contentOptions'=>[
				'style'=>[
					'text-align'=>'left',
					'width'=>'80px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
				]
			],
		],
		[  	//col-4
			//Employee-Name
			'attribute' => 'NAMA',
			'label'=>'Employee-Name',
			'hAlign'=>'left',
			'vAlign'=>'middle',
			'noWrap'=>true,
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'80px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
					'background-color'=>'rgba(0, 95, 218, 0.3)',
				]
			],
			'contentOptions'=>[
				'style'=>[
					'text-align'=>'left',
					'width'=>'80px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
				]
			],
		],
		[  	//col-5
			//Finger.Key
			'attribute' => 'FunctionKey',//'Keys_nm',
			'label'=>'Key',
			'filter'=>$aryKeylist,
			'value' => function($model){
				$nmKeylist=Key_list::find()->where(['FunctionKey'=>$model['FunctionKey']])->one();
				return $nmKeylist!=''? $nmKeylist['FunctionKeyNM']:'unknown';
			},
			'hAlign'=>'left',
			'vAlign'=>'middle',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'50px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
					'background-color'=>'rgba(0, 95, 218, 0.3)',
				]
			],
			'contentOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'50px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
				]
			],
		],
		[  	//col-6
			//DateTime
			'attribute' => 'DateTime',
			'label'=>'DateTime',
			'noWrap'=>true,
			'filterType' => GridView::FILTER_DATE,
            'filterWidgetOptions' => [
					'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',					 
                    'autoclose' => true,
                    'todayHighlight' => true,
					//'format' => 'dd-mm-yyyy hh:mm',
					'autoWidget' => false,
					//'todayBtn' => true,
                ]
            ],
			'hAlign'=>'left',
			'vAlign'=>'middle',
			
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'100px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
					'background-color'=>'rgba(0, 95, 218, 0.3)',
				]
			],
			'contentOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'100px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
				]
			],
		],
		[  	//col-7
			//FlagAbsence
			'attribute' => 'FlagAbsence',
			'label'=>'Key',
			'noWrap'=>false,
			'filter'=>$valFlag,			
			'hAlign'=>'left',
			'vAlign'=>'middle',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'80px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
					'background-color'=>'rgba(0, 95, 218, 0.3)',
				]
			],
			'contentOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'80px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
				]
			],
		],
		[	//col-8
			'class'=>'kartik\grid\ActionColumn',
			'dropdown' => true,
			'template' => '{karfinger}{delete}',
			'dropdownOptions'=>['class'=>'pull-right dropup'],
			'dropdownButton'=>['class'=>'btn btn-default btn-xs'],
			'buttons' => [
					'karfinger' =>function($url, $model, $key){
							return  '<li>' .Html::a('<span class="fa fa-eye fa-dm"></span>'.Yii::t('app', 'Employee To Finger'),
														[	
															'/master/absen-maintain/finger-emp',
															'm'=>$model['TerminalID'],
															'f'=>$model['UserID']
														
														],[	
														'data-toggle'=>"modal",
														'data-target'=>"#modal-view",
														'data-pjax'=>true,														
														//'data-title'=> 'RT0'.$model['UserID'],
														]). '</li>' . PHP_EOL;
					},
					'delete' =>function($url, $model, $key){
						return  '<li>' .Html::a('<span class="fa fa-remove fa-dm"></span>'.Yii::t('app', 'delete'),
													[	'/master/absen-maintain/delete',
														'm'=>$model['TerminalID'],		 // terminal Id																									
														'f'=>$model['UserID'],			 //Finger Id
														'e'=>$model['KAR_ID'],			 //employe Id
													],
													[
														'data-method'=>'post',
														'data-confirm'=>'Anda yakin ingin menghapus data  Finger: '.$model['UserName'].' dengan Karyawan: '. $model['NAMA'].' ?',
													]). '</li>' . PHP_EOL;
					},					
			],
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'40px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
					'background-color'=>'rgba(0, 95, 218, 0.3)',
				]
			],
			'contentOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'40px',
					'height'=>'10px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
				]
			],

		],
	];
		
	/*
	 * LOG ABSENSI
	 * @author ptrnov  [piter@lukison.com]
	 * @since 1.2
	*/
	$gvAbsenLog=GridView::widget([
		'id'=>'absenlog',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'filterRowOptions'=>['style'=>'background-color:rgba(0, 95, 218, 0.3); align:center'],
		'showPageSummary' => true,
		'columns' =>$clmLog,
		'pjax'=>true,
		'pjaxSettings'=>[
		'options'=>[
			'enablePushState'=>false,
			'id'=>'absenlog',
		   ],
		],
		'panel' => [
					'heading'=>'<h3 class="panel-title" style="font-family:tahoma, arial, sans-serif;font-size:9pt;text-align:left;"><b>EMPLOYEE MAINTAIN LOG FINGER</b></h3>',
					'type'=>'warning',
					/*'before'=> Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Add Customer ',
							['modelClass' => 'Kategori',]),'/master/barang/create',[
								'data-toggle'=>"modal",
									'data-target'=>"#modal-create",
										'class' => 'btn btn-success'
													]), */
					'showFooter'=>false,
		],
		'toolbar'=> [
			//'{items}',
		], 
		'hover'=>true, //cursor select
		'responsive'=>true,
		'responsiveWrap'=>true,
		'bordered'=>true,
		'striped'=>'4px',
		'autoXlFormat'=>true,
		'export' => false,		
	]);
	
	
?>


<div class="body-content">
    <div class="row" style="padding-left: 5px; padding-right: 5px;font-family: verdana, arial, sans-serif ;font-size: 8pt">
        <div class="col-sm-11 col-md-11 col-lg-11" style="padding-left:25px;padding-right:25px;font-family: verdana, arial, sans-serif ;font-size: 8pt">
            <?php            		
				echo $gvAbsenLog;
            ?>
        </div>		
    </div>
</div>
<?php
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
      	'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-book"></div><div><h4 class="modal-title">Change Finger Employee</h4></div>',
		'headerOptions'=>[								
				'style'=> 'border-radius:5px; background-color: rgba(0, 95, 218, 0.3)',	
		],
    ]);
    Modal::end();
?>



<?php
/* $this->registerJs("
		$(document).on('click', '[data-toggle-approved]', function(e){
			e.preventDefault();
			var idx = $(this).data('toggle-approved');
			$.ajax({
					url: '/hrd/absen-log/cari?int=1',
					type: 'POST',
					//contentType: 'application/json; charset=utf-8',
					data:'id='+idx,
					dataType: 'json',
					success: function(result) {
						if (result == 1){
							// Success
							$.pjax.reload({container:'#absenlog'});
						} else {
							// Fail
						}
					}
				});

		});
	",$this::POS_READY); */
?>


