<?php
use kartik\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use kartik\widgets\Spinner;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use yii\helpers\Json;
use yii\web\Response;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use yii\web\View;

//print_r($dataModelImport);
	//CSS
	$this->registerCss("
		.kv-grid-table :link {
			color: #fdfdfd;
		}
		/* mouse over link */
		a:hover {
			color: #5a96e7;
		}
		/* selected link */
		a:active {
			color: blue;
		}
		.modal-content { 
			border-radius: 50;
		}
		.kv-panel {
			//min-height: 340px;
			height: 300px;
		}
		.kv-grid-container{
			min-height:500px
		}
		.tmp-button-delete a:hover {
			color:red;
		}
	");
	
	//Modal Ajax
	$this->registerJs($this->render('modal_import.js'),View::POS_READY);
	echo $this->render('modal_import'); //echo difinition
	 //Difinition Status.
	$aryStt= [
	  ['STATUS' => 0, 'STT_NM' => 'Proccess'],		  
	  ['STATUS' => 1, 'STT_NM' => 'Lock']
	];	
	//Result Status value.
	function sttMsg($stt){
		if($stt==0){ //TRIAL
			 return Html::a('<span class="fa-stack fa-xl">
					  <i class="fa fa-circle-thin fa-stack-2x"  style="color:#25ca4f"></i>
					  <i class="fa fa-check fa-stack-1x" style="color:#05944d"></i>
					</span>','',['title'=>'Active']);
		}elseif($stt==1){
			return Html::a('<span class="fa-stack fa-xl">
					  <i class="fa fa-circle-thin fa-stack-2x"  style="color:#25ca4f"></i>
					  <i class="fa fa-close fa-stack-1x" style="color:#ee0b0b"></i>
					</span>','',['title'=>'Delete']);
		}
	};	
	$valStt = ArrayHelper::map($aryStt, 'STATUS', 'STT_NM');
		
	
	/**
	 * Import Data
	*/
	$_indexImport=$this->render('_indexImport',[
		'searchModelTmp' => $searchModelTmp,
		'dataProviderTmp' => $dataProviderTmp			
	]);
	
	$_indexAbsensi=$this->render('_indexLogAbsensi',[
		'searchModel' => $searchModel,
		'dataProvider' => $dataProvider,		
	]);
	
	if($tab==0){
		$tab0=true;
		$tab1=false;
	}elseif($tab==1){
		$tab0=false;
		$tab1=true;
	}
	$items=[
		[
			'label'=>'<i class="fa fa-sign-in fa-2x"></i> Daily Absensi Import','content'=>$_indexImport,
			//'active'=>$tab0,
		],
		[
			'label'=>'<i class="fa fa-clock-o fa-2x"></i> List Absensi Maintain','content'=>$_indexAbsensi,
			//'active'=>$tab1,
		]	
	];

	$tabImportAbsensi= TabsX::widget([
		'id'=>'ai',
		'items'=>$items,
		'position'=>TabsX::POS_ABOVE,
		'bordered'=>true,
		'encodeLabels'=>false,
		// 'pluginOptions'=>[
			// 'enableCache'=>true,
		// ],
		'enableStickyTabs' => true,
		// 'pluginEvents'=> [
			// "tabsX.click" => "function() { 
				// $('div.tabs-x .nav-tabs [data-toggle="tab"]').on('tabsX:click', function (event) {
					// console.log('tabsX:click event');
				// });
			// }"
		// ],
	]);	
		
?>
<div class="container-fluid" style="font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div class="col-xs-12 col-sm-12 col-lg-12" style="font-family: tahoma ;font-size: 9pt;">
		<div class="row">		
		<?=$tabImportAbsensi?>
		</div>
	</div>
</div>

