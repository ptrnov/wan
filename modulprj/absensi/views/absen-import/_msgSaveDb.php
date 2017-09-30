<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\widgets\ActiveForm;
$form = ActiveForm::begin([
	'method' => 'post',
	'action' => ['/absensi/absen-import/sync'],
]);		
	// 
	
	if($sumStt==0){
		echo '<div style="text-align:center; padding-top:10px">';
		echo $form->field($model, 'validationSave')->textInput(['maxlength' => true])->label('Inputkan kata "setuju", jika tidak silakan tutup');
		echo Html::submitButton('PROCCESS SAVE',['class' => 'btn btn-success']);
		echo '</div>';
	}else{
		echo '<div style="text-align:center; padding-top:10px">';
		//echo 'Data Import belum benar,Pastikan data sudah benar !';
		echo 'Verifikasi Data ! Check kembali data sebelum prosess Save !';
		echo '</div>';
	}			
	// echo Html::submitButton('PROCCESS SAVE',['class' => 'btn btn-success']);
ActiveForm::end();

?>