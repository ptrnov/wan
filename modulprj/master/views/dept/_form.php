<?php 
use yii\helpers\Html;
use modulprj\models\hrd\Dept;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
$this->mddPage = 'hrd';

$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]);
$nlDigit= (Dept::find()->count())+1;
$nl='LG'.$nlDigit;
echo FormGrid::widget([
	'model'=>$model,
	'form'=>$form,
	'autoGenerateColumns'=>true,
	'rows'=>[
		[

            'contentBefore'=>'<div class="box box-info box-solid "> <div class="box-header with-border ">DEPARTMENT IDENTITY</div></div>',
			//'columns'=>1,
			'autoGenerateColumns'=>false,
			'attributes'=>[ 
				'employe_identity' => [
					'label'=>'Dept.ID   :',
					'columns'=>5,
					'attributes'=>[
						'DEP_ID'=>[
							'type'=>Form::INPUT_TEXT,
							'Form::SIZE_LARGE', 							
							'options'=>[
								//'staticValue'=>'<large><bold>'.$nl.'</bold></large>',
								//'staticValue'=>$nl,
								//'value'=>$nl,
                                'value'=> Yii::$app->ambilkonci->getKey_Department(),
								'readonly'=>true,
							],
							'columnOptions'=>['colspan'=>3],
							
							//'label'=>$nl,
							//'value'=>$nl,
						],
						'DEP_NM'=>[
							'type'=>Form::INPUT_TEXT, 
							'options'=>['placeholder'=>'Department Name...'],
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