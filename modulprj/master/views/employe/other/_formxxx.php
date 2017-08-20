<?php 
use yii\helpers\Html;
//use modulprj\models\hrd\Corp;
use modulprj\models\hrd\Dept;
use modulprj\models\hrd\Jabatan;
use modulprj\models\hrd\Status;
use modulprj\models\hrd\Employe;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\builder\FormGrid;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use modulprj\models\system\side_menu\M1000;
use kartik\sidenav\SideNav;
use kartik\markdown\Markdown;
use kartik\tabs\TabsX;

$this->mddPage = 'hrd';

//$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]);
//$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL]);
/*Author: -ptr.nov- Generate digit EMP_ID */

/*Get Id count Author:-ptr.nov-*/
//$cnt= (Employe::find()->count())+1;

/*get ID Sparator Array , Author: -ptr.nov-*/
//$sql = 'SELECT max(EMP_ID) as EMP_ID FROM a0001';
//$cnt= Employe::findBySql($sql)->one();
///$arySplit=explode('.',$cnt->EMP_ID);
//$str_id_cnt=trim($arySplit[2]);
//print_r($str_id_cnt+1);
//$id_cnt=$str_id_cnt+1;

/*Combine String and Digit Author: -ptr.nov- */
//$digit=str_pad($id_cnt,4,"0",STR_PAD_LEFT);
//$thn=date("Y");
//$nl='LG'.'.'.$thn.'.'.$digit;
/*Author: Eka Side Menu */
$nl='LG';
$side_menu=\yii\helpers\Json::decode(M1000::find()->findMenu('hrd')->one()->jval);

$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL,'options'=>['enctype'=>'multipart/form-data']]);
?>
<div class="row">
    <div class="col-md-3">
<?php
echo  FormGrid::widget([
	'model'=>$model,
	'form'=>$form,
	'autoGenerateColumns'=>true,
	'rows'=>[
		[
            //'columns'=>2,
			'contentBefore'=>'<div class="box box-warning box-solid "> <div class="box-header with-border ">CORPORATE IDENTITY</div></div>',

            //autoGenerateColumns'=>false,
			'attributes'=>[ 
				'employe_identity' => [
					'label'=>'Employee.ID',
					'columns'=>4,
					'attributes'=>[
						'KAR_ID'=>[
							'type'=>Form::INPUT_TEXT,
							'Form::SIZE_LARGE', 							
							'options'=>[
								//'staticValue'=>'<large><bold>'.$kar_newkey.'</bold></large>',
								//'staticValue'=>$kar_newkey,
								'value'=>$kar_newkey,
                                //'staticOnly'=>true,
                                'readonly'=>true
							],
							'columnOptions'=>['colspan'=>1],
							
							//'label'=>$nl,
							//'value'=>$nl,
						],
						'KAR_NM'=>[
							'type'=>Form::INPUT_TEXT, 
							'options'=>['placeholder'=>'Enter First Name...'],
							'columnOptions'=>['colspan'=>2],
						],

					]
				],
			],
		],
        
		[
            //'contentBefore'=>'<div class="box box-warning box-solid "> <div class="box-header with-border ">CORPORATE IDENTITY</div></div>',

           // 'columns'=>2,
			'autoGenerateColumns'=>false,
			'attributes'=>[ 
				'employe_identity' => [
					'label'=>'Company',
					'columns'=>4,
					'attributes'=>[

                        'DEP_ID'=>[
							'type'=>Form::INPUT_DROPDOWN_LIST , 
							'items'=>ArrayHelper::map(Dept::find()->all(), 'DEP_ID','DEP_NM'),
							//'options'=>['placeholder'=>'Select Coorporate...'],
							'hint'=>'Department',
							'columnOptions'=>['colspan'=>2],
						],
						'JAB_ID'=>[
							'type'=>Form::INPUT_DROPDOWN_LIST , 
							'items'=>ArrayHelper::map(Jabatan::find()->all(), 'JAB_ID','JAB_NM'),
							//'options'=>['placeholder'=>'Select Coorporate...'],
							'hint'=>'Jabatan ',
							'columnOptions'=>['colspan'=>2],
						],
						'KAR_STS'=>[
							'type'=>Form::INPUT_DROPDOWN_LIST , 
							'items'=>ArrayHelper::map(Status::find()->all(), 'KAR_STS_ID','KAR_STS_NM'),
							//'options'=>['placeholder'=>'Select Coorporate...'],
							'hint'=>'Status',
							'columnOptions'=>['colspan'=>2],
						],
						'KAR_TGLM'=>[
							'type'=>Form::INPUT_WIDGET,
							'widgetClass'=>'\kartik\widgets\DatePicker',
							'options' => [
								//'placeholder' => 'Input Join Date  ...',
								'pluginOptions' => [
									'autoclose'=>true,
									'format' => 'yyyy-mm-dd',
									'todayHighlight' => true
								],
							],
							'hint'=>'Enter Join Date (yyyy-mm-dd)',
							'columnOptions'=>['colspan'=>2  ],
						],
						'KAR_TGLK'=>[
							'type'=>Form::INPUT_WIDGET,
							'widgetClass'=>'\kartik\widgets\DatePicker',
							'options' => [
								//'placeholder' => 'Input Resign Date  ...',
								'pluginOptions' => [
									'autoclose'=>true,
									'format' => 'yyyy-mm-dd',
									'todayHighlight' => true
								],
							],
							'hint'=>'Enter Resign Date (yyyy-mm-dd)',
							'columnOptions'=>['colspan'=>2],
						],
					]
				],
			],
		],
		[
			'contentBefore'=>'<legend class="text-info"><small>EMPLOYEE PROFILE</small></legend>',
			'columns'=>3,
			'autoGenerateColumns'=>false, // override columns setting
			'attributes'=>[       // colspan example with nested attributes
				'address_detail' => [
					'label'=>'Address',
					'columns'=>6,
					'attributes'=>[
						'KAR_KTP'=>[
							'type'=>Form::INPUT_TEXT,
							'options'=>['placeholder'=>'Enter NO KTP...'],
							'columnOptions'=>['colspan'=>2],
						],
						'KAR_ALMT'=>[
							//'type'=>Form::INPUT_TEXTAREA,
                            'type'=>Form::INPUT_WIDGET,
                            'widgetClass'=>'kartik\markdown\MarkdownEditor',
							//'options'=>['placeholder'=>'Enter address...'],
							'columnOptions'=>['colspan'=>6],
						],
                        /*
						'EMP_ZIP'=>[
							'type'=>Form::INPUT_TEXT,
							'options'=>['placeholder'=>'Zip...'],
							'columnOptions'=>['colspan'=>1],
						],
						'EMP_HP'=>[
							'type'=>Form::INPUT_TEXT,
							'options'=>['placeholder'=>'Phone...'],
							'columnOptions'=>['colspan'=>2],
						],
						'EMP_GENDER'=>[
							'type'=>Form::INPUT_RADIO_LIST,
							'items'=>['Male'=>'Male', 'Female'=>'Female'],
							'options'=>['inline'=>'Male'],
							'columnOptions'=>['colspan'=>4],
						],
						'EMP_TGL_LAHIR'=>[
							'type'=>Form::INPUT_WIDGET,
							'widgetClass'=>'\kartik\widgets\DatePicker',
							'options' => [
								//'placeholder' => 'Input Join Date  ...',
								'pluginOptions' => [
									'autoclose'=>true,
									'format' => 'yyyy-mm-dd',
									'todayHighlight' => true
								],
							],
							'hint'=>'Enter birthday  (yyyy-mm-dd)',
							'columnOptions'=>['colspan'=>3],
						],
						'EMP_EMAIL'=>[
							'type'=>Form::INPUT_TEXT,
							'options'=>[
								'placeholder'=>'acount@domain.com...',
								'addon' => ['prepend' => ['content'=>'@']],
							],
							'columnOptions'=>['colspan'=>3],
						],
                        */
					]
				],
			],
		],
		[	
			'columns'=>3,
			'attributes'=>[				
				'address_detail' => [ 
					'label'=>'Picture',
					'columns'=>6,
					'attributes'=>[
						'upload_file'=>[
							'type' => Form::INPUT_WIDGET,
							'widgetClass'=>'\kartik\widgets\FileInput',							
							'options'=>[
								'pluginOptions' => [
									'showPreview' => true,
									'showCaption' => false,
									'showRemove' => false,
									'showUpload' => false
									],
							],
							'columnOptions'=>['colspan'=>2],
							//'hint'=>'Enter Picture',
						],
					],
				],
			],			
		],
		[ //-Action Author: -ptr.nov-
			'attributes'=>[ 
				'actions'=>[    // embed raw HTML content
						'type'=>Form::INPUT_RAW, 
						'value'=>  '<div style="text-align: right; margin-top: 20px">' . 
							Html::resetButton('Reset', ['class'=>'btn btn-default']) . ' ' .
							Html::submitButton('Submit', ['class'=>'btn btn-primary']) . 
							'</div>'
				],
			],
		],
	]
  
]);
ActiveForm::end();

?>
    </div>
</div>