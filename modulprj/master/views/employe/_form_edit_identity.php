<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\FileInput;
use kartik\widgets\DepDrop;
use yii\helpers\Url;

?>

<div class="barang-form">
	<div class="row">
		<?php $form = ActiveForm::begin([
				'type' => ActiveForm::TYPE_HORIZONTAL,
				'method' => 'post',
				'action' => ['/master/employe/edit-titel','id'=>$model->KAR_ID],
				'id'=>'form-employe',
				'enableClientValidation' => true,
				'options' => ['enctype' => 'multipart/form-data']
			]);
		?>
			<?php // $form->field($model, 'cabID')->hiddenInput(['value'=>1,'maxlength' => true])->label(false) ?>
			
			<div class="col-lg-8 pull-right">
				
					<?php
						echo $form->field($model, 'vCabID')->textInput([
						'value'=>$model->cabOne['CAB_NM'],
						'maxlength' => true,
						'readonly'=>true,
						'style'=>[
							//'width'=>'50%'
						],
					])->label('Cabang');
					?>
					
					<?php
						echo $form->field($model, 'vKarId')->textInput([
								'value'=>$model->KAR_ID,
								'maxlength' => true,
								'readonly'=>true,
								'style'=>[
									//'width'=>'50%',
									//'float'=>'left'
								],
							])->label('EMP.Id');
					?>
				
				<?php 
				
					echo $form->field($model, 'vKarNm')->textInput([
								'value'=>$model->KAR_NM,
								'maxlength' => true,
								'readonly'=>true,
								'style'=>[
									//'width'=>'30%',
									//'float'=>'right',
									//'padding-top'=>'0px'
								],
							])->label('Name');
				?>				
			</div>
			<div class="col-lg-4">
				<?php
					echo Html::img(Yii::getAlias('@web').'/upload/hrd/Employee/'.$model->EMP_IMG, ['width'=>'130','height'=>'130', 'align'=>'right'])
				?>
			</div>
			<div class="col-lg-12">
				<?php
			
				
					
				/* echo $form->field($model, 'vCabID')->dropDownList($aryCbgID,[
					'id'=>'emp-cab',
					'prompt'=>$model->cabOne['CAB_NM'],
				])->label('Cabang'); */
				
				
				echo $form->field($model, 'KAR_NM')->textInput(['maxlength' => true,'style'=>[
								'width'=>'100%'
							],])->label('Nama');
				//CABANG -> Source Generate code  Compponen
				
				
				//echo $form->field($model, 'KAR_NM')->textInput(['maxlength' => true])->label('Nama');
				
				//INPUT FILE IMAGE
				 echo $form->field($model, 'image')->widget(FileInput::classname(), [
						'options'=>['accept'=>'image/*'],
						'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png']]
					]);  
			?>
			</div>
	<div  class="col-lg-12" style="text-align: right;">
			<?php echo Html::submitButton('Save',['class' => 'btn btn-primary']); ?>
		</div>

    <?php ActiveForm::end(); ?>
	</div>
</div>
