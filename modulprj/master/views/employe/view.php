<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use modulprj\master\models\Cbg;
use modulprj\master\models\Dept;
use modulprj\master\models\Jabatan;
use modulprj\master\models\Status;
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

	if($model->EMP_IMG == null){ $gmbr = "df.jpg"; } else { $gmbr = $model->EMP_IMG; } 
	$attUnixId = [
		[
			'group'=>true,
			'label'=>'EMPLOYEE IDENTIFICATION',
			'rowOptions'=>['class'=>'info'],
			//'groupOptions'=>['class'=>'text-center']
		],
		[
			'attribute'=>'EMP_IMG',
			'value'=>Yii::getAlias('@web').'/upload/hrd/Employee/'.$gmbr,
			'format' => ['image',['width'=>'150','height'=>'150']],
			
		],	         
		[
			'attribute' =>'KAR_ID',
			'label'=>'Employee.ID',
			'options'=>[
				'readonly'=>true,
			 ],
			 'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
		[
			'attribute' =>	'KAR_NM',
			'label'=>'Name',
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
	];
	
	$attContact = [
		[
			'group'=>true,
			'label'=>'EMPLOYEE CONTACT',
			'rowOptions'=>['class'=>'info'],
			//'groupOptions'=>['class'=>'text-center']
		],		
		[
			'attribute' =>	'KAR_TLP' ,
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'KAR_HP',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'KAR_MAILP',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'KAR_ALMT' ,
			'type'=>DetailView::INPUT_TEXTAREA,
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],		
	];
	
	$attCompanyData = [
		[
		   'group'=>true,
		   'label'=>'COMPANY',
		   'rowOptions'=>['class'=>'info'],
		   //'groupOptions'=>['class'=>'text-center']
		],
		[ 
			'attribute' =>'CAB_ID',
			'format'=>'raw',
			'value'=>$modelCbg,
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
		[ // Department - Author: -ptr.nov-
			'attribute' =>'DEP_ID',
			'format'=>'raw',
			'value'=>$modelDept,
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],

		[// Jabatan - Author: -ptr.nov-
			'attribute' =>	'JAB_ID' ,
			'format'=>'raw',
			'value'=>$modelJab,
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
		[// STATUS - Author: -ptr.nov-
			'attribute' =>	'KAR_STS',
			'format'=>'raw',
			'value'=>$modelStatus,
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
		[
			'attribute' =>	'KAR_TGLM',
			'format'=>'date',
			'type'=>DetailView::INPUT_DATE,
			'widgetOptions'=>[
				'pluginOptions'=>['format'=>'yyyy-mm-dd']
			],			
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
		[
			'attribute' =>	'KAR_TGLK',
			'format'=>'date',
			'type'=>DetailView::INPUT_DATE,
			'widgetOptions'=>[
				'pluginOptions'=>['format'=>'yyyy-mm-dd']
			],
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
		[
			'attribute' =>	'KAR_MAILK',
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
	];
	
	$attIdentity = [
		[
			'group'=>true,
			'label'=>'EMPLOYEE IDENTITY',
			'rowOptions'=>['class'=>'info'],
		],
		[
			'attribute' =>	'KAR_KTP',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'KAR_ALMT',
			'type'=>DetailView::INPUT_TEXTAREA,
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'KAR_TMP_LAHIR',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'KAR_TGL_LAHIR',
			'format'=>'date',
			'type'=>DetailView::INPUT_DATE,
			'widgetOptions'=>[
				'pluginOptions'=>['format'=>'yyyy-mm-dd']
			],
			'inputWidth'=>'40%',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'KAR_JK',
			'type'=>Form::INPUT_RADIO_LIST,//:INPUT_RADIO_LIST,
			'items'=>['1'=>'Pria', '2'=>'Wanita'],
			//'format'=>'row',
			'value'=> Yii::$app->ambilStatus->getGender($model->KAR_JK),
			'options'=>['inline'=>true],
			'columnOptions'=>['colspan'=>4],
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'KAR_AGM',
			'type'=>Form::INPUT_RADIO_LIST,//:INPUT_RADIO_LIST,
			'items'=>['1'=>'Islam', '2'=>'Kristen','3'=>'Katholik','4'=>'Budha','5'=>'Hindu',],
			'value'=> Yii::$app->ambilStatus->getAgama($model->KAR_AGM),
			'options'=>['inline'=>true],
			'columnOptions'=>['colspan'=>4],
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'STT_ID',
			'type'=>Form::INPUT_RADIO_LIST,//:INPUT_RADIO_LIST,
			'items'=>['K'=>'Kawin', 'TK'=>'Tidak Kawin'],
			'value'=> Yii::$app->ambilStatus->getMarital($model->STT_ID),
			'options'=>['inline'=>true],
			'columnOptions'=>['colspan'=>4],
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'JML_ANAK',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'KAR_KET' ,
			'type'=>DetailView::INPUT_TEXTAREA,
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
	];
	
	$attPendidikan=[
		[
			'group'=>true,
			'label'=>'PENDIDIKAN',
			'rowOptions'=>['class'=>'info'],
			//'groupOptions'=>['class'=>'text-center']
		],
		[
			'attribute' =>	'PEN_ID',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'KAR_PEN',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		]    
	];
	
	$attBank = [	
		[
            'group'=>true,
            'label'=>'CARD DATA',
            'rowOptions'=>['class'=>'info'],
            //'groupOptions'=>['class'=>'text-center']
        ],
		[
			'attribute' =>	'NPWP',
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
		[
			'attribute' =>	'NO_JAMSOS',
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
		[
			'attribute' =>	'NO_ASR',
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
		[
			'attribute' =>	'BANK',
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
		[
			'attribute' =>	'NO_REK',
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		]		
  	];
	
	/*LEF*/
	$dtUnixId=DetailView::widget([
		'model' => $model,
		'attributes'=>$attUnixId ,	
	]);		
	
	$dtCompanyData=DetailView::widget([
		'model' => $model,
		'attributes'=>$attCompanyData,	
	]);
	
	$dtPendidikan=DetailView::widget([
		'model' => $model,
		'attributes'=>$attPendidikan,	
	]);	
	
	/*RIGHT*/
	$empContact= DetailView::widget([
		'model' => $model,
		'attributes'=>$attContact,	
	]);
	
	$dtEmIdentity=DetailView::widget([
		'model' => $model,
		'attributes'=>$attIdentity,	
	]);
	
	$dtBank= DetailView::widget([
		'model' => $model,
		'attributes'=>$attBank,	
	]);	
	

?>
<div class="barang-form" style="height:100%;font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div class="row">
		<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<?=$dtUnixId?>				
				<?=$dtCompanyData?>
				<?=$dtPendidikan?>				
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<?=$empContact?>
				<?=$dtEmIdentity?>
				<?=$dtBank?>
			</div>
		<?php ActiveForm::end();?>
	</div>
</div>
	

