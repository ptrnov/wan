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
use modulprj\payroll\models\AbsenPayrollSearch;	
use modulprj\absensi\models\AbsenImportPeriode;

	$modelPrd=AbsenImportPeriode::find()->where(['TIPE'=>'0','AKTIF'=>'1'])->one();
	$perodeVal="<b>PERIODE AKTIF : </b>".$modelPrd->TGL_START." s/d ".$modelPrd->TGL_END;
	$perode='<span class="fa-stack fa-xs text-right">				  
				<i class="fa fa-mail-forward fa-1x"></i>
			 </span> '.$perodeVal.'			
	';
	
	$aryFieldAbsensi= [
		['ID' =>0, 'ATTR' =>['FIELD'=>'KAR_NM','SIZE' => '180px','label'=>'KARYAWAN','align'=>'left','format'=>'raw','mergeHeader'=>false]],		  
		['ID' =>1, 'ATTR' =>['FIELD'=>'DEP_NM','SIZE' => '50px','label'=>'DEPARTMENT','align'=>'left','format'=>'raw','mergeHeader'=>false]],
		['ID' =>2, 'ATTR' =>['FIELD'=>'PAY_DAY','SIZE' => '50px','label'=>'UPAH_PERHARI','align'=>'right','format'=>['decimal', 2],'mergeHeader'=>false]],
		['ID' =>3, 'ATTR' =>['FIELD'=>'TGL_STARTING','SIZE' => '50px','label'=>'PRD_START','align'=>'center','format'=>'raw','mergeHeader'=>true]],
		['ID' =>4, 'ATTR' =>['FIELD'=>'TGL_CLOSING','SIZE' => '50px','label'=>'PRD_END','align'=>'center','format'=>'raw','mergeHeader'=>true]],
		['ID' =>5, 'ATTR' =>['FIELD'=>'TTL_PAGI','SIZE' => '50px','label'=>'PAGI','align'=>'right','format'=>['decimal', 2],'mergeHeader'=>true]],
		['ID' =>6, 'ATTR' =>['FIELD'=>'TTL_OT','SIZE' => '50px','label'=>'LEMBUR','align'=>'right','format'=>['decimal', 2],'mergeHeader'=>true]],
		['ID' =>7, 'ATTR' =>['FIELD'=>'SUB_PAY_PAGI','SIZE' => '50px','label'=>'TTL_PAGI','align'=>'right','format'=>['decimal', 2],'mergeHeader'=>true]],
		['ID' =>8, 'ATTR' =>['FIELD'=>'SUB_PAY_OT','SIZE' => '50px','label'=>'TTL_LEMBUR','align'=>'right','format'=>['decimal', 2],'mergeHeader'=>true]],
		['ID' =>9, 'ATTR' =>['FIELD'=>'TTL_POTONGAN','SIZE' => '8px','label'=>'POTONGAN','align'=>'right','format'=>['decimal', 2],'mergeHeader'=>true]],
		['ID' =>10, 'ATTR' =>['FIELD'=>'TTL_PAY','SIZE' => '6px','label'=>'TOTAL','align'=>'right','format'=>['decimal', 2],'mergeHeader'=>true]]
	];	
	$valFieldsAbsen = ArrayHelper::map($aryFieldAbsensi, 'ID', 'ATTR'); 
	$bColor='rgba(87,114,111, 1)';
	$pageNm='<span class="fa-stack fa-sm text-left">
			  <b class="fa fa-circle fa-stack-2x" style="color:#ffffff"></b>
			  <b class="fa fa-clock-o fa-stack-2x" style="color:#000000"></b>
			</span> <b>Absensi Import</b>
			<span class="fa-stack fa-xs text-right">				  
				  <i class="fa fa-mail-forward fa-1x"></i>
				</span>
			'			
	;
	$arySttAbsensi= [
	  ['STATUS' => 1, 'STT_NM' => 'Ready'],		  
	  ['STATUS' => 2, 'STT_NM' => 'Paid']
	];	
	$valSttAbsensi = ArrayHelper::map($arySttAbsensi, 'STATUS', 'STT_NM');
	
	
	$attDinamikAbsensi[] =[			
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

	$attDinamikAbsensi[]=[	
			'class'=>'kartik\grid\ExpandRowColumn',
			'width'=>'50px',
			'header'=>'Detail',
			'value'=>function ($model, $key, $index, $column) {
				return GridView::ROW_COLLAPSED;
			},
			'detail'=>function ($model, $key, $index, $column){
				//$searchModelDetail = new AbsenPayrollSearch(['IN_TGL'=>$model['IN_TGL'],'KAR_ID'=>$model['KAR_ID']]);
				$modelPrd=AbsenImportPeriode::find()->where(['TIPE'=>'0','AKTIF'=>'1'])->one();
				$closingParam=['tglStart'=>$modelPrd->TGL_START,'tglEnd'=>$modelPrd->TGL_END];
				//$closingParam=['tglStart'=>'2017-09-08','tglEnd'=>'2017-09-14'];
				$searchModelDetail = new AbsenPayrollSearch($closingParam);
				$dataProviderDetail = $searchModelDetail->searchHeader(['AbsenPayrollSearch'=>['KAR_ID'=>$model['KAR_ID']]]);
				//$dataProviderDetail=$searchModelDetail->searchdetails(Yii::$app->request->queryParams);
				// return Yii::$app->controller->renderPartial('_dailyAbsensiDetail',[
					// 'searchModelDetail'=>$searchModelDetail,
					// 'dataProviderDetail'=>$dataProviderDetail
				// ]);
				return Yii::$app->controller->renderPartial('_dailyAbsensiIndexExpand',[
					'searchModelDetail'=>$searchModelDetail,
					'dataProviderDetail'=>$dataProviderDetail,
					'model'=>$model
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
	foreach($valFieldsAbsen as $key =>$value[]){	
		// if($key=='SUB_PAY_PAGI'){
			// $format='raw';//['decimal', 2];
		// }else{
			// $format='raw';
		// }
		$attDinamikAbsensi[]=[		
			'attribute'=>$value[$key]['FIELD'],
			'label'=>$value[$key]['label'],
			// 'filterType'=>$gvfilterType,
			// 'filter'=>$gvfilter,
			// 'filterWidgetOptions'=>$filterWidgetOpt,	
			//'filterInputOptions'=>$filterInputOpt,				
			'hAlign'=>'right',
			'vAlign'=>'middle',
			'mergeHeader'=>$value[$key]['mergeHeader'],
			'noWrap'=>true,			
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
	
	$attDinamikAbsensi[]=[
		'attribute'=>'STATUS',
		'label'=>'STATUS',
		/* 'filterType'=>GridView::FILTER_SELECT2,
		'filterWidgetOptions'=>[
			'pluginOptions' =>Yii::$app->gv->gvPliginSelect2(),
		],
		'filterInputOptions'=>['placeholder'=>'Select'],
		'filter'=>$valSttAbsensi,//Yii::$app->gv->gvStatusArray(),
		'filterOptions'=>Yii::$app->gv->gvFilterContainHeader('0','50px',$bColor), */
		'filter'=>false,
		'hAlign'=>'right',
		'vAlign'=>'middle',
		'mergeHeader'=>true,
		'noWrap'=>false,
		'format' => 'raw',	
		'value'=>function($model){
			if($model['STATUS']==1){
				return 'Ready';
			}elseif($model->STATUS==2){
				return 'Paid';
			};
			//return sttMsgImport($model->STATUS);				 
		},
		//gvContainHeader($align,$width,$bColor)
		'headerOptions'=>Yii::$app->gv->gvContainHeader('center','50',$bColor,'white'),
		'contentOptions'=>Yii::$app->gv->gvContainBody('center','50','')			
	];
	//ACTION
	$attDinamikAbsensi[]=[
		'class' => 'kartik\grid\ActionColumn',
		'template' => '{print}',
		'header'=>'ACTION',
		'dropdown' => true,
		'dropdownOptions'=>[
			'class'=>'pull-right dropdown',
			'style'=>'text-align:center;background-color:#E6E6FA'				
		],
		'dropdownButton'=>[
			'label'=>'ACTION',
			'class'=>'btn btn-default btn-xs',
			'style'=>'width:100%;'		
		],
		'buttons' => [
			'print' =>function ($url, $model){
			 return  tombolPrint($model);
			},
			'delete' =>function ($url, $model){
			  //return  tombolDeleteTmp($url, $model);
			},
		], 
		'headerOptions'=>Yii::$app->gv->gvContainHeader('center','10px',$bColor,'#ffffff'),
		'contentOptions'=>Yii::$app->gv->gvContainBody('center','0',''),
	];
	$gvDailyAbsen= GridView::widget([
		'id'=>'daily-absen',
		'dataProvider' => $dataProviderAbsensi,
		'filterModel' => $searchModelAbsensi,
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
		'columns' =>$attDinamikAbsensi,	
		'toolbar' => [
			'{export}',
		],	
		'panel'=>[
			//'heading'=>$pageNm.'  '.tombolCreate().' '.tombolExportFormat($paramUrl).' '.tombolUpload().' '.tombolSync(),					
			//'heading'=>tombolRefresh().' '.tombolClear().' '.tombolCreateTmp().' IMPORT RULE '.tombolExportFormat($paramUrl).' -> '.tombolUpload().' -> '.tombolSync(),					
			'heading'=>tombolPrintAll(). ' ' .$perode,
			'type'=>'info',
			'after'=>false,
			'before'=>false,
			'footer'=>true,
			
		],
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>false,
				'id'=>'daily-absen',
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
<?=$gvDailyAbsen?>



