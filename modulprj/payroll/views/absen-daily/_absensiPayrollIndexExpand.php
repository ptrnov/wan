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

	//Modal Ajax
	
	
	/**
	 * Import Data
	*/
	$detaiPaidView1=$this->render('_absensiPayrollIndexExpandDetailView1',[
		'model'=>$dataProviderDetailPaid->getModels()
	]);
	$detaiPaidView2=$this->render('_absensiPayrollIndexExpandDetailView2',[
		'model'=>$dataProviderDetailPaid->getModels(),
		'modelPaid'=>$modelPaid
	]);
	
	$dvAbsenPaid=$this->render('_absensiPayrollIndexExpandGridView',[
		'searchModelDetailPaid'=>$searchModelDetailPaid,
		'dataProviderDetailPaid'=>$dataProviderDetailPaid,
		'modelPaid'=>$modelPaid
	]);
	
		
?>
<div class="container-fluid" style="padding-top:10px;background-color:white;font-family: verdana, arial, sans-serif ;font-size: 7pt">
	<div class="col-xs-12 col-sm-12 col-lg-12" style="text-align:center;font-family: tahoma ;font-size: 6pt;">	
		<dt><h5><u><b>TAKE HOME PAY</b></u></h5></dt>
	</div><div class="col-xs-12 col-sm-12 col-lg-12" style="font-family: tahoma ;font-size: 7pt;">	
		<div class="row">
			<?=$detaiPaidView1?>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-lg-12" style="padding-top:-15px;font-family: tahoma ;font-size: 6pt;">
		<?=$dvAbsenPaid?>
		<?=$detaiPaidView2?>
	</div>
</div>

