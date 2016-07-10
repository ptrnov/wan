<?php 
use yii\helpers\Html;
use modulprj\models\hrd\Dept;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
$this->mddPage = 'hrd';
?>

	<div class="dept-form">
		<?php $form = ActiveForm::begin(); ?>

		<?=$form->field($model, 'GF_ID')->textInput(['maxlength' => true])->label('Function/Level Id') ?>
		<?=$form->field($model, 'GF_NM')->textInput(['maxlength' => true,'strtoupper'=>true])->label('Function/Level Name') ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end(); ?>
	</div>