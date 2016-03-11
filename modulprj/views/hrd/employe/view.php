<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use modulprj\models\basic\Cbg;
use modulprj\models\hrd\Dept;
use modulprj\models\hrd\Jabatan;
use modulprj\models\hrd\Status;
use yii\web\UploadedFil;

use kartik\detail\DetailView;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveField;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\icons\Icon;
use kartik\widgets\Growl;
use kartik\widgets\FileInput;
use common\components\ambilStatus;

$this->mddPage = 'hrd';

//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Maxiprodaks'), 'url' => ['prodak']];
//$this->params['breadcrumbs'][] = $this->title;

    $Combo_Cbg = ArrayHelper::map(Cbg::find()->all(), 'CAB_ID','CAB_NM');
    $Combo_Dept = ArrayHelper::map(Dept::find()->all(), 'DEP_ID','DEP_NM');
    $Combo_Jab = ArrayHelper::map(Jabatan::find()->all(), 'JAB_ID','JAB_NM');
    $Combo_Status =ArrayHelper::map(Status::find()->all(), 'KAR_STS_ID','KAR_STS_NM');

	$Cabang_MDL = Cbg::find()->where(['CAB_ID'=>$model->CAB_ID])->orderBy('CAB_NM')->one();
    $Dept_MDL = Dept::find()->where(['DEP_ID'=>$model->DEP_ID])->orderBy('DEP_NM')->one();
    $Jabatan_MDL = Jabatan::find()->where(['JAB_ID'=>$model->JAB_ID])->orderBy('JAB_NM')->one();
    $Status_MDL = Status::find()->where(['KAR_STS_ID'=>$model->KAR_STS])->orderBy('KAR_STS_NM')->one();
	$Val_Cbg = $Cabang_MDL->CAB_NM;
	$Val_Dept = $Dept_MDL->DEP_NM;
	$Val_Jabatan = $Jabatan_MDL->JAB_NM;
	$Val_Status = $Status_MDL->KAR_STS_NM;
	
	$attribute = [
		[
			'group'=>true,
			'label'=>'EMPLOYEE IDENTIFICATION',
			'rowOptions'=>['class'=>'info'],
			//'groupOptions'=>['class'=>'text-center']
		],
            [
                'attribute' =>	'upload_file' ,
                'label'=>'',
                //'value'=>('<img src =' . Yii::getAlias('@HRD_EMP_UploadUrl') .'/'. $model->EMP_IMG. ' height="100" width="100"' . '>' )
                'value'=>Yii::getAlias('@HRD_EMP_UploadUrl') .'/'.$model->EMP_IMG,
                'format'=>['image',['width'=>'100','height'=>'120']],
                //'format'=>'raw',
                'type' => DetailView::INPUT_FILEINPUT,
                'widgetOptions'=>[
                            'pluginOptions' => [
                                'showPreview' => true,
                                'showCaption' => false,
                                'showRemove' => false,
                                'showUpload' => false
                            ],

                ],

                //'inputContainer' => ['class'=>'col-md-2'],
                //'format' => 'html', //'format' => 'image',
                //'value'=>function($data){
                //			return Html::img(Yii::getAlias('HRD_EMP_UploadUrl') . '/'. $data->EMP_IMG, ['width'=>'40']);
                //		},
            ],

            [
                'attribute' =>'KAR_ID',
                'options'=>[
                    'readonly'=>true,
                 ],
                //'inputWidth'=>'20%'
                //'inputContainer' => ['class'=>'col-md-1'],
            ],
            [
                'attribute' =>	'KAR_NM',
                //'inputWidth'=>'40%'
            ],
       //--'COMPANY IDENTIFICATION--
       [
           'group'=>true,
           'label'=>'COMPANY IDENTIFICATION',
           'rowOptions'=>['class'=>'info'],
           //'groupOptions'=>['class'=>'text-center']
       ],
           [ // CABANG - Author: -ptr.nov-
               'attribute' =>'CAB_ID',
               'format'=>'raw',
               'value'=>Html::a($Val_Cbg, '#', ['class'=>'kv-author-link']),
               'type'=>DetailView::INPUT_SELECT2,
               'widgetOptions'=>[
                   //'data'=>ArrayHelper::map(Author::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                   //'data'=>ArrayHelper::map(Corp::find()->orderBy('SORT')->asArray()->all(), 'CORP_ID','CORP_NM'),
                   'data'=>$Combo_Cbg ,
                   'options'=>['placeholder'=>'Select ...'],
                   'pluginOptions'=>['allowClear'=>true],
               ],
           //	'inputContainer' => ['class'=>'col-sm-3'],
               //'inputWidth'=>'40%'
           ],


            [ // Department - Author: -ptr.nov-
                'attribute' =>	'DEP_ID',
                'format'=>'raw',
                'value'=>Html::a($Val_Dept, '#', ['class'=>'kv-author-link']),
                'type'=>DetailView::INPUT_SELECT2,
                'widgetOptions'=>[
                    'data'=>$Combo_Dept ,
                    'options'=>['placeholder'=>'Select ...'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
                //'inputWidth'=>'40%'
            //	'inputContainer' => ['class'=>'col-sm-3'],
            ],

            [// Jabatan - Author: -ptr.nov-
                'attribute' =>	'JAB_ID' ,
                'format'=>'raw',
                'value'=>Html::a($Val_Jabatan, '#', ['class'=>'kv-author-link']),
                'type'=>DetailView::INPUT_SELECT2,
                'widgetOptions'=>[
                    'data'=>$Combo_Jab,
                    'options'=>['placeholder'=>'Select ...'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
                //'inputContainer' => ['class'=>'col-sm-3'],
                //'inputWidth'=>'40%'
            ],

            [// STATUS - Author: -ptr.nov-
                'attribute' =>	'KAR_STS',
                'format'=>'raw',
                'value'=>Html::a($Val_Status, '#', ['class'=>'kv-author-link']),
                'type'=>DetailView::INPUT_SELECT2,
                'widgetOptions'=>[
                    'data'=>$Combo_Status,
                    'options'=>['placeholder'=>'Select ...'],
                    'pluginOptions'=>['allowClear'=>true],
                ],
                //'inputContainer' => ['class'=>'col-sm-3'],
                //'inputWidth'=>'40%'

            ],

            [
                'attribute' =>	'KAR_TGLM',
                'format'=>'date',
                'type'=>DetailView::INPUT_DATE,
                'widgetOptions'=>[
                    'pluginOptions'=>['format'=>'yyyy-mm-dd']
                ],
                //'inputContainer' => ['class'=>'col-sm-3'],
                //'inputWidth'=>'40%'
            ],
            [
                'attribute' =>	'KAR_TGLK',
                'format'=>'date',
                'type'=>DetailView::INPUT_DATE,
                'widgetOptions'=>[
                    'pluginOptions'=>['format'=>'yyyy-mm-dd']
                ],
                //'inputWidth'=>'40%'
            //	'inputContainer' => ['class'=>'col-sm-3'],
            ],
            [
                'attribute' =>	'KAR_MAILK' ,
            ],

        //---EMPLOYEE IDENTITY---
		[
			'group'=>true,
			'label'=>'EMPLOYEE IDENTITY',
			'rowOptions'=>['class'=>'info'],
			//'groupOptions'=>['class'=>'text-center']
		],
            [
                'attribute' =>	'KAR_KTP' ,
            ],
            [
                'attribute' =>	'KAR_ALMT' ,
                'type'=>DetailView::INPUT_TEXTAREA,
            ],
            [
                'attribute' =>	'KAR_TMP_LAHIR' ,
            ],
            [
                'attribute' =>	'KAR_TGL_LAHIR',
                'format'=>'date',
                'type'=>DetailView::INPUT_DATE,
                'widgetOptions'=>[
                    'pluginOptions'=>['format'=>'yyyy-mm-dd']
                ],
                'inputWidth'=>'40%'
            ],
            [
                'attribute' =>	'KAR_JK',
                'type'=>Form::INPUT_RADIO_LIST,//:INPUT_RADIO_LIST,
                'items'=>['1'=>'Pria', '2'=>'Wanita'],
                //'format'=>'row',
                'value'=> Yii::$app->ambilStatus->getGender($model->KAR_JK),
                'options'=>['inline'=>true],
                'columnOptions'=>['colspan'=>4],
            ],
            [
                'attribute' =>	'KAR_AGM',
                'type'=>Form::INPUT_RADIO_LIST,//:INPUT_RADIO_LIST,
                'items'=>['1'=>'Islam', '2'=>'Kristen','3'=>'Katholik','4'=>'Budha','5'=>'Hindu',],
                'value'=> Yii::$app->ambilStatus->getAgama($model->KAR_AGM),
                'options'=>['inline'=>true],
                'columnOptions'=>['colspan'=>4],
            ],
            [
                'attribute' =>	'STT_ID',
                'type'=>Form::INPUT_RADIO_LIST,//:INPUT_RADIO_LIST,
                'items'=>['K'=>'Kawin', 'TK'=>'Tidak Kawin'],
                'value'=> Yii::$app->ambilStatus->getMarital($model->STT_ID),
                'options'=>['inline'=>true],
                'columnOptions'=>['colspan'=>4],
            ],
            [
                'attribute' =>	'JML_ANAK' ,
            ],
            [
                'attribute' =>	'NPWP' ,
            ],
            [
                'attribute' =>	'KAR_TLP' ,
            ],
            [
                'attribute' =>	'KAR_HP' ,
            ],
            [
                'attribute' =>	'KAR_MAILP' ,
            ],
        //--FORMAL EDUCATION--
        [
            'group'=>true,
            'label'=>'FORMAL EDUCATION',
            'rowOptions'=>['class'=>'info'],
            //'groupOptions'=>['class'=>'text-center']
        ],
            [
                'attribute' =>	'PEN_ID' ,
            ],
            [
                'attribute' =>	'KAR_PEN' ,
            ],

        //--SOCIAL SECURITY ---
        [
            'group'=>true,
            'label'=>'SOCIAL SECURITY',
            'rowOptions'=>['class'=>'info'],
            //'groupOptions'=>['class'=>'text-center']
        ],
            [
                'attribute' =>	'NO_JAMSOS' ,
            ],
            [
                'attribute' =>	'NO_ASR' ,
            ],

        //-- EMPLOYEE WALLET BANK ---
        [
            'group'=>true,
            'label'=>'EMPLOYEE WALLET BANK',
            'rowOptions'=>['class'=>'info'],
            //'groupOptions'=>['class'=>'text-center']
        ],
        [
            'attribute' =>	'BANK' ,
        ],
        [
            'attribute' =>	'NO_REK' ,
        ],

        //-- EMPLOYEE NOTE---
        [
            'group'=>true,
            'label'=>'EMPLOYEE NOTE',
            'rowOptions'=>['class'=>'info'],
            //'groupOptions'=>['class'=>'text-center']
        ],
        [
            'attribute' =>	'KAR_KET' ,
            'type'=>DetailView::INPUT_TEXTAREA,
        ],

  	];
	

$form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);

	echo DetailView::widget([
		'model' => $model,
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'panel'=>[
			'heading'=> strtoupper($model->KAR_NM),// . ' '.$model->EMP_NM_BLK,
			'type'=>DetailView::TYPE_INFO,
		],
			'attributes'=>$attribute,
		'deleteOptions'=>[
			'url'=>['delete', 'id' => $model->KAR_ID],
			'data'=>[
				'confirm'=>Yii::t('app', 'Are you sure you want to delete this record?'),
				'method'=>'post',
			],
		],
		
		
		/*
		
		'attributes' => [
			'EMP_ID',		
			'EMP_NM',					
			'EMP_NM_BLK',
			'EMP_IMG',

			// Employe Coorporation - Author: -ptr.nov-
			'EMP_CORP_ID' ,
			'DEP_ID',
			'EMP_GENDER',
			'EMP_STS',
			'JAB_ID' ,
			'EMP_IMG' ,
			//Employe Profile - Author: -ptr.nov-
			'EMP_KTP' ,
			'EMP_ALAMAT' ,
			'EMP_ZIP' ,
			'EMP_TLP' ,
			'EMP_HP' ,
			'EMP_EMAIL' ,
			'GRP_NM',
			'EMP_JOIN_DATE',
			//Join
			//'corpOne.CORP_NM' ,
			//'deptOne.DEP_NM' ,
			//'jabOne.JAB_NM' ,
			//'sttOne.STS_NM',	
		],
		*/
	]);		
ActiveForm::end();	
?>
	

