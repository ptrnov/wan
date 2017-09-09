<?php
use kartik\helpers\Html;
//use yii\helpers\Html;
use yii\helpers\ArrayHelper;
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

            // 'IN_WAKTU',
            // 'OUT_TGL',
            // 'OUT_WAKTU',
            // 'GRP_ID',
            // 'PAY_DAY',
            // 'VAL_PAGI',
            // 'VAL_LEMBUR',
            // 'PAY_PAGI',
            // 'PAY_LEMBUR',          
            // 'STATUS',
	$attAbsensi = [
		/* [
			'group'=>true,
			'label'=>false,
			'rowOptions'=>['class'=>'info'],
		], */
		[
			'attribute' =>	'TERMINAL_ID',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'MESIN_NM',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'KAR_ID',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'KAR_NM',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],		
		[
			'attribute' =>	'FINGER_ID',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'HARI',
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		[
			'attribute' =>	'IN_TGL',
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
			'attribute' =>	'OUT_TGL',
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
			'attribute' =>	'DCRP_DETIL',
			'type'=>DetailView::INPUT_TEXTAREA,
			'labelColOptions' => ['style' => 'text-align:right;width: 30%']
		],
		
		
		
	];
	
	$dtAbsensi=DetailView::widget([
		'id'=>'emp-identity-id',
		'model' => $model,
		'attributes'=>$attAbsensi,
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
?>	
	<?=$dtAbsensi?>

