<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;

$config = ['template'=>"{input}\n{error}\n{hint}"];
?>

<div class="timetable-normal-form">
	<?php $form = ActiveForm::begin([
			//'type' => ActiveForm::TYPE_HORIZONTAL,
			'method' => 'post',
			'id'=>'form-timetable-normal-id',
           //'enableClientValidation' => true,
			'options' => ['enctype' => 'multipart/form-data']
		]);
	?>
	<div class="row">
		<div class="col-lg-6">
			<?php //= $form->field($model, 'TT_GRP_ID')->textInput() ?>
			<!-- Kategori !-->
			<?=$form->field($model, 'TT_GRP_ID')->dropDownList($aryTtGrp,[
					'id'=>'tt-group',
					'prompt'=>' -- Pilih Group Attendance --',
				]);
			?>			
			<!-- Hari Mulai !-->
			<?=$form->field($model, 'TT_SDAYS')->dropDownList($arrayDayOfWeek,[
					'id'=>'tt-ktg',
					'prompt'=>' -- Dari hari --',
				]);
			?>	
			<!-- Range tanggal Mulai !-->
			<?=$form->field($model, 'TT_SDATE')->widget(DatePicker::classname(), [
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
			<?=$form->field($model, 'RULE_IN')->widget(TimePicker::classname(), [
					'options' => ['placeholder' => 'Jam Masuk ...'],
					'pluginOptions' => [
					   'autoclose'=>true,
					   //'format' => 'dd-mm-yyyy',
					],
					'pluginEvents'=>[
							   'show' => "function(e) {errror}",
					],
				])   
			?>	
			<!-- Toleransi Jam telat !-->
			<?=$form->field($model, 'RULE_TOL_IN')->widget(TimePicker::classname(), [
					'options' => ['placeholder' => 'Late ...'],
					'pluginOptions' => [
					   'autoclose'=>true,
					   //'format' => 'dd-mm-yyyy',
					],
					'pluginEvents'=>[
							   'show' => "function(e) {errror}",
					],
				])   
			?>	
			<!-- Jam Keluar Istirahat !-->
			<?=$form->field($model, 'RULE_BRK_OUT')->widget(TimePicker::classname(), [
					'options' => ['placeholder' => 'BreakOut ...'],
					'pluginOptions' => [
					   'autoclose'=>true,
					   //'format' => 'dd-mm-yyyy',
					],
					'pluginEvents'=>[
							   'show' => "function(e) {errror}",
					],
				])   
			?>				
			<!-- Status !-->
			<?=$form->field($model, 'TT_ACTIVE')->dropDownList($aryStt,[
					'id'=>'tt-stt',
					'prompt'=>' -- Pilih Status Active --',
				]);
			?>				
		</div>
		<div class="col-lg-6">
			<!-- Type !-->
			<?=$form->field($model, 'TT_TYP_KTG')->dropDownList($aryTtKtg,[
					'id'=>'tt-ktg',
					'prompt'=>' -- Pilih Name --',
				]);
			?>			
			<!-- Sampai Hari  !-->
			<?=$form->field($model, 'TT_EDAYS')->dropDownList($arrayDayOfWeek,[
					'id'=>'tt-ktg',
					'prompt'=>' -- Sampai hari --',
				]);
			?>
			<!-- Range Tanggal Akhir !-->
			<?=$form->field($model, 'TT_EDATE')->widget(DatePicker::classname(), [
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
			<?=$form->field($model, 'RULE_OUT')->widget(TimePicker::classname(), [
					'options' => ['placeholder' => 'Jam Keluar  ...'],
					'pluginOptions' => [
					   'autoclose'=>true,
					   //'format' => 'dd-mm-yyyy',
					],
					'pluginEvents'=>[
							   'show' => "function(e) {errror}",
					],
				])   
			?>	
			<!-- Toleransi Jam Pulang Awal !-->
			<?=$form->field($model, 'RULE_TOL_OUT')->widget(TimePicker::classname(), [
					'options' => ['placeholder' => 'Early ...'],
					'pluginOptions' => [
					   'autoclose'=>true,
					   //'format' => 'dd-mm-yyyy',
					],
					'pluginEvents'=>[
							   'show' => "function(e) {errror}",
					],
				])   
			?>	
			<!--  Jam Masuk Istirahat !-->
			<?=$form->field($model, 'RULE_BRK_IN')->widget(TimePicker::classname(), [
					'options' => ['placeholder' => 'BreakIn ...'],
					'pluginOptions' => [
					   'autoclose'=>true,
					   //'format' => 'dd-mm-yyyy',
					],
					'pluginEvents'=>[
							   'show' => "function(e) {errror}",
					],
				])   
			?>	
		</div><div class="col-lg-12">	
			<!-- Catatan !-->
			<?=$form->field($model, 'TT_NOTE', $config)->textArea([
				'options'=>['rows'=>5]
				]) 
			?>			
		</div>
	</div>
		<div class="form-group" style="text-align:right">			
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

    <?php ActiveForm::end(); ?>

</div>
