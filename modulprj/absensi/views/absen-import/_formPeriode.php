<?php
use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\FileInput;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use modulprj\master\modelPeriodes\Machine;
use kartik\widgets\DatePicker;
use kartik\widgets\DateTimePicker;;

	//$aryMachineId=ArrayHelper::map(Machine::find()->all(), 'MESIN_SN','MESIN_NM');
	
	//$aryMachineId=ArrayHelper::map(Machine::find()->all(), 'CAB_ID','MESIN_NM');

?>
   <?php $form = ActiveForm::begin([
			'id'=> $modelPeriode->formName(),			
			'enableClientValidation'=> true,
			//'enableAjaxValidation'=>true,
			//'method' => 'post',
			//'validationUrl'=>Url::toRoute('/absensi/absen-import/valid')
   ]); ?>
	<div style="height:100%;font-family: verdana, arial, sans-serif ;font-size: 6pt;">
		<div class="row" >
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<?php
						echo $form->field($modelPeriode, 'TGL_START')->widget(DatePicker::classname(), [
							'options' => ['placeholder' => 'Enter date ...'],
							'convertFormat' => true,
							'pluginOptions' => [
								'autoclose'=>true,
								'todayHighlight' => true,
								'format' => 'yyyy-MM-dd'
							],
						])->label('PERIODE MULAI');	
					?>
					<?php
						echo $form->field($modelPeriode, 'TGL_END')->widget(DatePicker::classname(), [
							'options' => ['placeholder' => 'Enter date ...'],
							'convertFormat' => true,
							'pluginOptions' => [
								'autoclose'=>true,
								'todayHighlight' => true,
								'format' => 'yyyy-MM-dd'
							],
						])->label('PERIODE AKHIR');			
					?>
				</div>
					
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
					<?=Html::submitButton('SAVE SETTING',['class' => 'btn btn-success']); ?>
			</div>
		</div>
	</div>
<?php ActiveForm::end(); ?>

