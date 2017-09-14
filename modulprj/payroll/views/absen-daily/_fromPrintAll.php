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
use kartik\widgets\DateTimePicker;
use modulprj\master\models\TimetableGroup;

$aryGrp=ArrayHelper::map(TimetableGroup::find()->all(), 'TT_GRP_ID','TT_GRP_NM');

	$form = ActiveForm::begin([
			'id'=> $model->formName(),			
			// 'enableClientValidation'=> true,
			// 'enableAjaxValidation'=>true,
			// 'method' => 'post',
			// 'validationUrl'=>Url::toRoute('/absensi/absen-import/valid')
	]);
		echo $form->field($model, 'TT_GRP_ID')->dropDownList($aryGrp,[
			'id'=>'timetablegroup-tt_grp_id',
			'prompt'=>' -- Pilih Salah Satu --',
		])->label('Karyawan Status');
	?>
   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>
