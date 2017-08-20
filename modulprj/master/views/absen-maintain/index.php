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

	$aryField= [
		['ID' =>0, 'ATTR' =>['FIELD'=>'TerminalNm','SIZE' => '150px','label'=>'Finger.Machine','align'=>'left','background-color'=>'rgba(0, 95, 218, 0.3)']],		  
		['ID' =>1, 'ATTR' =>['FIELD'=>'TerminalID','SIZE' => '150px','label'=>'Machine S/N','align'=>'left','background-color'=>'rgba(0, 95, 218, 0.3)']],
		['ID' =>2, 'ATTR' =>['FIELD'=>'UserName','SIZE' => '220px','label'=>'Finger-UserName','align'=>'left','background-color'=>'rgba(0, 95, 218, 0.3)']],
		['ID' =>3, 'ATTR' =>['FIELD'=>'NAMA','SIZE' => '220px','label'=>'Employee-Name','align'=>'left','background-color'=>'rgba(97, 211, 96, 0.3)']]
	];	
	$valFields = ArrayHelper::map($aryField, 'ID', 'ATTR'); 
	
	/*
	 * GRIDVIEW COLUMN
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	*/	
	$attDinamik =[];
	/*NO ATTRIBUTE*/
	$attDinamik[] =[			
			'class'=>'kartik\grid\SerialColumn',
			'contentOptions'=>['class'=>'kartik-sheet-style'],
			'width'=>'5px',
			'header'=>'No.',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'10px',
					'font-family'=>'verdana, arial, sans-serif',
					'font-size'=>'9pt',
					'background-color'=>'rgba(0, 95, 218, 0.3)',
				]
			],
			'contentOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'10px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
				]
			],					
	];

	/*ACTION ATTRIBUTE*/
	$attDinamik[]=[
		'class'=>'kartik\grid\ActionColumn',
		'dropdown' => true,
		'template' => '{karfinger}{delete}',
		'dropdownOptions'=>['class'=>'pull-center dropup'],
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
				'width'=>'10px',
				'font-family'=>'tahoma, arial, sans-serif',
				'font-size'=>'9pt',
				'background-color'=>'rgba(0, 95, 218, 0.3)',
			]
		],
		'contentOptions'=>[
			'style'=>[
				'text-align'=>'center',
				'width'=>'10px',
				'height'=>'10px',
				'font-family'=>'tahoma, arial, sans-serif',
				'font-size'=>'9pt',
			]
		],
	];
	
	/*OTHER ATTRIBUTE*/
	foreach($valFields as $key =>$value[]){
		if ($value[$key]['FIELD']=='TerminalNm'){//TERMINAL NM				
			$gvfilterType=GridView::FILTER_SELECT2;
			$gvfilter =true;
			$filterWidgetOpt=[	
				'data'=>$aryMesin,			
				'pluginOptions'=>['allowClear'=>true,'placeholder'=>'Mashine-Name'],	
			];	
			//$filterInputOpt='[]';	
			$filterOptCspn=1;
			$filterColor='rgba(0, 95, 218, 0.3)';
		}elseif($value[$key]['FIELD']=='TerminalID'){ //TERMINAL SN
			$gvfilterType=false;
			$gvfilter=true;
			$filterWidgetOpt=false;		
			//$filterInputOpt='[]';	
			$filterOptCspn=1;
			$filterColor='rgba(0, 95, 218, 0.3)';
		}elseif($value[$key]['FIELD']=='UserName'){ //FINGER NAME
			$gvfilterType=false;
			$gvfilter=true;
			$filterWidgetOpt=false;		
			//$filterInputOpt='[]';	
			$filterOptCspn=1;
			$filterColor='rgba(0, 95, 218, 0.3)';

		}elseif($value[$key]['FIELD']=='NAMA'){ //EMPLOYEE NAME
			$gvfilterType=false;
			$gvfilter=true;
			$filterWidgetOpt=false;		
			//$filterInputOpt='[]';	
			$filterOptCspn=1;
			$filterColor='rgba(97, 211, 96, 0.3)';
		}else{
 			$gvfilterType=false;
			$gvfilter=false;
			$filterWidgetOpt=false;		
			//$filterInputOpt='[]';	
			$filterOptCspn=1;
			$filterColor='rgba(0, 95, 218, 0.3)';
		};				
			
		$attDinamik[]=[		
			'attribute'=>$value[$key]['FIELD'],
			'label'=>$value[$key]['label'],
			'filter'=>$gvfilter,
			'filterType'=>$gvfilterType,
			'filterWidgetOptions'=>$filterWidgetOpt,	
			//'filterInputOptions'=>$filterInputOpt,
			'filterOptions'=>[
				'colspan'=>$filterOptCspn,
				'style'=>['background-color'=>$filterColor],
			],					
			'hAlign'=>'right',
			'vAlign'=>'middle',
			//'mergeHeader'=>true,
			'noWrap'=>true,			
			'headerOptions'=>[		
					'style'=>[									
					'text-align'=>'center',
					'width'=>$value[$key]['SIZE'],
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					//'background-color'=>'rgba(97, 211, 96, 0.3)',
					'background-color'=>$value[$key]['background-color'],
				]
			],  
			'contentOptions'=>[
				'style'=>[
					'text-align'=>$value[$key]['align'],
					//'width'=>'12px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					//'background-color'=>'rgba(13, 127, 3, 0.1)',
				]
			],
			//'pageSummaryFunc'=>GridView::F_SUM,
			//'pageSummary'=>true,
			'pageSummaryOptions' => [
				'style'=>[
						'text-align'=>'right',		
						//'width'=>'12px',
						'font-family'=>'tahoma',
						'font-size'=>'8pt',	
						'text-decoration'=>'underline',
						'font-weight'=>'bold',
						'border-left-color'=>'transparant',		
						'border-left'=>'0px',									
				]
			],	
		];	
	};			
		
	$fingerMaintain= GridView::widget([
		'id'=>'finger-maintain-id',
		'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'filterRowOptions'=>['style'=>'background-color:rgba(97, 211, 96, 0.3); align:center'],				
		'columns' =>$attDinamik,
		'toolbar' => [
			'',
		],	
		'panel'=>[
			'heading'=>'<h3 class="panel-title">Finger Maintain</h3>',
			//'heading'=>false,
			'type'=>'warning',
			'footer'=>true,
		],
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>false,
				'id'=>'finger-maintain-id',
			],
		],
		'hover'=>true, //cursor select
		'responsive'=>true,
		'bordered'=>true,
		'striped'=>true,
	]);	
?>


<div class="body-content">
    <div class="row" style="padding-left: 5px; padding-right: 5px;font-family: verdana, arial, sans-serif ;font-size: 8pt">
        <div class="col-sm-11 col-md-11 col-lg-11" style="padding-left:25px;padding-right:25px;font-family: verdana, arial, sans-serif ;font-size: 8pt">
            <?php            		
				//echo $gvAbsenLog;
            ?>
			<?=$fingerMaintain?>
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


