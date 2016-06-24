<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\data\ArrayDataProvider;
$config = ['template'=>"{input}\n{error}\n{hint}"];

//echo $modelNormal->TT_ID;

	$dataType= new ArrayDataProvider([
		'key' => 'TT_TYPE_KTG',
		'allModels'=>Yii::$app->db->createCommand("SELECT * FROM timetable_ktg a WHERE  a.TT_TYPE_KTG<>1 AND a.TT_TYPE_KTG NOT IN (SELECT TT_TYP_KTG FROM timetable_ot WHERE TT_GRP_ID=".$modelNormal->TT_GRP_ID.")")->queryAll(),
		'pagination' => [
			'pageSize' => 50,
			]
	]);		
	/*SET Models*/
	$modelType=$dataType->getModels();
	/*SET GROUP*/
	$aryModelKtg = ArrayHelper::map($modelType,'TT_TYPE_KTG','TT_TYPE');

?>

<div class="timetable-normal-form">

	<?php 
		$form = ActiveForm::begin([
				'id'=>'ot-input',
				'enableClientValidation' => true,
				//'enableAjaxValidation' => true,
				'method' => 'post',
				'action' => ['/master/timetable-normal/create-overtime','id'=>$modelNormal->TT_ID],
		]);
	?>
	<div class="row">
		<div class="col-lg-6">
			<?php //=$form->field($modelOt, 'TT_GRP_ID')->textInput(['value'=>$modelNormal->TT_GRP_ID]) ?>
			<!-- Kategori !-->
			<?=$form->field($modelOt, 'hideTT_GRP_ID')->dropDownList($aryTtGrp,[
					'id'=>'timetableovertime-tt_grp_id',
					'options' =>
						[                        
							$modelNormal->TT_GRP_ID => ['Selected' => 'true','disabled' => 'true'],
							//1 => ['disabled' => true,],
							//$modelNormal->TT_GRP_ID => ['disabled' => 'true'],
							
						],
						'readonly'=>true,
						'disabled'=>true
						
				]) 
			?>			
			<!-- Hari Mulai !-->
			<?=$form->field($modelOt, 'TT_SDAYS')->dropDownList($arrayDayOfWeek,[
					'id'=>'tt-ktg',
					'prompt'=>' -- Dari hari --',
				]);
			?>	
			<!-- Range tanggal Mulai !-->
			<?=$form->field($modelOt, 'TT_SDATE')->widget(DatePicker::classname(), [
					'options' => ['placeholder' => 'Dari Tanggal  ...'],
					'pluginOptions' => [
					   'autoclose'=>true,
					   'format' => 'yyyy-mm-dd',
					],
					'pluginEvents'=>[
							   'show' => "function(e) {errror}",
					],
				])   
			?>			
			<!-- Jam Masuk !-->			
			<?=$form->field($modelOt, 'RULE_IN')->widget(TimePicker::classname(), [
					'options' => [
						'id'=>'timetableovertime-rule_in',
						'placeholder' => 'Jam Masuk ...'
					],
					'pluginOptions' => [
						'format'=>'H:i:s',
					],
					'pluginEvents'=>[
							   'show' => "function(e) {errror}",
					],
				])   
			?>		
			<!-- DURATION !-->
			<?= $form->field($modelOt, 'RULE_DURATION')->textInput([
				'id'=>'timetableovertime-rule_duration'
			])->label('Duration Time') ?>
			
			<!-- Presentase OT Half !-->
			<?= $form->field($modelOt, 'LEV1_FOT_HALF')->textInput()->label('Half OT Presentase') ?>
			
			<!-- Status !-->
			<?=$form->field($modelOt, 'TT_ACTIVE')->dropDownList($aryStt,[
					'id'=>'tt-stt',
					'prompt'=>' -- Pilih Status Active --',
				]);
			?>		
			
						
		</div>
		<div class="col-lg-6">
			<!-- Type !-->
			<?=$form->field($modelOt, 'TT_TYP_KTG')->dropDownList($aryModelKtg,[
					'prompt'=>' -- Pilih Type --',
				]);
			?>			
			<!-- Sampai Hari  !-->
			<?=$form->field($modelOt, 'TT_EDAYS')->dropDownList($arrayDayOfWeek,[
					'prompt'=>' -- Sampai hari --',
				]);
			?>
			<!-- Range Tanggal Akhir !-->
			<?=$form->field($modelOt, 'TT_EDATE')->widget(DatePicker::classname(), [
					'options' => ['placeholder' => 'Sampai Tanggal ...'],
					'pluginOptions' => [
					   'autoclose'=>true,
					   'format' => 'yyyy-mm-dd',
					],
					'pluginEvents'=>[
							   'show' => "function(e) {errror}",
					],
				])   
			?>
			<!-- jam Keluar !-->
			<?=$form->field($modelOt, 'RULE_OUT')->widget(TimePicker::classname(), [
					'options' => ['placeholder' => 'Jam Keluar  ...'],
					'pluginOptions' => [
					   'autoclose'=>true,
					   'format'=>'H:i:s',
					],
					'pluginEvents'=>[
							   'show' => "function(e) {errror}",
					],
				])   
			?>	
			
			<!-- Overtime Maximal !-->
			<?= $form->field($modelOt, 'LEV1_FOT_MAX_TIME')->textInput()->label('Limit Overtime') ?>
			
			<!-- Presentase OT Hour !-->
			<?= $form->field($modelOt, 'LEV1_FOT_HOUR')->textInput()->label('Hour OT Presentase') ?>
			
			<!-- Presentase Total OT !-->
			<?= $form->field($modelOt, 'LEV1_FOT_MAX')->textInput()->label('Presentase Total OT') ?>
			
		</div><div class="col-lg-12">	
			<!-- Catatan !-->
			<?=$form->field($modelOt, 'TT_NOTE')->textArea([
				'options'=>['rows'=>5]
				])->label('Note')
			?>	
			<?=$form->field($modelOt, 'TT_GRP_ID')->hiddenInput(['value'=>$modelNormal->TT_GRP_ID])->label(false) ?>
						
		</div>
	</div>
		
		<div style="text-align: right;">
			<?php echo Html::submitButton('Create',['class' => 'btn btn-primary']); ?>
		</div>
    <?php ActiveForm::end(); ?>

</div>
<?php
/*
	 * CREATE TIMETABLE
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	$this->registerJs("
		function myFunction() {
			var x = document.getElementById('timetableovertime-tt_grp_id').value;
			document.getElementById('timetableovertime-rule_duration').innerHTML = x;
		}
	",$this::POS_READY);
?>