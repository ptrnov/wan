<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\base\DynamicModel;
// use modulprj\absensi\models\AbsenImportFile;
// $model = new AbsenImportFile();

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
 * Button Permission.
 * Modul ID	: 11
 * Author	: ptr.nov2gmail.com
 * Update	: 01/02/2017
 * Version	: 2.1
 * ===============================
*/
	function getPermission(){
		if (Yii::$app->getUserOpt->Modul_akses('11')){
			return Yii::$app->getUserOpt->Modul_akses('11');
		}else{
			return false;
		}
	}
	/*
	 * Backgroun Icon Color.
	*/
	function bgIconColor(){
		//return '#f08f2e';//kuning.
		return '#1eaac2';//biru Laut.
		// return '#25ca4f';//Hijau.
	}
	
	
/**
* ===============================
 * Button & Link Modal Import
 * Author	: ptr.nov2gmail.com
 * Update	: 05/09/2017
 * Version	: 2.1
 * ===============================
*/

/*
	 * ACTUAL: CREATE
	*/
	function tombolCreateFinger($model){
		$title1 = Yii::t('app','Add Finger');
		$url = Url::toRoute(['/master/finger/create','id'=>$model->KAR_ID]);
		// $url = Url::toRoute(['/master/finger/create']);
		$options1 = ['value'=>$url,
					'id'=>'emp-finger-create',
					'data-pjax' => true,
					'class'=>"btn btn-info btn-xs",
					'title'=>'Tambah Data fingers',
					'style'=>['text-align'=>'left','color:red','margin-left'=>'0px','width'=>'100%', 'height'=>'25px','border'=> 'none'],								
		];
		$icon1 = '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle-thin fa-stack-2x " ></i>
				<i class="fa fa-eye fa-stack-1x" style="color:black"></i>
			</span>
		';      
		$label1 = $icon1 . '  ' . $title1;
		$content = Html::button($label1,$options1);		
		return '<li>'.$content.'</li>';

	};
			
	/**
	 * ===============================
	 * Modal store
	 * Author	: ptr.nov2gmail.com
	 * Update	: 21/01/2017
	 * Version	: 2.1
	 * ==============================
	*/
	$modalHeaderColor='#fbfbfb';//' rgba(74, 206, 231, 1)';
	
	/*
	 * ABSENT IMPORT - REVIEW.
	*/
	Modal::begin([
		'id' => 'emp-finger-modal-create',
		'header' => '
			<span class="fa-stack fa-xs">																	
				<i class="fa fa-circle fa-stack-2x " style="color:'.bgIconColor().'"></i>
				<i class="fa fa-eye fa-stack-1x" style="color:#fbfbfb"></i>
			</span><b> Add Finger </b>
		',	
		'size' => 'modal-dm',
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
	echo "<div id='emp-finger-content-create'></div>";
	Modal::end();
		
?>