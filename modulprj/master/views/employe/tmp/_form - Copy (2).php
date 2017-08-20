<?php 
use yii\helpers\Html;
//use modulprj\models\hrd\Corp;
use modulprj\models\basic\Cbg;
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
use yii\helpers\Url;
use kartik\editable\Editable;
use kartik\widgets\DepDrop;
$this->mddPage = 'hrd';
//$this->title = Yii::t('app', 'Create');
//$this->params['breadcrumbs'][] = $this->title;
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
//$nl='LG';
$side_menu=\yii\helpers\Json::decode(M1000::find()->findMenu('hrd')->one()->jval);

$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL,'options'=>['enctype'=>'multipart/form-data']]);
?>
<div class="row">
    <div class="col-md-8">
<?php
/*
echo Html::a('Click me', ['/hrd/employe/create'], [
        'id' => 'ajax_link_01',
        'data-on-done' => 'simpleDone',
    ]
);
*/
echo  FormGrid::widget([
	'model'=>$model,
	'form'=>$form,
	'autoGenerateColumns'=>true,
    //'ajax' => true,
	'rows'=>[
		[
            //'columns'=>2,
		'contentBefore'=>'<div class="box box-warning box-solid "> <div class="box-header with-border ">CORPORATE IDENTITY</div></div>',
        //autoGenerateColumns'=>false,
        'columns'=>4,
        'attributes'=>[
            'employe_identity' => [
                'columns'=>4,
                'label'=>'Cabang :',
                'attributes'=>[
                    'CAB_ID'=>[

                            'type'=>Form::INPUT_DROPDOWN_LIST ,
                            'items'=>ArrayHelper::map(Cbg::find()->all(), 'CAB_ID','CAB_NM'),
                            'options' => [ 'id'=>'cat-id',],
                            'columnOptions'=>['colspan'=>1],
                        ],
                        /*
                        'KAR_ID'=>[
                            'type'=>Form::INPUT_WIDGET,
                            'widgetClass'=>'kartik\widgets\DepDrop',
                            'options' => [
                                'options'=>['id'=>'subcat-id','readonly'=>true,], //PR VISIBLE DROP DOWN
                                'pluginOptions'=>[
                                    'depends'=>['cat-id'],
                                    //'placeholder'=>'Select...',
                                    'url'=>Url::to(['/hrd/employe/subcat']),
                                ],

                            ],

                            'columnOptions'=>['colspan'=>2],
                        ],
                        */
                    ],
                ],
            ],
		],
        [
            //'columns'=>2,
            //'contentBefore'=>'<div class="box box-warning box-solid "> <div class="box-header with-border ">CORPORATE IDENTITY</div></div>',

            //autoGenerateColumns'=>false,
            'attributes'=>[
                'employe_identity' => [
                    'label'=>'Employee.ID :',
                    'columns'=>4,
                    'attributes'=>[
                        'KAR_ID'=>[
                            'disabled'=>true,
                            'type'=>Form::INPUT_WIDGET,
                            'widgetClass'=>'kartik\widgets\DepDrop',
                            'options' => [
                                'options'=>['id'=>'subcat-id','readonly'=>true,'selected'=>false], //PR VISIBLE DROP DOWN
                                'pluginOptions'=>[
                                    'depends'=>['cat-id'],
                                    //'placeholder'=>'Select...',
                                    'url'=>Url::to(['/hrd/employe/subcat']),
                                    'initialize'=>true, //loding First //
                                    'placeholder' => false, //disable select //
                                ],

                            ],

                            'columnOptions'=>['colspan'=>2],
                        ],
/*
                        'KAR_ID'=>[
                            'type'=>Form::INPUT_TEXT,
                            'Form::SIZE_LARGE',
                            'options'=>[
                                //'staticValue'=>'<large><bold>'.$kar_newkey.'</bold></large>',
                                //'staticValue'=>$kar_newkey,
                                'value'=>$kar_newkey,
                                //'staticOnly'=>true,
                                'readonly'=>true,
                                //'pluginOptions'=>[
                                 //   'depends'=>['cat-id'],
                                  //  'placeholder'=>'Select...',
                                   // 'url'=>Url::to(['/hrd/employe/create']),
                                    //'params'=>['DDPX']
                               // ]
                            ],

                            'columnOptions'=>['colspan'=>1],

                            //'label'=>$nl,
                            //'value'=>$nl,
                        ],
*/
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
					'label'=>'Company :',
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

					]
				],
			],
		],

		[	

			'attributes'=>[				
				'address_detail' => [ 
					'label'=>'Picture :',
					'columns'=>4,
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
							'columnOptions'=>['colspan'=>3],
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
						'value'=>  '<div style="text-align: left; margin-top: 20px; margin-bottom: 20px;  margin-left: 20px">' .
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