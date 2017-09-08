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

	$aryFieldTmp= [
		['ID' =>0, 'ATTR' =>['FIELD'=>'KAR_NM','SIZE' => '180px','label'=>'Karyawan','align'=>'left']],		  
		['ID' =>1, 'ATTR' =>['FIELD'=>'DEP_NM','SIZE' => '50px','label'=>'Department','align'=>'left']],
		['ID' =>2, 'ATTR' =>['FIELD'=>'HARI','SIZE' => '8px','label'=>'Hari','align'=>'left']],
		['ID' =>3, 'ATTR' =>['FIELD'=>'IN_TGL','SIZE' => '6px','label'=>'Tgl.Masuk','align'=>'center']],
		['ID' =>4, 'ATTR' =>['FIELD'=>'IN_WAKTU','SIZE' => '6px','label'=>'Jam.Masuk','align'=>'center']],
		['ID' =>5, 'ATTR' =>['FIELD'=>'OUT_TGL','SIZE' => '6px','label'=>'Tgl.Keluar','align'=>'center']],
		['ID' =>6, 'ATTR' =>['FIELD'=>'OUT_WAKTU','SIZE' => '6px','label'=>'Jam.Keluar','align'=>'center']],
		['ID' =>7, 'ATTR' =>['FIELD'=>'VAL_PAGI','SIZE' => '5px','label'=>'Pagi','align'=>'right']],
		['ID' =>8, 'ATTR' =>['FIELD'=>'VAL_LEMBUR','SIZE' => '5px','label'=>'Lembur','align'=>'right']],
	];	
	$valFieldsTmp = ArrayHelper::map($aryFieldTmp, 'ID', 'ATTR'); 
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
	
	$attDinamikTmp[] =[			
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
	foreach($valFieldsTmp as $key =>$value[]){			
		$attDinamikTmp[]=[		
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
					'font-size'=>'8pt',
					'background-color'=>$bColor,
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
	
	$attDinamikTmp[]=[
		'attribute'=>'STATUS',
		'filterType'=>GridView::FILTER_SELECT2,
		'filterWidgetOptions'=>[
			'pluginOptions' =>Yii::$app->gv->gvPliginSelect2(),
		],
		'filterInputOptions'=>['placeholder'=>'Select'],
		'filter'=>$valStt,//Yii::$app->gv->gvStatusArray(),
		'filterOptions'=>Yii::$app->gv->gvFilterContainHeader('0','50px',$bColor),
		'hAlign'=>'right',
		'vAlign'=>'middle',
		'mergeHeader'=>false,
		'noWrap'=>false,
		'format' => 'raw',	
		// 'value'=>function($model){
			// return sttMsg($model->STATUS);				 
		// },
		//gvContainHeader($align,$width,$bColor)
		'headerOptions'=>Yii::$app->gv->gvContainHeader('center','50',$bColor),
		'contentOptions'=>Yii::$app->gv->gvContainBody('center','50','')			
	];
	//ACTION
	$attDinamikTmp[]=[
		'class' => 'kartik\grid\ActionColumn',
		'template' => '{review}',
		'header'=>'ACTION',
		'dropdown' => true,
		'dropdownOptions'=>[
			'class'=>'pull-left dropdown',
			'style'=>'text-align:center;background-color:#E6E6FA'				
		],
		'dropdownButton'=>[
			'label'=>'ACTION',
			'class'=>'btn btn-info btn-xs',
			'style'=>'width:100%;'		
		],
		'buttons' => [
			'review' =>function ($url, $model){
			  return  tombolReview($url, $model);
			},
		], 
		'headerOptions'=>Yii::$app->gv->gvContainHeader('center','10px',$bColor,'#ffffff'),
		'contentOptions'=>Yii::$app->gv->gvContainBody('center','0',''),
	];
	$tempImport= GridView::widget([
		'id'=>'tmp-import-absen',
		'dataProvider' => $dataProviderTmp,
		'filterModel' => $searchModelTmp,
		'filterRowOptions'=>['style'=>'background-color:'.$bColor.'; align:center'],				
		'columns' =>$attDinamikTmp,
		'toolbar' => [
			'{export}',
		],	
		'panel'=>[
			//'heading'=>$pageNm.'  '.tombolCreate().' '.tombolExportFormat($paramUrl).' '.tombolUpload().' '.tombolSync(),					
			'heading'=>tombolRefresh().' '.tombolCreateTmp().' '.tombolExportFormat($paramUrl).' '.tombolUpload().' '.tombolSync(),					
			'type'=>'info',
			'after'=>false,
			'before'=>false,
			'footer'=>false,
			
		],
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>false,
				'id'=>'tmp-import-absen',
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
<?=$tempImport?>



