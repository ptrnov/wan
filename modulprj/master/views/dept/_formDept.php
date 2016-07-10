<?php 
use yii\helpers\Html;
use modulprj\models\hrd\Dept;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
$this->mddPage = 'hrd';

$deptId= Yii::$app->ambilkonci->getKey_Department();
?>

	<div class="dept-form">
		<?php $form = ActiveForm::begin(); ?>

		<?=$form->field($model, 'DEP_ID')->textInput(['value'=>$deptId,'readonly'=>true])->label('Department.Id') ?>
		<?=$form->field($model, 'DEP_NM')->textInput(['maxlength' => true])->label('Department Name') ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end(); ?>
	</div>