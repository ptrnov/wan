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
	$imgStr=Yii::$app->arrayBantuan->gambar1();
	foreach ($model as $row){
		//$xx[]=;
		$dataProviderDetailOne=$searchModelDetail->searchHeader(['AbsenPayrollSearch'=>['KAR_ID'=>$row['KAR_ID']]]);
		$modelOne=$dataProviderDetailOne->getModels();
		$absenDetailAll= Yii::$app->controller->renderPartial('_printPdfAllGridView',[
			'dataProviderDetail'=>$dataProviderDetailOne,
			'idgrid'=>$row['KAR_ID']
		]);
		// print_r($modelOne);
		// die();
	//};
	?>
	
	
<div class="container-fluid" style="padding-top:-15px;background-color:white;font-family: verdana, arial, sans-serif ;font-size: 7pt">
	<div class="col-xs-12 col-sm-12 col-lg-12" style="text-align:center;font-family: tahoma ;font-size: 8pt;">	
		<dt><u><b>TAKE HOME PAY</b></u></dt>
	</div>
	<div class="col-xs-12 col-sm-12 col-lg-12" style="font-family: tahoma ;font-size: 6pt;">	
		<div class="row">
			<dl style="width:300px; padding-top:20px;float:left;">			
				<dt style="width:100px;float:left;">NAMA</dt>
				<dd>: <?=$modelOne[0]['KAR_NM'] ?></dd>
				<dt style="width:100px; float:left;">Divisi</dt>
				<dd>: <?=$modelOne[0]['DEP_NM'] ?></dd>
				<dt style="width:100px; float:left;">PERIODE</dt>
				<dd>: <?=$modelOne[0]['TGL_STARTING'] ?>  s/d  <?=$modelOne[0]['TGL_CLOSING'] ?></dd>
			</dl>
			<dl style="float:right;">
				<table style="width:300px">			
					<tr>
						<th style="text-align:left;padding-left:300px;width:50px;text-align:right;font-weight: normal;">
							<?=Html::img($imgStr,['width'=>'140','height'=>'60']);?>
						</th>
					</tr>			
				</table>
			</dl>
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-lg-12" style="height:50px;padding-top:-15px;font-family: tahoma ;font-size: 6pt;">
		<div class="row">
			<?=$absenDetailAll?>		
		</div>
	</div>
	<div class="col-xs-12 col-sm-12 col-lg-12" style="padding-top:-15px;font-family: tahoma ;font-size: 7pt;float:left">
		<div class="row">
			<div style="width:330px;float:left;font-size: 7pt">
				<table style="width:180px;float:left;font-size: 7pt">
				  <tr>
					<th style="width:100px">Pagi</th>
					<th style="width:10px">:</th>
					<th style="width:50px;text-align:right;font-weight: normal;"><?=number_format($modelOne[0]['SUB_PAY_PAGI'],2) ?></th>
					<th style="width:80px;padding-left:20px">Pinjaman</th>
					<th style="width:10px">:</th>
					<th style="width:50px;text-align:right;font-weight: normal;"><?=number_format($modelOne[0]['TTL_PINJAMAN'],2) ?></th>
				  </tr>
				   <tr>
					<th style="width:100px">Lembur</th>
					<th style="width:10px">:</th>
					<th style="width:50px;text-align:right;font-weight: normal;"><?=number_format($modelOne[0]['SUB_PAY_OT'],2) ?></th>
					<th style="width:80px;padding-left:20px">PPh</th>
					<th style="width:10px">:</th>
					<th style="width:50px;text-align:right;font-weight: normal;"><?=number_format($modelOne[0]['TTL_PPH'],2) ?></th>
				  </tr>
				  <tr>
					<th style="width:100px">Uang Makan Malam</th>
					<th style="width:10px">:</th>
					<th style="width:50px;text-align:right;font-weight: normal;"><?=number_format($modelOne[0]['SUB_PAY_OT'],2) ?></th>
					<th style="width:80px;padding-left:20px">Jamsostek</th>
					<th style="width:10px">:</th>
					<th style="width:50px;text-align:right;font-weight: normal;"><?=number_format($modelOne[0]['TTL_JAMSOSTEK'],2) ?></th>
				  </tr>
				  <tr>
					<th style="width:100px">Total Upah / Minggu</th>
					<th style="width:10px">:</th>
					<th style="width:50px;text-align:right"><b><?=number_format($modelOne[0]['TTL_PAY'],2) ?></b></th>
					<th style="width:80px;padding-left:20px">Potongan</th>
					<th style="width:10px">:</th>
					<th style="width:50px;text-align:right"><?=number_format($modelOne[0]['TTL_POTONGAN'],2) ?></th>
				  </tr>
				</table>
			</div>
			<div style="width:130px;font-size: 6pt;float:left">
				<table style="text-align:center;font-size:7pt;float:left">
				  <tr>
					<th style="border: 1px solid #dddddd;font-family: tahoma;font-size: 7pt;text-align:center;">
							<dt style="text-align:center;width:100%;"><b>Upah Diterima</b></dt>				
							<dt style="text-align:center;width:100%; float:left;color:red"><h6><b><?=number_format($modelOne[0]['TTL_PAY'],2) ?></b></h6></dt>
					</th>
				  </tr>
				</table>
			</div>					
			<div style="padding-left:0px;width:50px;float:left">
					Mengetahui			
			</div>
			<div style="padding-left:70px;float:left">
					Menerima			
			</div>
		</div>
	</div>
</div>
<?php
};
	
		
	
	

?>
