<?php
use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\FileInput;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\widgets\DatePicker;
use kartik\widgets\DateTimePicker;
use modulprj\master\models\TimetableGroup;
use modulprj\master\models\Dept;
use modulprj\master\models\Machine;

	$aryGrp=ArrayHelper::map(TimetableGroup::find()->all(), 'TT_GRP_ID','TT_GRP_NM');
	$aryCbgMachine=ArrayHelper::map(Machine::find()->all(), 'MESIN_NM','MESIN_NM');
	$aryDept=ArrayHelper::map(Dept::find()->all(), 'DEP_ID','DEP_NM');

	$form = ActiveForm::begin([
			'id'=> $model->formName(),
			'options'=>['target'=>'_blank'],		
			// 'enableClientValidation'=> true,
			// 'enableAjaxValidation'=>true,
			// 'method' => 'post',
			// 'validationUrl'=>Url::toRoute('/absensi/absen-import/valid')
	]);
		echo $form->field($model, 'CAB_ID')->dropDownList($aryCbgMachine,[
			'id'=>'dynamicmodel-cab_id',
			'prompt'=>' -- Pilih Salah Satu --',
		])->label('Cabang');	
		echo $form->field($model, 'TT_GRP_ID')->dropDownList($aryGrp,[
			'id'=>'dynamicmodel-tt_grp_id',
			'prompt'=>' -- Pilih Salah Satu --',
		])->label('Departemen');
		echo $form->field($model, 'DEP_ID')->dropDownList($aryDept,[
			'id'=>'dynamicmodel-dept_id',
			'prompt'=>' -- Pilih Salah Satu --',
		])->label('Karyawan Status');
	?>
   <div class="form-group">
        <?php //= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?=Html::submitButton('Submit',['class' => 'btn btn-primary']); ?>
    </div>
<?php ActiveForm::end(); ?>
