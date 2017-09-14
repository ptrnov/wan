<?php
use kartik\helpers\Html;
use modulprj\payroll\models\AbsenPayrollSearch;	
	$searchModelDetail = new AbsenPayrollSearch(['KAR_ID'=>'3.1215.0003']);
	$dataProviderDetail=$searchModelDetail->searchdetails(Yii::$app->request->queryParams);
	$dataProviderHeader=$searchModelDetail->search(Yii::$app->request->queryParams);
?>
<?php 
$a=array(1,2,3,4,1,1,1,1,1,1,1);
	foreach ($a as $row){
	
	$detaiView1=$this->render('_expandDetailView1',[
		'searchModelDetail'=>$searchModelDetail,
		'model'=>$dataProviderDetail->getModels()
	]);
	
	$detaiView2=$this->render('_expandDetailView2',[
		'searchModelDetail'=>$searchModelDetail,
		'model'=>$dataProviderDetail->getModels()
	]);
	
	$dvAbsen=$this->render('_expandGridView',[
		'searchModelDetail'=>$searchModelDetail,
		'dataProviderDetail'=>$dataProviderDetail,
		'modelHeader'=>$dataProviderHeader->getModels(),//$model
	]);
	
	
	//} 
?>

	<div class="container-fluid" style="padding-top:10px;background-color:white;font-family: verdana, arial, sans-serif ;font-size: 7pt">
	<div class="col-xs-12 col-sm-12 col-lg-12" style="text-align:center;font-family: tahoma ;font-size: 7pt;">	
		<b>TAKE HOME PAY</b>
	</div><div class="col-xs-12 col-sm-12 col-lg-12" style="font-family: tahoma ;font-size: 7pt;">	
		<div class="row">
			<?=$detaiView1?>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-lg-12" style="padding-top:-20px;font-family: tahoma ;font-size: 7pt;">
		<?=$dvAbsen?>
	</div>
		<div class="col-xs-12 col-sm-12 col-lg-12" style="padding-top:-15px;font-family: tahoma ;font-size: 7pt;">
		<?=$detaiView2?>
	</div>
</div>
		
<?php	} 
?>