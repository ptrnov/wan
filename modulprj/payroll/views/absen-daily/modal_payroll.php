<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\base\DynamicModel;
use modulprj\absensi\models\AbsenImportFile;
$model = new AbsenImportFile();
$this->registerCss("
	/**
	 * CSS - Border radius Sudut.
	 * piter novian [ptr.nov@gmail.com].
	 * 'clientOptions' => [
	 *		'backdrop' => FALSE, //Static=disable, false=enable
	 *		'keyboard' => TRUE,	// Kyboard 
	 *	]
	*/
	.modal-content { 
		border-radius: 5px;
	}
	
");

	
/**
* ===============================
 * Button & Link Modal Import
 * Author	: ptr.nov2gmail.com
 * Update	: 05/09/2017
 * Version	: 2.1
 * ===============================
*/
	/*
	 * LINK BUTTON : Link Button Refresh
	*/
	function tombolPrint($model){
		//$paramFile=Yii::$app->getRequest()->getQueryParam('id');
		$title = Yii::t('app','Print');
		$url =  Url::toRoute(['/payroll/absen-daily/print','id'=>$model['KAR_ID']]);
		$options1 = [
		//'value'=>$url,
					'id'=>'payroll-print',
					'data-pjax' => true,
					'class'=>"btn btn-default btn-xs",
					'title'=>'Print Slip gaji',
					'style'=>['text-align'=>'left','color:red','margin-left'=>'0px','width'=>'100%', 'height'=>'25px','border'=> 'none'],								
		];
		$icon1 = '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle-thin fa-stack-2x " ></i>
				<i class="fa fa-print fa-stack-1x" style="color:black"></i>
			</span>
		';      
		$label1 = $icon1 . '  ' . $title;
		$content = Html::a($label1,$url,$options1);		
		return '<li>'.$content.'</li>';
	}
	
	/*
	 * LINK BUTTON : Link Button Refresh
	*/
	function tombolPrintAll(){
		//$paramFile=Yii::$app->getRequest()->getQueryParam('id');
		$title = Yii::t('app','Print All');
		$url =  Url::toRoute(['/payroll/absen-daily/print-all']);
		$options1 = [
					'value'=>$url,
					'id'=>'payroll-printall',
					'data-pjax' => true,
					'class'=>"btn btn-default btn-xs",
					'title'=>'Print Slip gaji',
					//'style'=>['text-align'=>'left','color:red','margin-left'=>'0px','width'=>'100%', 'height'=>'25px','border'=> 'none'],								
		];
		$icon1 = '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle-thin fa-stack-2x " ></i>
				<i class="fa fa-print fa-stack-1x" style="color:black"></i>
			</span>
		';      
		$label1 = $icon1 . '  ' . $title;
		$content = Html::button($label1,$options1);
		return $content;		
		//return '<li>'.$content.'</li>';
	}
	
	/*
	 * LINK BUTTON : Button - EXPORT EXCEL.
	*/
	function tombolExportExcel(){
		// if(getPermission()){
			// if(getPermission()->BTN_PROCESS1==1){
				$title1 = Yii::t('app', ' Export Excel');
				$url = Url::toRoute(['/payroll/absen-daily/export-excel']);
				$options1 = [
							'id'=>'export-excel-',
							'data-pjax' => true,
							'class'=>"btn btn-info btn-sm"  
				];
				$icon1 = '<span class="fa fa-clone fa-lg"></span>';
				$label1 = $icon1 . ' ' . $title1;
				$content = Html::a($label1,$url,$options1);
				return $content;
			// }
		// }
	}	
	
	/*
	 * PAYROLL: PERIODE
	*/
	function tombolCreatePeriode(){
		// if(getPermission()){
			// if(getPermission()->BTN_PROCESS1==1){				
				$title= Yii::t('app','Set Periode');
				$url = Url::toRoute(['/payroll/absen-daily/create-periode']);
				$options1 = ['value'=>$url,
							'id'=>'payroll-button-periode',
							'data-pjax' => false,
							'class'=>"btn btn-success btn-xs",
							'title'=>'Setting Periode Aktif'
				];
				$icon1 = '<span class="fa-stack fa-sm text-left">
						  <b class="fa fa-circle fa-stack-2x" style="color:#ffffff"></b>
						  <b class="fa fa-calendar fa-stack-1x" style="color:#000000"></b>
						</span>
				';
				$label1 = $icon1.' '.$title ;
				$content = Html::button($label1,$options1);
				return $content;
			// }
		// }
	}
	
	$modalHeaderColor='#fbfbfb';//' rgba(74, 206, 231, 1)';
	
	/*
	 * MODAL - PRINT ALL.
	*/
	Modal::begin([
		'id' => 'payroll-printall-view',
		'header' => '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle fa-stack-2x " style="color:red"></i>
				<i class="fa fa-print fa-stack-1x" style="color:#fbfbfb"></i>
			</span><b> PRINT SELECT</b>
		',	
		'size' => 'modal-sm',
		//'options' => ['class'=>'slide'],
		'headerOptions'=>[
			'style'=> 'border-radius:5px; background-color:'.$modalHeaderColor,
			//'toggleButton' => ['label' => 'click me'],
		],
		//'clientOptions' => ['backdrop' => 'static', 'keyboard' => TRUE]
		'clientOptions' => [
			'backdrop' => FALSE, //Static=disable, false=enable
			'keyboard' => TRUE,	// Kyboard 
		]
	]);
	echo "<div id='payroll-printall-content-view'></div>";
	Modal::end();
	
	/*
	 * PERIODE.
	*/
	Modal::begin([
		//'id' => 'sync_save',
		'id' => 'payroll-modal-periode',
		'header' => '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle fa-stack-2x " style="color:red"></i>
				<i class="fa fa-calendar fa-stack-1x" style="color:#fbfbfb"></i>
			</span><b> SET PERIODE ACTIVE</b>
		',	
		'size' => 'modal-sm',
		//'options' => ['class'=>'slide'],
		'headerOptions'=>[
			'style'=> 'border-radius:5px; background-color:'.$modalHeaderColor,
			//'toggleButton' => ['label' => 'click me'],
		],
		//'clientOptions' => ['backdrop' => 'static', 'keyboard' => TRUE]
		'clientOptions' => [
			'backdrop' => FALSE, //Static=disable, false=enable
			'keyboard' => TRUE,	// Kyboard 
		]
	]);
		echo "<div id='payroll-modal-content-periode'></div>";
	Modal::end();
	
?>