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
use modulprj\absensi\models\AbsenImportPeriode;
use modulprj\master\models\Dept;
use modulprj\master\models\Machine;

	$modelPrd=AbsenImportPeriode::find()->where(['TIPE'=>'0','AKTIF'=>'1'])->one();
	$perodeVal="<b>PERIODE AKTIF : </b>".$modelPrd->TGL_START." s/d ".$modelPrd->TGL_END;
	$perode='<span class="fa-stack fa-xs text-right">				  
				<i class="fa fa-mail-forward fa-1x"></i>
			 </span> '.$perodeVal.'			
	';
	$aryCbgMachine=ArrayHelper::map(Machine::find()->all(), 'MESIN_NM','MESIN_NM');
	$aryDept=ArrayHelper::map(Dept::find()->all(), 'DEP_NM','DEP_NM');
	
	
	$aryFieldTmp= [		  
		['ID' =>0, 'ATTR' =>['FIELD'=>'KAR_NM','SIZE' => '180px','label'=>'Karyawan','align'=>'left','mergeHeader'=>false,'FILTER'=>true]],		  
		['ID' =>1, 'ATTR' =>['FIELD'=>'DEP_NM','SIZE' => '50px','label'=>'Department','align'=>'left','mergeHeader'=>false,'FILTER'=>$aryDept]],		
		['ID' =>2, 'ATTR' =>['FIELD'=>'IN_TGL','SIZE' => '6px','label'=>'Tgl.Masuk','align'=>'center','mergeHeader'=>true,'FILTER'=>true]],
		['ID' =>3, 'ATTR' =>['FIELD'=>'IN_WAKTU','SIZE' => '6px','label'=>'Jam.Masuk','align'=>'center','mergeHeader'=>true,'FILTER'=>true]],
		['ID' =>4, 'ATTR' =>['FIELD'=>'OUT_TGL','SIZE' => '6px','label'=>'Tgl.Keluar','align'=>'center','mergeHeader'=>true,'FILTER'=>true]],
		['ID' =>5, 'ATTR' =>['FIELD'=>'OUT_WAKTU','SIZE' => '6px','label'=>'Jam.Keluar','align'=>'center','mergeHeader'=>true,'FILTER'=>true]],
		['ID' =>6, 'ATTR' =>['FIELD'=>'HARI','SIZE' => '8px','label'=>'Hari','align'=>'left','mergeHeader'=>false,'FILTER'=>$valHari]],
		['ID' =>7, 'ATTR' =>['FIELD'=>'LEBIH_WAKTU','SIZE' => '6px','label'=>'Kelebihan Waktu','align'=>'center','mergeHeader'=>true,'FILTER'=>true]],		
		['ID' =>8, 'ATTR' =>['FIELD'=>'VAL_PAGI','SIZE' => '5px','label'=>'Pagi','align'=>'right','mergeHeader'=>true,'FILTER'=>true]],
		['ID' =>9, 'ATTR' =>['FIELD'=>'VAL_LEMBUR','SIZE' => '5px','label'=>'Lembur','align'=>'right','mergeHeader'=>true,'FILTER'=>true]],
		
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
	$arySttImport= [
	  ['STATUS' => 0, 'STT_NM' => 'Ready'],		  
	  ['STATUS' => 100, 'STT_NM' => 'Empty'],
	  ['STATUS' => 101, 'STT_NM' => 'DateTime'],
	  ['STATUS' => 102, 'STT_NM' => 'OverWrite']
	];	
	
	$valSttImport = ArrayHelper::map($arySttImport, 'STATUS', 'STT_NM');
	
	
	
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
	
	$attDinamikTmp[] =[
		'class'=>'kartik\grid\CheckboxColumn',
		'header'=>'Limit',
		'headerOptions'=>[
			'style'=>[
				'text-align'=>'center',
				'width'=>'20px',
				'font-family'=>'tahoma',
				'font-size'=>'8pt',
				'background-color'=>$bColor,
				'color'=>'white'
			]
		],
		'rowSelectedClass' =>GridView::TYPE_DANGER,
		'checkboxOptions' => function ($model, $key, $index, $column){		
				if($model->STT_LEMBUR == 7)
				{
					return ['checked' => $model->ID];
				}else{
					return ['value' => $model->ID,'hidden'=>true];
				}	
		}
	];
	
	/*OTHER ATTRIBUTE*/
	foreach($valFieldsTmp as $key =>$value[]){	
		if ($value[$key]['FIELD']=='DEP_NM' OR $value[$key]['FIELD']=='HARI'){				
			$gvfilterType=GridView::FILTER_SELECT2;
			//$gvfilterType=false;
			//$gvfilter =$aryDeptId;
			$filterWidgetOpt=[				
				'pluginOptions'=>['allowClear'=>true],		
			]; 
			if($value[$key]['FIELD']=='HARI'){
				$filterInputOpt=['placeholder'=>'-Pilih-'];
			}else{
				$filterInputOpt=['placeholder'=>'-- Pilih --'];
			}
			
		}else{
			$gvfilterType=false;
			//$gvfilter=true;
			$filterWidgetOpt=[];		
			$filterInputOpt=['class'=>"form-control"];					
		};
		
		$attDinamikTmp[]=[		
			'attribute'=>$value[$key]['FIELD'],
			'label'=>$value[$key]['label'],
			'filter'=>$value[$key]['FILTER'],
			'filterType'=>$gvfilterType,
			'filterWidgetOptions'=>$filterWidgetOpt,	
			'filterInputOptions'=>$filterInputOpt,								
			'hAlign'=>'right',
			'vAlign'=>'middle',
			//'mergeHeader'=>true,
			'noWrap'=>true,	
			'value'=>function($data)use($key,$value){
				$x=$value[$key]['FIELD'];
				if($x=='IN_WAKTU' OR $x=='OUT_WAKTU'){					
					if ($data->STT_LEMBUR=='0'){
						return $data->$x;
					}elseif($data->STT_LEMBUR=='3'){
						return 'AL';
					}elseif($data->STT_LEMBUR=='4'){
						return 'SK';
					}elseif($data->STT_LEMBUR=='5'){
						return 'LK';
					}elseif($data->STT_LEMBUR=='6'){
						return 'IJ';
					}elseif($data->STT_LEMBUR=='6'){
						return 'IJ';
					}elseif($data->STT_LEMBUR=='2'){
						if ($data->$x<>'00:00:00'){
							return $data->$x;
						}else{
							return 'OFF';
						}
					}else{
						return $data->$x;
					};					
				}else{
					return $data->$x;
				}
				
			},
			'noWrap'=>false,	
			'mergeHeader'=>$value[$key]['mergeHeader'],
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
		'filter'=>$valSttImport,//Yii::$app->gv->gvStatusArray(),
		'filterOptions'=>Yii::$app->gv->gvFilterContainHeader('0','50px',$bColor),
		'hAlign'=>'right',
		'vAlign'=>'middle',
		'mergeHeader'=>false,
		'noWrap'=>false,
		'format' => 'raw',	
		'value'=>function($model){
			if($model->STATUS==0){
				return 'Ready';
			}elseif($model->STATUS==100){
				return 'Empty';
			}elseif($model->STATUS==101){
				return 'DateTime';
			}elseif($model->STATUS==102){
				return 'Overwrite';
			}
			//return sttMsgImport($model->STATUS);				 
		},
		//gvContainHeader($align,$width,$bColor)
		'headerOptions'=>Yii::$app->gv->gvContainHeader('center','50',$bColor),
		'contentOptions'=>Yii::$app->gv->gvContainBody('center','50','')			
	];
	//ACTION
	$attDinamikTmp[]=[
		'class' => 'kartik\grid\ActionColumn',
		'template' => '{review}{delete}',
		'header'=>'ACTION',
		'dropdown' => true,
		'dropdownOptions'=>[
			'class'=>'pull-right dropdown',
			'style'=>'text-align:center;background-color:#E6E6FA'				
		],
		'dropdownButton'=>[
			'label'=>'ACTION',
			'class'=>'btn btn-info btn-xs',
			'style'=>'width:100%;'		
		],
		'buttons' => [
			'review' =>function ($url, $model){
			  return  tombolReviewTmp($url, $model);
			},
			'delete' =>function ($url, $model){
			  return  tombolDeleteTmp($url, $model);
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
		'rowOptions' => function($model, $key, $index, $grid){
				//==NULL===
				if ($model->IN_TGL=='' or $model->IN_WAKTU=='' or $model->OUT_TGL=='' or $model->OUT_WAKTU=='' or 
					$model->TERMINAL_ID=='' or $model->FINGER_ID=='' or $model->KAR_ID=='' or $model->OUT_TGL=='')
				{					
					Yii::$app->db->CreateCommand('UPDATE absen_import_tmp SET STATUS=100 WHERE ID='.$model->ID)->execute();
					return ['class' => 'danger'];
				}
				/* elseif(date('Y-m-d h:i:s', strtotime((string)$model->IN_TGL.' '.(string)$model->IN_WAKTU)) > date('Y-m-d h:i:s', strtotime((string)$model->OUT_TGL.' '.(string)$model->OUT_WAKTU))){
				//===Datetime1 > Dateime2 ====
					Yii::$app->db->CreateCommand('UPDATE absen_import_tmp SET STATUS=101 WHERE ID='.$model->ID)->execute();
					return ['class' => 'danger'];
				} */
				else{
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
						if ($model->STT_LEMBUR=='8'){
							return ['class' => 'warning'];
						}else{
							return ['class' => 'default'];
						}
						
					}
					
				}
		},				
		'columns' =>$attDinamikTmp,	
		'toolbar' => [
			'{export}',
		],	
		'panel'=>[
			//'heading'=>$pageNm.'  '.tombolCreate().' '.tombolExportFormat($paramUrl).' '.tombolUpload().' '.tombolSync(),					
			'heading'=>tombolRefresh().' '.tombolClear().' '.tombolCreateTmp().' '.tombolCreatePeriode().' '.tombolExportFormat($paramUrl).' -> '.tombolUpload().' -> '.tombolSync().' '.$perode,					
			'type'=>'info',
			'after'=>false,
			'before'=>false,
			'footer'=>false,
			
		],
		'pjax'=>true,
		'pjaxSettings'=>[
			'options'=>[
				'enablePushState'=>true,
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


 $this->registerJs("
	var target = $(this).attr('href');
	$('#tmp-import-absen').on('change','input[type=checkbox]',function(){
		var idKode =$(this).val();
		var keysSelect = $('#tmp-import-absen').yiiGridView('getSelectedRows');
		if ($(this).is(':checked')){
			$.ajax({
				 url: '/absensi/absen-import/check-limit-time',
				 //cache: true,
				 type: 'POST',
				 data:{keysSelect:keysSelect,idKode:idKode},
				 dataType: 'json',
				 success: function(response) {
					if (response == true ){
						  $.pjax.reload({container:'#tmp-import-absen'});
						  console.log(idKode);
					}
					 else {

					 }
				 }
			})
		}
		else{
			$.ajax({
			 url: '/absensi/absen-import/uncheck-limit-time',
			 //cache: true,
			 type: 'POST',
			 data:{keysSelect:keysSelect,idKode:idKode},
			 dataType: 'json',
			 success: function(response) {
				 if (response == true ){
					 $.pjax.reload({container:'#tmp-import-absen'});
					  $(this).parent().parent().removeClass('alert-success');
					  console.log(idKode);
				 }
					else {
						  $.pjax.reload({container:'#tmp-import-absen'});
					}
				}
			})
		}
	});
",$this::POS_READY);
?>
<?=$tempImport?>



