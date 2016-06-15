<?php
use kartik\helpers\Html;
use kartik\detail\DetailView;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveField;
use kartik\widgets\ActiveForm;

	$base64 ='data:image/jpg;charset=utf-8;base64,'.$model['IMG64'];
?>
	<div class="col-xs-12 col-sm-3 col-dm-2 col-lg-2"  style="valign:bottom; margin-left:0 ; text-align: center"  >
     	<?php echo Html::img($base64,['class'=>'img-thumbnail','alt'=>'Cinque Terre','width'=>'100','height'=>'100']);?>
	</div>
	
    <div class="col-xs-12 col-sm-5 col-dm-3 col-lg-3"  style="margin-left:0 ;padding-left: 0; padding-top:10px; margin-bottom: 10px;font-family: verdana, arial, sans-serif ;font-size: 8pt">	
		<dl>
			<dt style="width:100px; float:left;">NIK</dt>
			<dd style="color:rgba(87, 163, 247, 1)">:<b> <?php echo $model['KAR_ID']; ?></b></dd>
			
			<dt style="width:100px; float:left;">Name</dt>
			<dd>: <?php echo $model['KAR_NM']; ?></dd>
			
			<dt style="width:100px; float:left;">Job Title</dt>
			<dd>: <?=$model['GF_NM']?></dd>
			
			<dt style="width:100px; float:left;"><b>Job Level</b></dt>
			<dd>: <?=$model['GRADING_NM']; ?></dd>     	  
			
			<dt style="width:100px; float:left;"><b>Organization</b></dt>
			<dd>: <?=$model['DEP_NM']; ?></dd>     	  
			
			<dt style="width:100px; float:left;">Location</dt>
			<dd>: <?php //echo 'Demension c12'; ?></dd>
		</dl>
    </div>
    <div class=" col-xs-12 col-sm-4 col-dm-3 col-lg-3"  style="padding-left:0;padding-top:10px;font-family: verdana, arial, sans-serif ;font-size: 8pt"  >
		<dl>
			<dt style="width:100px; float:left;">Company</dt>
			<dd>: <?php //echo $dataProvider[0]['corpOne']->CORP_NM; ?></dd>
			
			
			
			<dt style="width:100px; float:left;">Join Date</dt>
			<dd>: <?php //echo  $model->EMP_JOIN_DATE; ?></dd>
			
			<dt style="width:100px; float:left;">Status</dt>
			<dd>: <?php //echo $dataProvider[0]['sttOne']->STS_NM; ?></dd>
			
			<dt style="width:100px; float:left;">Email</dt>
			<dd>: <?php //echo  $model->EMP_EMAIL; ?></dd>
			
			<!--<dt style="width:100px; float:left;">Join Date</dt>
			<dd>: <?php //echo  $model->EMP_JOIN_DATE; ?></dd>!-->
		</dl>
    </div>
	