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
	$modelDetail=$dataProviderDetail->getModels();
	foreach($modelDetail[0] as $rows => $val){
		$ambilField[]=$rows;
		$ambilValue[]=$val;
	};
	
	//print_r($ambilField);
	print_r($ambilValue);
	die();

	$this->registerCss("
		#daily-absen-detail
		.kv-grid-container{
				min-height:10px			
		}
	");
	$aryFieldAbsensiDetail= [
		['ID' =>0, 'ATTR' =>['FIELD'=>'VAL_PAGI','SIZE' => '6px','label'=>'PAGI','align'=>'center']],
		['ID' =>1, 'ATTR' =>['FIELD'=>'VAL_PAGI','SIZE' => '6px','label'=>'OT','align'=>'center']],
		['ID' =>2, 'ATTR' =>['FIELD'=>'VAL_PAGI','SIZE' => '6px','label'=>'PAGI','align'=>'center']],
		['ID' =>3, 'ATTR' =>['FIELD'=>'VAL_PAGI','SIZE' => '6px','label'=>'OT','align'=>'center']],
		['ID' =>4, 'ATTR' =>['FIELD'=>'VAL_PAGI','SIZE' => '6px','label'=>'PAGI','align'=>'center']],
		['ID' =>5, 'ATTR' =>['FIELD'=>'VAL_PAGI','SIZE' => '6px','label'=>'OT','align'=>'center']],
		['ID' =>6, 'ATTR' =>['FIELD'=>'VAL_PAGI','SIZE' => '6px','label'=>'PAGI','align'=>'center']],
		['ID' =>7, 'ATTR' =>['FIELD'=>'VAL_PAGI','SIZE' => '6px','label'=>'OT','align'=>'center']],
		['ID' =>8, 'ATTR' =>['FIELD'=>'VAL_PAGI','SIZE' => '6px','label'=>'PAGI','align'=>'center']],
		['ID' =>9, 'ATTR' =>['FIELD'=>'VAL_PAGI','SIZE' => '6px','label'=>'OT','align'=>'center']],
		['ID' =>10, 'ATTR' =>['FIELD'=>'VAL_PAGI','SIZE' => '6px','label'=>'PAGI','align'=>'center']],
		['ID' =>11, 'ATTR' =>['FIELD'=>'VAL_PAGI','SIZE' => '6px','label'=>'OT','align'=>'center']],
		['ID' =>12, 'ATTR' =>['FIELD'=>'VAL_PAGI','SIZE' => '6px','label'=>'PAGI','align'=>'center']],
		['ID' =>13, 'ATTR' =>['FIELD'=>'VAL_PAGI','SIZE' => '6px','label'=>'OT','align'=>'center']],
		['ID' =>14, 'ATTR' =>['FIELD'=>'VAL_PAGI','SIZE' => '6px','label'=>'PAGI','align'=>'center']],
		['ID' =>15, 'ATTR' =>['FIELD'=>'VAL_PAGI','SIZE' => '6px','label'=>'OT','align'=>'center']],
		['ID' =>16, 'ATTR' =>['FIELD'=>'PAY_DAY','SIZE' => '6px','label'=>'PERHARI','align'=>'center']]
	];	
	$valFieldsAbsenDetail = ArrayHelper::map($aryFieldAbsensiDetail, 'ID', 'ATTR'); 
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
	$arySttAbsensiDetail= [
	  ['STATUS' => 0, 'STT_NM' => 'Ready'],		  
	  ['STATUS' => 100, 'STT_NM' => 'Empty'],
	  ['STATUS' => 101, 'STT_NM' => 'DateTime'],
	  ['STATUS' => 102, 'STT_NM' => 'OverWrite']
	];	
	$valSttAbsensiDetail = ArrayHelper::map($arySttAbsensiDetail, 'STATUS', 'STT_NM');

	/*OTHER ATTRIBUTE*/
	foreach($valFieldsAbsenDetail as $key =>$value[]){			
		$attDinamikAbsensiDetail[]=[		
			'attribute'=>$value[$key]['FIELD'],
			'label'=>$value[$key]['label'],
			// 'filterType'=>$gvfilterType,
			// 'filter'=>$gvfilter,
			// 'filterWidgetOptions'=>$filterWidgetOpt,	
			//'filterInputOptions'=>$filterInputOpt,				
			'hAlign'=>'right',
			'vAlign'=>'middle',
			//'mergeHeader'=>true,
			'noWrap'=>true,			
			'headerOptions'=>[		
					'style'=>[									
					'text-align'=>'center',
					'width'=>$value[$key]['SIZE'],
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'7pt',
					'background-color'=>$bColor,
				]
			],  
			'contentOptions'=>[
				'style'=>[
					'text-align'=>$value[$key]['align'],
					//'width'=>'12px',
					'font-family'=>'tahoma, arial, sans-serif',
					'font-size'=>'7pt',
					//'background-color'=>'rgba(13, 127, 3, 0.1)',
				]
			],
			//'pageSummaryFunc'=>GridView::F_SUM,
			//'pageSummary'=>true,
			'pageSummaryOptions' => [
				'style'=>[
						'text-align'=>'right',		
						'font-family'=>'tahoma',
						'font-size'=>'7pt',	
						'text-decoration'=>'underline',
						'font-weight'=>'bold',
						'border-left-color'=>'transparant',		
						'border-left'=>'0px',									
				]
			],	
		];	
	};	
	

	$date = $modelHeader[0]['TGL_START'];
	$end_date =$modelHeader[0]['TGL_END'];
	while (strtotime($date) <= strtotime($end_date)) {
        $headerContent1[]=['content'=>$date,'options'=>['colspan'=>2,'class'=>'text-center danger','style'=>'font-family: tahoma ;font-size: 6pt;']];
		$headerContent2[]=['content'=>Yii::$app->hari->DayofDate($date),'options'=>['colspan'=>2,'class'=>'text-center warning','style'=>'font-family: tahoma ;font-size: 6pt;']];    
		$date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
	
	}
	$headerContent1[]=['content'=>'KETERANGAN','options'=>['colspan'=>4,'class'=>'text-center danger','style'=>'font-family: tahoma ;font-size: 6pt;']];						
	$headerContent2[]=['content'=>'HARI KERJA','options'=>['colspan'=>2,'class'=>'text-center warning','style'=>'font-family: tahoma ;font-size: 6pt;']];
	$headerContent2[]=['content'=>'UPAH','options'=>['colspan'=>2,'class'=>'text-center warning','style'=>'font-family: tahoma ;font-size: 6pt;']];					
	
	$gvDailyAbsenDetail= GridView::widget([
		'id'=>'daily-absen-detail',
		'dataProvider' => $dataProviderDetail,
		//'filterModel' => $searchModelDetail,
		'filterRowOptions'=>['style'=>'background-color:'.$bColor.'; align:center'],
		'beforeHeader'=>[
				'0'=>[					
					'columns'=>$headerContent1,
					// [
						// ['content'=>$modelHeader['TGL_JUMAT'],'options'=>['colspan'=>2,'class'=>'text-center danger','style'=>'font-family: tahoma ;font-size: 6pt;']],
						// ['content'=>$modelHeader['TGL_SABTU'],'options'=>['colspan'=>2,'class'=>'text-center danger','style'=>'font-family: tahoma ;font-size: 6pt;']],
						// ['content'=>$modelHeader['TGL_MINGGU'],'options'=>['colspan'=>2,'class'=>'text-center danger','style'=>'font-family: tahoma ;font-size: 6pt;']],
						// ['content'=>$modelHeader['TGL_SENEN'],'options'=>['colspan'=>2,'class'=>'text-center danger','style'=>'font-family: tahoma ;font-size: 6pt;']],
						// ['content'=>$modelHeader['TGL_SELASA'],'options'=>['colspan'=>2,'class'=>'text-center danger','style'=>'font-family: tahoma ;font-size: 6pt;']],
						// ['content'=>$modelHeader['TGL_RABU'],'options'=>['colspan'=>2,'class'=>'text-center danger','style'=>'font-family: tahoma ;font-size: 6pt;']],
						// ['content'=>$modelHeader['TGL_KAMIS'],'options'=>['colspan'=>2,'class'=>'text-center danger','style'=>'font-family: tahoma ;font-size: 6pt;']],						
						// ['content'=>'KETERANGAN','options'=>['colspan'=>4,'class'=>'text-center danger','style'=>'font-family: tahoma ;font-size: 6pt;']],						
					// ],					
				],				
				'1'=>[					
					'columns'=>$headerContent2,
					// [
						// ['content'=>'JUMAT','options'=>['colspan'=>2,'class'=>'text-center warning','style'=>'font-family: tahoma ;font-size: 6pt;']],
						// ['content'=>'SABTU','options'=>['colspan'=>2,'class'=>'text-center warning','style'=>'font-family: tahoma ;font-size: 6pt;']],
						// ['content'=>'MINGGU','options'=>['colspan'=>2,'class'=>'text-center warning','style'=>'font-family: tahoma ;font-size: 6pt;']],
						// ['content'=>'SENEN','options'=>['colspan'=>2,'class'=>'text-center warning','style'=>'font-family: tahoma ;font-size: 6pt;']],
						// ['content'=>'SELASA','options'=>['colspan'=>2,'class'=>'text-center warning','style'=>'font-family: tahoma ;font-size: 6pt;']],
						// ['content'=>'RABU','options'=>['colspan'=>2,'class'=>'text-center warning','style'=>'font-family: tahoma ;font-size: 6pt;']],
						// ['content'=>'KAMIS','options'=>['colspan'=>2,'class'=>'text-center warning','style'=>'font-family: tahoma ;font-size: 6pt;']],						
						// ['content'=>'HARI KERJA','options'=>['colspan'=>2,'class'=>'text-center warning','style'=>'font-family: tahoma ;font-size: 6pt;']],						
						// ['content'=>'UPAH','options'=>['colspan'=>2,'class'=>'text-center warning','style'=>'font-family: tahoma ;font-size: 6pt;']],						
					// ],				
				]
			],		
		'columns' =>$attDinamikAbsensiDetail,	
		'toolbar' => [
			'{export}',
		],	
		'panel'=>false,
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>false,
				'id'=>'daily-absen-detail',
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
		'summary'=>false,
	]);
?>
<?=$gvDailyAbsenDetail?>


