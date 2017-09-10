<?php
use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\FileInput;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use modulprj\master\models\Machine;
use kartik\widgets\DatePicker;
use kartik\widgets\DateTimePicker;;

	//$aryMachineId=ArrayHelper::map(Machine::find()->all(), 'MESIN_SN','MESIN_NM');
	
	$aryMachineId=ArrayHelper::map(Machine::find()->all(), 'CAB_ID','MESIN_NM');

?>
   <?php $form = ActiveForm::begin([
			'id'=> $model->formName(),			
			'enableClientValidation'=> true,
			'enableAjaxValidation'=>true,
			'method' => 'post',
			'validationUrl'=>Url::toRoute('/absensi/absen-import/valid')
   ]); ?>
	<div style="height:100%;font-family: verdana, arial, sans-serif ;font-size: 8pt">
		<div class="row" >
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<?php
					echo $form->field($model, 'tmpCab')->dropDownList($aryMachineId,[
						'id'=>'absenimporttmp-tmpcab',
						'prompt'=>' -- Pilih Salah Satu --',
					])->label('Cabang Perusahaan');

					echo $form->field($model, 'tmpNm')->widget(DepDrop::classname(), [
						'type'=>DepDrop::TYPE_SELECT2,
						'options' => ['id'=>'absenimporttmp-tmpnm'],
						'pluginOptions' => [
							'allowClear' => true,
							'depends'=>['absenimporttmp-tmpcab'],
							'url'=>Url::to(['/absensi/absen-import/subcat']), /*Parent=0 barang Umum*/
							'initialize'=>false,
							'placeholder' =>false
							
						],
					])->label('Karyawan');
					
					echo $form->field($model, 'tmpTglIn')->widget(DateTimePicker::classname(), [
						'options' => ['placeholder' => 'Enter date ...'],
						'convertFormat' => true,
						'pluginOptions' => [
							'autoclose'=>true,
							'todayHighlight' => true,
							'format' => 'yyyy-MM-dd hh:i:s'
						],
						// 'pluginEvents' => [
										  // 'show' => "function(e) {show}",
						// ], 
					]);					
					echo $form->field($model, 'tmpTglOut')->widget(DateTimePicker::classname(), [
						'options' => ['placeholder' => 'Enter date ...'],
						'convertFormat' => true,
						'pluginOptions' => [
							'autoclose'=>true,
							'todayHighlight' => true,
							'format' => 'yyyy-MM-dd hh:i:s'
						],
						// 'pluginEvents' => [
										  // 'show' => "function(e) {show}",
						// ], 
					]);		
				?>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<?php
					echo $form->field($model, 'TERMINAL_ID')->widget(DepDrop::classname(), [					
						'type'=>DepDrop::TYPE_SELECT2,
						//'options'=>['id'=>'terminal-id','readonly'=>true,'selected'=>false],//'disabled'=>true,
						'options'=>['id'=>'absenimporttmp-terminal_id'],//'disabled'=>true,
						'pluginOptions' => [	
							'depends'=>['absenimporttmp-tmpcab'],
							'url'=>Url::to(['/absensi/absen-import/sub-terminal']), 
							'initialize'=>false,
							'placeholder' => false,
						],
					]);
					
					 echo $form->field($model, 'FINGER_ID')->widget(DepDrop::classname(), [					
						'type'=>DepDrop::TYPE_SELECT2,
						//'options'=>['id'=>'finger-id','readonly'=>true,'selected'=>false],//'disabled'=>true,
						'options'=>['id'=>'absenimporttmp-finger_id'],//'disabled'=>true,
						'pluginOptions' => [	
							'depends'=>['absenimporttmp-terminal_id','absenimporttmp-tmpnm'],
							'url'=>Url::to(['/absensi/absen-import/sub-finger']), 
							'initialize'=>false,
							'placeholder' => false,
						],
					]);  
					// echo $form->field($model, 'FINGER_ID')->textInput(['maxlength' => true]);
					//echo $form->field($model, 'HARI')->textInput(['maxlength' => true]);
					//echo $form->field($model, 'GRP_ID')->textInput();
				?>
			</div>
		</div>
	</div>
	<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

