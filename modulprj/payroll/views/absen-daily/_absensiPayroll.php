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
use yii\helpers\Url;
use yii\web\View;
use modulprj\payroll\models\AbsenPayrollPaidSearch;	
use modulprj\absensi\models\AbsenImportPeriode;
use modulprj\master\models\Dept;
use modulprj\master\models\Machine;

	//SETTING PERIODE
	$modelPrd=AbsenImportPeriode::find()->where(['TIPE'=>'0','AKTIF'=>'1'])->one();
	$perodeVal="<b>PERIODE AKTIF : </b>".$modelPrd->TGL_START." s/d ".$modelPrd->TGL_END;
	$perode='<span class="fa-stack fa-xs text-right">				  
				<i class="fa fa-mail-forward fa-1x"></i>
			 </span> '.$perodeVal.'			
	';
	
	$aryCbgMachine=ArrayHelper::map(Machine::find()->all(), 'CAB_ID','MESIN_NM');
	$aryDept=ArrayHelper::map(Dept::find()->all(), 'DEP_NM','DEP_NM');
	
	$aryFieldPayroll= [
		['ID' =>0, 'ATTR' =>['FIELD'=>'KAR_NM','SIZE' => '180px','label'=>'KARYAWAN','align'=>'left','format'=>'raw','mergeHeader'=>false,'FILTER'=>true]],		  
		['ID' =>1, 'ATTR' =>['FIELD'=>'MESIN_NM','SIZE' => '50px','label'=>'CABANG','align'=>'left','format'=>'raw','mergeHeader'=>false,'FILTER'=>$aryCbgMachine]],
		['ID' =>2, 'ATTR' =>['FIELD'=>'DEP_NM','SIZE' => '50px','label'=>'DEPARTMENT','align'=>'left','format'=>'raw','mergeHeader'=>false,'FILTER'=>$aryDept]],
		['ID' =>3, 'ATTR' =>['FIELD'=>'PAY_DAY','SIZE' => '40px','label'=>'UPAH/HARI','align'=>'right','format'=>['decimal', 2],'mergeHeader'=>true,'FILTER'=>false]],
		['ID' =>4, 'ATTR' =>['FIELD'=>'TTL_PAGI','SIZE' => '50px','label'=>'PAGI','align'=>'right','format'=>['decimal', 2],'mergeHeader'=>true,'FILTER'=>false]],
		['ID' =>5, 'ATTR' =>['FIELD'=>'TTL_LBR','SIZE' => '50px','label'=>'LEMBUR','align'=>'right','format'=>['decimal', 2],'mergeHeader'=>true,'FILTER'=>false]],
		['ID' =>6, 'ATTR' =>['FIELD'=>'SUB_PAY_PAGI','SIZE' => '50px','label'=>'TOTAL PAGI','align'=>'right','format'=>['decimal', 2],'mergeHeader'=>true,'FILTER'=>false]],
		['ID' =>7, 'ATTR' =>['FIELD'=>'SUB_PAY_LBR','SIZE' => '50px','label'=>'TOTAL LEMBUR','align'=>'right','format'=>['decimal', 2],'mergeHeader'=>true,'FILTER'=>false]],
		['ID' =>8, 'ATTR' =>['FIELD'=>'UANG_MAKAN','SIZE' => '50px','label'=>'UANG.MAKAN','align'=>'right','format'=>['decimal', 2],'mergeHeader'=>true,'FILTER'=>false]],
		['ID' =>9, 'ATTR' =>['FIELD'=>'TTL_POTONGAN','SIZE' => '8px','label'=>'POT TELAT','align'=>'right','format'=>['decimal', 2],'mergeHeader'=>true,'FILTER'=>false]],
		['ID' =>10, 'ATTR' =>['FIELD'=>'POT_DIVISI','SIZE' => '8px','label'=>'POT.LBR DIVISI','align'=>'right','format'=>['decimal', 2],'mergeHeader'=>true,'FILTER'=>false]],
		['ID' =>11, 'ATTR' =>['FIELD'=>'TTL_PAY','SIZE' => '6px','label'=>'TOTAL','align'=>'right','format'=>['decimal', 2],'mergeHeader'=>true,'FILTER'=>false]]
	];	
	$valFieldsPayroll = ArrayHelper::map($aryFieldPayroll, 'ID', 'ATTR'); 
	//$bColor='rgba(87,114,111, 1)';
	$bColor='rgba(242, 191, 64, 1)';
	$pageNm='<span class="fa-stack fa-sm text-left">
			  <b class="fa fa-circle fa-stack-2x" style="color:#ffffff"></b>
			  <b class="fa fa-clock-o fa-stack-2x" style="color:#000000"></b>
			</span> <b>Absensi Import</b>
			<span class="fa-stack fa-xs text-right">				  
				  <i class="fa fa-mail-forward fa-1x"></i>
				</span>
			'			
	;
	
	$attDinamikPayroll[] =[			
			'class'=>'kartik\grid\SerialColumn',
			'contentOptions'=>['class'=>'kartik-sheet-style'],
			'width'=>'10px',
			'header'=>'No.',
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'10px',
					'font-family'=>'verdana, arial, sans-serif',
					'font-size'=>'9pt',
					'background-color'=>$bColor,
					'color'=>'white',
				]
			],
			'contentOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'10px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'9pt',
					'color'=>'red',
				]
			],					
	];

	$attDinamikPayroll[]=[	
			'class'=>'kartik\grid\ExpandRowColumn',
			'width'=>'50px',
			'header'=>'Detail',
			'value'=>function ($model, $key, $index, $column) {
				return GridView::ROW_COLLAPSED;
			},
			'detail'=>function ($model, $key, $index, $column){
				//$searchModelDetail = new AbsenPayrollSearch(['IN_TGL'=>$model['IN_TGL'],'KAR_ID'=>$model['KAR_ID']]);
				$modelPrd=AbsenImportPeriode::find()->where(['TIPE'=>'1','AKTIF'=>'1'])->one();
				$closingParam=['tglStart'=>$modelPrd->TGL_START,'tglEnd'=>$modelPrd->TGL_END];
				//$closingParam=['tglStart'=>'2017-09-08','tglEnd'=>'2017-09-14'];
				$searchModelDetailPaid = new AbsenPayrollPaidSearch($closingParam);
				$dataProviderDetailPaid = $searchModelDetailPaid->search(['AbsenPayrollPaidSearch'=>['KAR_ID'=>$model['KAR_ID']]]);
				
				return Yii::$app->controller->renderPartial('_absensiPayrollIndexExpand',[
					'searchModelDetailPaid'=>$searchModelDetailPaid,
					'dataProviderDetailPaid'=>$dataProviderDetailPaid,
					'modelPaid'=>$model
				]);
			},
			'headerOptions'=>[
				'style'=>[
					'text-align'=>'center',
					'width'=>'10px',
					'font-family'=>'verdana, arial, sans-serif',
					'font-size'=>'9pt',
					'background-color'=>$bColor,
					'color'=>'white',
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
	
	/*OTHER ATTRIBUTE*/
	foreach($valFieldsPayroll as $key =>$value[]){	
		if ($value[$key]['FIELD']=='MESIN_NM'){				
			$gvfilterType=GridView::FILTER_SELECT2;
			//$gvfilterType=false;
			//$gvfilter =$aryDeptId;
			$filterWidgetOpt=[				
				'pluginOptions'=>['allowClear'=>true],		
			]; 
			$filterInputOpt=['placeholder'=>'-Pilih Cabang-'];
		}elseif($value[$key]['FIELD']=='DEP_NM'){
			$gvfilterType=GridView::FILTER_SELECT2;
			$filterWidgetOpt=[				
				'pluginOptions'=>['allowClear'=>true],		
			]; 
			$filterInputOpt=['placeholder'=>'-Pilih Dept-'];
		}else{
			$gvfilterType=false;
			//$gvfilter=true;
			$filterWidgetOpt=[];		
			$filterInputOpt=['class'=>"form-control"];	
		};
		$attDinamikPayroll[]=[		
			'attribute'=>$value[$key]['FIELD'],
			'label'=>$value[$key]['label'],
			'filter'=>$value[$key]['FILTER'],
			'filterType'=>$gvfilterType,
			'filterWidgetOptions'=>$filterWidgetOpt,	
			'filterInputOptions'=>$filterInputOpt,				
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>$value[$key]['mergeHeader'],
			'noWrap'=>false,			
			'headerOptions'=>[		
					'style'=>[									
					'text-align'=>'center',
					'width'=>$value[$key]['SIZE'],
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'8pt',
					'background-color'=>$bColor,
					'color'=>'white',
				]
			],  
			'format'=>$value[$key]['format'],
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
	
		
	$gvDailyPayroll= GridView::widget([
		'id'=>'daily-payroll',
		'dataProvider' => $dataProviderPaid,
		'filterModel' => $searchModelPaid,
		'filterRowOptions'=>['style'=>'background-color:'.$bColor.'; align:center'],
		/* 'rowOptions' => function($model, $key, $index, $grid){
				//==NULL===
				if ($model->IN_TGL=='' or $model->IN_WAKTU=='' or $model->OUT_TGL=='' or $model->OUT_WAKTU=='' or 
					$model->TERMINAL_ID=='' or $model->FINGER_ID=='' or $model->KAR_ID=='' or $model->OUT_TGL=='')
				{					
					Yii::$app->db->CreateCommand('UPDATE absen_import_tmp SET STATUS=100 WHERE ID='.$model->ID)->execute();
					return ['class' => 'danger'];
				}elseif(date('Y-m-d h:i:s', strtotime($model->IN_TGL.' '.$model->IN_WAKTU)) >= date('Y-m-d h:i:s', strtotime($model->OUT_TGL.' '.$model->OUT_WAKTU))){
				//===Datetime1 > Dateime2 ====
					Yii::$app->db->CreateCommand('UPDATE absen_import_tmp SET STATUS=101 WHERE ID='.$model->ID)->execute();
					return ['class' => 'danger'];
				}else{
					$numClients =Yii::$app->db->createCommand("SELECT x1.ID FROM absen_import x1 where x1.TERMINAL_ID='".$model->TERMINAL_ID."' AND 
												  x1.FINGER_ID='".$model->FINGER_ID."' AND 
												  x1.IN_TGL='".date('Y-m-d', strtotime($model->IN_TGL.' '.$model->IN_WAKTU))."'
					")->queryScalar();
					//===OVERWRITE====
					if($numClients){
						Yii::$app->db->CreateCommand('UPDATE absen_import_tmp SET STATUS=102 WHERE ID='.$model->ID)->execute();
						return ['class' => 'danger'];
					}else{
					//===SAVED====
						Yii::$app->db->CreateCommand('UPDATE absen_import_tmp SET STATUS=0 WHERE ID='.$model->ID)->execute();
						return ['class' => 'default'];
					}
					
				}
		},	 */			
		'columns' =>$attDinamikPayroll,	
		'toolbar' => [
			'{export}',
		],	
		'panel'=>[
			//'heading'=>$pageNm.'  '.tombolCreate().' '.tombolExportFormat($paramUrl).' '.tombolUpload().' '.tombolSync(),					
			//'heading'=>tombolRefresh().' '.tombolClear().' '.tombolCreateTmp().' IMPORT RULE '.tombolExportFormat($paramUrl).' -> '.tombolUpload().' -> '.tombolSync(),					
			'heading'=>tombolExportExcel().' '.$perode,
			'type'=>'info',
			'after'=>false,
			'before'=>false,
			//'footer'=>false,
			
		],
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>true,
				'id'=>'daily-payroll',
			],
		],
		'hover'=>true, //cursor select
		'responsive'=>true,
		'responsiveWrap'=>true,
		'bordered'=>true,
		'striped'=>'4px',
		'autoXlFormat'=>true,
		'export' => false,
		'export'=>[//export like view grid --ptr.nov-
			'fontAwesome'=>true,
			'showConfirmAlert'=>false,
			'target'=>GridView::TARGET_BLANK
		],
		//'floatHeader'=>false,
		// 'floatHeaderOptions'=>['scrollingTop'=>'200'] 
		// 'floatOverflowContainer'=>true,
		'floatHeader'=>true,
	]);

?>
<?=$gvDailyPayroll?>



