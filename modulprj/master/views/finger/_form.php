<?php
use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\widgets\Select2;
use kartik\widgets\DepDrop;
use modulprj\master\models\Machine;
use modulprj\master\models\Karyawan;
$modelKar = Karyawan::find()->where(['KAR_ID'=>$id])->one();
$aryMachineId=ArrayHelper::map(Machine::find()->all(), 'TerminalID','MESIN_NM');

?>
   <?php $form = ActiveForm::begin([
			//'id'=> $model->formName(),			
			//'enableClientValidation'=> true,
			//'enableAjaxValidation'=>true,
			//'method' => 'post',
			//'validationUrl'=>Url::toRoute('/absensi/absen-import/valid')
   ]); ?>
	<div style="height:100%;font-family: verdana, arial, sans-serif ;font-size: 8pt">
		<div class="row" >
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<?php
					echo $form->field($model, 'KAR_ID')->textInput(['value'=>$id,'readonly'=>true,'maxlength' => true])->label('Karyawan.Id');
					echo $form->field($model, 'karNm')->textInput(['value'=>$modelKar->KAR_NM,'readonly'=>true,'maxlength' => true])->label('Nama Karyawan');
					
				?>
			</div>	
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<?php
					echo $form->field($model, 'tmpCab')->dropDownList($aryMachineId,[
						'id'=>'kar_finger-tmpcab',
						'prompt'=>' -- Pilih Salah Satu --',
					])->label('Cabang Perusahaan');
					echo $form->field($model, 'TerminalID')->widget(DepDrop::classname(), [
						'type'=>DepDrop::TYPE_SELECT2,
						'options' => ['id'=>'kar_finger-terminalid'],
						'pluginOptions' => [
							'allowClear' => true,
							'depends'=>['kar_finger-tmpcab'],
							'url'=>Url::to(['/master/finger/subcat']), /*Parent=0 barang Umum*/
							'initialize'=>false,
							'placeholder' =>false
							
						],
					])->label('Karyawan');
				?>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="row">
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
								<?=$form->field($model, 'FingerPrintID')->textInput(['maxlength' => true])?>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" style="padding-top:20px; text-align:right">
								<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
	

    <?php ActiveForm::end(); ?>
