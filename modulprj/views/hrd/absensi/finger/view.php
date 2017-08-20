<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
//use modulprj\models\basic\;
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
use yii\widgets\Breadcrumbs;

/* TABLE CLASS DEVELOPE -> |DROPDOWN,PRIMARYKEY-> ATTRIBUTE */
use modulprj\models\hrd\Karyawan;
/*	KARTIK WIDGET -> Penambahan componen dari yii2 dan nampak lebih cantik*/
use kartik\grid\GridView;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
//use \modulprj\models\hrd\Karyawan;
$this->mddPage = 'absensi';

	$attribute = [
		[
			'group'=>true,
			'label'=>'EMPLOYEE FINGER IDENTIFICATION',
			'rowOptions'=>['class'=>'info'],
			//'groupOptions'=>['class'=>'text-center']
		],
           [
                'attribute' =>'KAR_ID',
                'options'=>[
                    'readonly'=>true,
                 ],
                //'inputWidth'=>'20%'
                //'inputContainer' => ['class'=>'col-md-1'],
            ],
/*
            [
                'attribute' =>'KAR_ID',
                'options'=>[
                    'readonly'=>true,
                    'value' =>	'karOne.KAR_NM',
                ],
                //'inputWidth'=>'40%'
            ],
*/
  	];
	

$form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);
	echo DetailView::widget([
		'model' => $model,
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'panel'=>[
			'heading'=> 'TEST',//strtoupper($model->KAR_NM),// . ' '.$model->EMP_NM_BLK,
			'type'=>DetailView::TYPE_INFO,
		],
			'attributes'=>$attribute,

	]);		
ActiveForm::end();

?>
<div class="container">
    <div class="row row-centered">
        <div class="col-lg-12">
            <?php
            echo GridView::widget([
                'dataProvider' => $dataProvider_Finger,
                'filterModel' => $searchModel_Finger,
                'columns' => [
                    //['class' => 'yii\grid\SerialColumn'],
                    //'NO_URUT',
                    //'KAR_ID',
                    [
                        'attribute' => 'karOne.KAR_NM',
                        'filter' =>false,
                        //'filter' =>ArrayHelper::map(\modulprj\models\hrd\Karyawan::find()->orderBy('KAR_NM')->asArray()->all(), 'KAR_NM','KAR_NM')
                    ],
                    //'TerminalID',
                    [
                        'attribute' =>'mesinOne.MESIN_NM',
                        'filter' =>false,
                       // 'filter' =>ArrayHelper::map(\modulprj\models\hrd\Mesin::find()->orderBy('MESIN_NM')->asArray()->all(), 'MESIN_NM','MESIN_NM'),//$combo_Mesin,
                    ],
                     [
                        'class' => 'kartik\grid\EditableColumn',
                        'attribute' =>'FingerPrintID',
                         'filter' =>false,
                        //'readonly'=>function($model, $key, $index, $widget) {
                        //        return (10==$model->STATUS); // do not allow editing of inactive records
                        //    },
                        'editableOptions' => [
                            'header' => 'Finger Print',
                            'inputType' => \kartik\editable\Editable::INPUT_TEXT,
                            //'options' => [
                            //    'pluginOptions' => ['min'=>0, 'max'=>5000]
                            // ]
                        ],

                    ],

                ],

                'pjax'=>true,
                'pjaxSettings'=>[
                    'options'=>[
                        'enablePushState'=>false,
                        'id'=>'active',
                    ],
                ],
                'hover'=>true, //cursor select
                'responsive'=>true,
                'bordered'=>true,
                'striped'=>true,
                //'autoXlFormat'=>true,
                'export'=>[//export like view grid --ptr.nov-
                    'fontAwesome'=>true,
                    'showConfirmAlert'=>false,
                    'target'=>GridView::TARGET_BLANK
                ],
            ]);
            ?>
        </div>
    </div>
</div>