<?php
use kartik\helpers\Html;
//use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use modulprj\master\models\Cbg;
use modulprj\master\models\Dept;
use modulprj\master\models\Jabatan;
use modulprj\master\models\Status;
use yii\web\UploadedFile;
use yii\helpers\Url;
use kartik\detail\DetailView;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveField;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\icons\Icon;
use kartik\widgets\Growl;
use kartik\widgets\FileInput;
use kartik\builder\FormGrid;
use kartik\markdown\Markdown;
use kartik\widgets\DepDrop;

use common\components\ambilStatus;
use modulprj\assets\AppAsset; 	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
AppAsset::register($this);

	//if($model->EMP_IMG == null){ $gmbr = "df.jpg"; } else { $gmbr = $model->EMP_IMG; } 
	$attUnixId = [
		[
			'group'=>true,
			//'label'=>'EMPLOYEE IDENTIFICATION',
			'label'=>false,
			'rowOptions'=>['class'=>'info'],
			'groupOptions'=>['class'=>'text-left'] //text-center 
		],
		[
			'attribute'=>'image',
			'value'=>$model['imageview'],
			//'format' => 'raw',	
			'format' => ['image',['width'=>'150','height'=>'150']],	
			'type' => DetailView::INPUT_FILEINPUT,
			'widgetOptions'=>[
				'pluginOptions' => [
					'showPreview' => true,
					'showCaption' => false,
					'showRemove' => false,
					'showUpload' => false,
				],					
			],			
		],	         
		[
			'attribute' =>'KAR_ID',
			'options'=>[
				'readonly'=>true,
			 ],
			 'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
		[
			'attribute' =>	'KAR_NM',
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		],
	];
	
	$attContact = [
		/* [
			'group'=>true,
			//'label'=>'EMPLOYEE CONTACT',
			'label'=>'',
			'rowOptions'=>['class'=>'warning'],
			'groupOptions'=>['class'=>'text-left'] //text-center 
		],		 */
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
		// [
			// 'attribute' =>	'KAR_ALMT' ,
			// 'type'=>DetailView::INPUT_TEXTAREA,
			// 'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		// ],		
	];
	
	$attCompanyData = [
	/* 	[
		   'group'=>true,
		   'label'=>'COMPANY',
		   'rowOptions'=>['class'=>'info'],
		   'groupOptions'=>['class'=>'text-left'] //text-center 
		], */
		[ 
			'attribute' =>'CAB_ID',
			'format'=>'raw',
			//'value'=>$modelCbg,
			'value'=>$model->cabNm,
			'type'=>DetailView::INPUT_SELECT2,
			'widgetOptions'=>[
				'data'=>$aryCbgID,
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],	
		],
		[ // Department - Author: -ptr.nov-
			'attribute' =>'DEP_ID',
			'format'=>'raw',
			'value'=>$model->depNm,
			'type'=>DetailView::INPUT_SELECT2,
			'widgetOptions'=>[
				'data'=>$aryDeptID,
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],	
		],
		 
		[// Jabatan - Author: -ptr.nov-
			'attribute' =>	'JAB_ID' ,
			'value'=>$model->jabNm,			
			'format'=>'raw',
			'type'=>DetailView::INPUT_SELECT2,
			'widgetOptions'=>[
				'data'=>$aryJabID,
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],	
		],
		
		[ // STATUS - PEKERJAAN 
			'attribute' =>	'KAR_STS',
			'value'=>$model->stsKerjaNm,			
			'format'=>'raw',
			'type'=>DetailView::INPUT_SELECT2,
			'widgetOptions'=>[
				'data'=>$arySttID,
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],	
		],		
		[	// TANGGAL - MASUK  
			'attribute' =>	'KAR_TGLM',
			'format'=>'date',
			'type'=>DetailView::INPUT_DATE,
			'widgetOptions'=>[
				'pluginOptions'=>[
					'format'=>'yyyy-mm-dd',
					 'autoclose' => true,
                     'todayHighlight' => true,
				]
			],
			'inputWidth'=>'100%',
		],
		[
			// TANGGAL - KELUAR 
			'attribute' =>	'KAR_TGLK',
			'format'=>'date',
			'type'=>DetailView::INPUT_DATE,
			'widgetOptions'=>[
				'pluginOptions'=>[
					'format'=>'yyyy-mm-dd',
					 'autoclose' => true,
                     'todayHighlight' => true,
				]
			],
			'inputWidth'=>'100%',
		],
		
		[
			'attribute' =>	'KAR_MAILK',
			'labelColOptions' => ['style' => 'text-align:right;width: 40%']
		], 
	];
	
	$attIdentity = [
		/* [
			'group'=>true,
			'label'=>false,
			'rowOptions'=>['class'=>'info'],
		], */
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
				'pluginOptions'=>[
					'format'=>'yyyy-mm-dd',
					 'autoclose' => true,
                     'todayHighlight' => true,
				]
			],
			'inputWidth'=>'100%',
			//'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'KAR_JK',
			'type'=>Form::INPUT_RADIO_LIST,//:INPUT_RADIO_LIST,
			'items'=>['1'=>'Pria', '2'=>'Wanita'],
			//'format'=>'row',
			'value'=> Yii::$app->ambilStatus->getGender($model->KAR_JK),
			'options'=>['inline'=>true],
			//'columnOptions'=>['colspan'=>4],
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'AGAMA_ID',
			'type'=>Form::INPUT_RADIO_LIST,//:INPUT_RADIO_LIST,
			'items'=>['1'=>'Islam', '2'=>'Kristen','3'=>'Katholik','4'=>'Budha','5'=>'Hindu',],
			'value'=> Yii::$app->ambilStatus->getAgama($model->AGAMA_ID),
			'options'=>['inline'=>true],
			//'columnOptions'=>['colspan'=>4],
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'STT_ID',
			'type'=>Form::INPUT_RADIO_LIST,//:INPUT_RADIO_LIST,
			'items'=>['K'=>'Kawin', 'TK'=>'Tidak Kawin'],
			'value'=> Yii::$app->ambilStatus->getMarital($model->STT_ID),
			'options'=>['inline'=>true],
			//'columnOptions'=>['colspan'=>4],
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'JML_ANAK',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],		
		[
			'attribute' =>'PEN_ID',
			'format'=>'raw',
			'value'=>$model->schoolNm,
			//'value'=>$model->school_nm!=''?$model->school_nm:'none',
			'type'=>DetailView::INPUT_SELECT2,
			'widgetOptions'=>[
				'data'=>$arySchool,
				'options'=>['placeholder'=>'Select ...'],
				'pluginOptions'=>['allowClear'=>true],
			],		
		], 
		[
			'attribute' =>	'KAR_KET' ,
			'type'=>DetailView::INPUT_TEXTAREA,
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
	];
	
	/* $attPendidikan=[
		[
			'group'=>true,
			'label'=>'PENDIDIKAN',
			'rowOptions'=>['class'=>'info'],
			'groupOptions'=>['class'=>'text-left'] //text-center 
		],
		[
			'attribute' =>	'PEN_ID',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'KAR_PEN',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		]    
	]; */
	
	$attBank = [	
		/* [
            'group'=>true,
            'label'=>'CARD DATA',
            'rowOptions'=>['class'=>'info'],
            'groupOptions'=>['class'=>'text-left'] //text-center 
        ], */
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
		'id'=>'unix-id',
		'model' => $model,
		'attributes'=>$attUnixId ,
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'buttons1'=>'{update}',
		'buttons2'=>'{view}{save}',
		'panel'=>[
					//'heading'=>'#EMPLOYEE CONTACT',// . $model->EMP_NM . ' '.$model->EMP_NM_BLK,
					'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b>EMPLOYEE IDENTIFICATION</b></h6></div>',
					'type'=>DetailView::TYPE_INFO,
				],
		'saveOptions'=>[ 
			'id' =>'saveBtn',
			'value'=>'/master/employe/view?id='.$model->KAR_ID,
			'params' => ['custom_param' => true],
		],		
	]);	 
	$dtCompanyData=DetailView::widget([
		'id'=>'emp-corp-id',
		'model' => $model,
		'attributes'=>$attCompanyData,	
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'buttons1'=>'{update}',
		'buttons2'=>'{view}{save}',
		'panel'=>[
					//'heading'=>'#EMPLOYEE CONTACT',// . $model->EMP_NM . ' '.$model->EMP_NM_BLK,
					'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b>COMPANY</b></h6></div>',
					'type'=>DetailView::TYPE_INFO,
				],
		'saveOptions'=>[ 
			'id' =>'saveBtn',
			'value'=>'/master/employe/view?id='.$model->KAR_ID,
			'params' => ['custom_param' => true],
		],	
	]);

	/*RIGHT*/
	 $empContact= DetailView::widget([
		'id'=>'emp-contact-id',
		'model' => $model,
		'attributes'=>$attContact,	
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'buttons1'=>'{update}',
		'buttons2'=>'{view}{save}',
		'panel'=>[
					//'heading'=>'#EMPLOYEE CONTACT',// . $model->EMP_NM . ' '.$model->EMP_NM_BLK,
					'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-phone"></div><div><h6 class="modal-title"><b>CONTACT</b></h6></div>',
					'type'=>DetailView::TYPE_INFO,
				],
		'saveOptions'=>[ // your ajax delete parameters
			'id' =>'saveBtn',
			'value'=>'/master/employe/view?id='.$model->KAR_ID,
			'params' => ['custom_param' => true],
		],
	]);
	
	$dtEmIdentity=DetailView::widget([
		'id'=>'emp-identity-id',
		'model' => $model,
		'attributes'=>$attIdentity,
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'buttons1'=>'{update}',
		'buttons2'=>'{view}{save}',
		'panel'=>[
					//'heading'=>'#EMPLOYEE CONTACT',// . $model->EMP_NM . ' '.$model->EMP_NM_BLK,
					'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-user-plus"></div><div><h6 class="modal-title"><b>IDENTITY</b></h6></div>',
					'type'=>DetailView::TYPE_INFO,
				],
		'saveOptions'=>[ 
			'id' =>'saveBtn',
			'value'=>'/master/employe/view?id='.$model->KAR_ID,
			'params' => ['custom_param' => true],
		],		
	]);
	
	$dtBank= DetailView::widget([
		'id'=>'emp-bank-id',
		'model' => $model,
		'attributes'=>$attBank,	
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'buttons1'=>'{update}',
		'buttons2'=>'{view}{save}',
		'panel'=>[
					'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-credit-card-alt"></div><div><h6 class="modal-title"><b>CARD</b></h6></div>',
					'type'=>DetailView::TYPE_INFO,
				],
		'saveOptions'=>[ 
			'id' =>'saveBtn',
			'value'=>'/master/employe/view?id='.$model->KAR_ID,
			'params' => ['custom_param' => true],
		],
	]);	 
	

?>

<div style="height:100%;font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div class="row" >
		<?php 
			//$form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL,'options'=>['enctype'=>'multipart/form-data']]);
			/* $form = ActiveForm::begin([
				'options'=>['enctype'=>'multipart/form-data'],
				//'id'=>'frm-emp-view-edit',
				//'id'=>$model->formName()
				//'enableClientValidation' => true,
				//'enableAjaxValidation' => true,
				//'method' => 'post',
				//'action'=>'/master/employe/view?id="'.$model->KAR_ID.'"'
			]);    */
		?>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_VERTICAL,'options'=>['enctype'=>'multipart/form-data']]);?>
					<?=$dtUnixId?>		
				<?php ActiveForm::end();?>				
				<?=$dtCompanyData?>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<?=$empContact;?>
				<?=$dtEmIdentity?>
				<?=$dtBank?>
			</div>
		<?php //ActiveForm::end();?>
	</div>
</div>

<?php

 /*  $script = <<< JS
	$('form#{$model->formName()}').on('beforeSubmit',function(e){
	//$(document).on('beforeSubmit',function(e){
		//alret('test');
		
		var \$form=$(this);
		$.post(
			\$form=attr('action'),
			\$form.serialize()
			
		)
		.done(function(result){
			// console.log(result);
			if (result==1){
				
				 alret('test');
			}
			//
			// if(result.message=='Success'){
				// $(document).find('#')
			// }
		}).fail(function(){
			console.log("server error");
		});
		
		return false;
	});
JS;

$this->registerJs($script);   */
?>
