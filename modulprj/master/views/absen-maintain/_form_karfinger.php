<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\FileInput;
use kartik\widgets\DepDrop;
use yii\helpers\Url;

use modulprj\master\models\Karyawan;
use modulprj\master\models\Cbg;
use modulprj\master\models\Dept;

$aryKaryawane = ArrayHelper::map(Karyawan::find()->all(), 'KAR_ID','KAR_NM');
/*Get CAB_ID From Machine Table depeden aryCbg*/
//$aryCbg =  ArrayHelper::map(Cbg::find()->asArray()->where(['TerminalID'=>$modelView->TerminalID])->all(), 'CAB_ID','CAB_NM');
$aryCbg =  ArrayHelper::map(Cbg::find()->asArray()->all(), 'CAB_ID','CAB_NM');
$aryDept =  ArrayHelper::map(Dept::find()->all(), 'DEP_ID','DEP_NM');

/* @var $this yii\web\View */
/* @var $model lukisongroup\hrd\models\Kar_finger */
/* @var $form yii\widgets\ActiveForm */
?>
	<?php $form = ActiveForm::begin([
                'id'=>'finger-employe',
                'enableClientValidation' => true,
				'method' => 'post',
				'action' => ['/master/absen-maintain/finger-emp-save'],
		]); 
	?>
	<div style="height:100%;font-family: verdana, arial, sans-serif ;font-size: 8pt">
		<div class="row" >
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				 <?=$form->field($model, 'mesinNm')->textInput(['value'=>$modelView->Machine_nm,'maxlength' => true,'readonly'=>true])->label('Machine ID'); ?>
				 				<?= $form->field($model, 'userNameFinger')->textInput(['value'=>$modelView->UserName,'maxlength' => true,'readonly'=>true])->label('Finger Name'); ?>
				<?= $form->field($model, 'EmpNmFinger')->textInput(['value'=>$modelView->empNm,'maxlength' => true,'readonly'=>true])->label('SetTo Employee Name'); ?>
			
				<?=$form->field($model, 'TerminalID')->hiddenInput(['value'=>$modelView->TerminalID,'maxlength' => true])->label(false); ?>
				<?= $form->field($model, 'FingerPrintID')->hiddenInput(['value'=>$modelView->UserID,'maxlength' => true,'readonly'=>true])->label(false); ?>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				 <?=$form->field($model, 'tmpCab')->dropDownList($aryCbg,[
						'id'=>'kar_finger-tmpcab',
					]);
				?>	  				
				<?=$form->field($model, 'tmpDept')->dropDownList($aryDept,[
						'id'=>'kar_finger-tmpdept',	
					])->label('Department');
				?>	  				
				<?=$form->field($model, 'KAR_ID')->widget(DepDrop::classname(), [
						'type'=>DepDrop::TYPE_SELECT2,
						'data' => $aryKaryawane,
						'options' => [
							'id'=>'select2-ijindetail-kar_id-container'
						],
						'pluginOptions' => [
							'depends'=>['kar_finger-tmpcab','kar_finger-tmpdept'],
							'url'=>Url::to(['/master/absen-maintain/cabang-dept-employe']),
							'initialize'=>true,
						],
					])->label('Change Employee');
				?>

				<?php // $form->field($model, 'FingerTmpl')->textarea(['rows' => 6]) ?>

				<?php // $form->field($model, 'UPDT')->textInput() ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="form-group">
					<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
				</div>
			</div>
		</div>
	</div>
<?php ActiveForm::end(); ?>


