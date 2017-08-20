<?php 
use yii\helpers\Html;
use modulprj\models\hrd\Jabatan;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;

$this->mddPage = 'hrd';
//$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL,'options'=>['enctype'=>'multipart/form-data']]);
//$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]);
$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]);

echo FormGrid::widget([
	'model'=>$model,
	'form'=>$form,
	'autoGenerateColumns'=>true,
	'rows'=>[
		[
            'contentBefore'=>'<div class="box box-success box-solid "> <div class="box-header with-border ">JABATAN IDENTITY</div></div>',
			//'columns'=>1,
			'autoGenerateColumns'=>false,
			'attributes'=>[ 
				'employe_identity' => [
					'label'=>'Jabatan.ID',
					'columns'=>5,
					'attributes'=>[
						'JAB_ID'=>[
							'type'=>Form::INPUT_TEXT,
							'Form::SIZE_LARGE', 							
							'options'=>[
								'value'=> Yii::$app->ambilkonci->getKey_Jabatan(),
                                'readonly'=>true,
							],
							'columnOptions'=>['colspan'=>3],
						],
						'JAB_NM'=>[
							'type'=>Form::INPUT_TEXT, 
							'options'=>['placeholder'=>'Position Name...'],
							'columnOptions'=>['colspan'=>4],
						],
					]
				],
			],
		],		
		
		[ //-Action Author: -ptr.nov-
			'attributes'=>[ 
				'actions'=>[    // embed raw HTML content
						'type'=>Form::INPUT_RAW, 
						'value'=>  '<div style="text-align: left;margin-top: 20px; margin-bottom: 20px;  margin-left: 20px">' .
							Html::resetButton('Reset', ['class'=>'btn btn-default']) . ' ' .
							Html::submitButton('Submit', ['class'=>'btn btn-primary']) . 
							'</div>'
				],
			],
		],
	]
  
]);
ActiveForm::end();