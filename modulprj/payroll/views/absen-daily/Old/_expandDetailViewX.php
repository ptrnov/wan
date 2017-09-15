<?php
use kartik\helpers\Html;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;
use kartik\tabs\TabsX;
use yii\helpers\Json;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use yii\web\Request;
use kartik\daterange\DateRangePicker;
use yii\db\ActiveRecord;
use yii\data\ArrayDataProvider;

	//print_r($model);
	//die();
	/*[1] LIST VIEW INFO */
	$vwHeader1=DetailView::widget([		
        'model' => $model,
        'attributes' => [
    		[
				'columns' => [
					[
						'attribute'=>'TGL', 
						'label'=>'Nama',
						'value'=> $model[0]['KAR_NM'],
						'displayOnly'=>true,
						'valueColOptions'=>['style'=>'width:35%;border-style:hidden'],
					],
					[
						//JAM MEMULAI PERJALANAN DARI DISTRIBUTOR/OTHER
						'attribute'=>'ABSEN_MASUK', 
						'format'=>'raw',
						'value'=> ': '.$model[0]['KAR_NM'],
						//'value'=> $model[0]['ABSEN_MASUK']!=''?$model[0]['ABSEN_MASUK']:"<span class='badge' style='background-color:#ff0000'>ABSENT </span>",
						'label'=>'START TIME',
						'valueColOptions'=>['style'=>'width:35%;border-style:hidden'], 
						//'displayOnly'=>true
					],
				],
			],
			[
				'columns' => [
					[
						'attribute'=>'SALES_NM', 
						'label'=>'SALES NAME',
						'value'=> $model[0]['KAR_NM'],
						'valueColOptions'=>['style'=>'width:35%;;border-style:hidden'], 
						'displayOnly'=>true
					],
					[
						//JAM SELESAI PERJALANAN DARI DISTRIBUTOR/OTHER
						'attribute'=>'ABSEN_KELUAR',
						'format'=>'raw',
						'value'=> $model[0]['KAR_NM'],
						//'value'=>$model[0]['ABSEN_KELUAR']!=''?$model[0]['ABSEN_KELUAR']:"<span class='badge' style='background-color:#ff0000'>ABSENT </span>",						
						'label'=>'END TIME',
						'valueColOptions'=>['style'=>'width:35%;border-style:hidden'], 
						'displayOnly'=>true
					],
				],
			],
			[
				'columns' => [
					[
						'attribute'=>'SCDL_GRP_NM', 
						'label'=>'GROUP',
						'value'=> $model[0]['KAR_NM'],
						'displayOnly'=>true,
						'valueColOptions'=>['style'=>'width:35%;border-style:hidden']
					],
					[
						//GPS IN -> VALUE AND STATUS
						'attribute'=>'ABSEN_MASUK_DISTANCE', 
						'label'=>'Radius.In',
						'format'=>'raw', 
						'value'=> $model[0]['KAR_NM'],
						// 'value'=>$model[0]['ABSEN_MASUK_DISTANCE']!=''?"<span class='fa fa-check fa-1x'></span>":"<span class='fa fa-remove fa-1x'></span>",
						//'value'=>"<span class='badge' style='background-color:#ff0000'>'' </span>".' '.$model[0]['ABSEN_MASUK_DISTANCE'],
						//'value'=>'<kbd>'.$model->book_code.'</kbd>',
						'valueColOptions'=>['style'=>'width:35%;border:0px;border-style:hidden'], 
						'displayOnly'=>true
					],
				],
			],
			[
				'columns' => [
					[
						'attribute'=>'HP', 
						'label'=>'Phone',
						'valueColOptions'=>['style'=>'width:35%;border-style:hidden'], 
						'value'=> $model[0]['KAR_NM'],
						// 'value'=> $model[0]['HP'],
						'displayOnly'=>true
					],
					[
						//GPS IN -> VALUE AND STATUS
						'attribute'=>'ABSEN_KELUAR_DISTANCE', 
						'label'=>'Radius.Out',
						'format'=>'raw', 
						'value'=> $model[0]['KAR_NM'],
						// 'value'=>$model[0]['ABSEN_KELUAR_DISTANCE']!=''?"<span class='fa fa-check fa-1x'></span>":"<span class='fa fa-remove fa-1x'></span>",
						//'value'=>"<span class='badge' style='background-color:#ff0000'>'' </span>".' '.$model[0]['ABSEN_KELUAR_DISTANCE'],
						//'value'=>'<kbd>'.$model->book_code.'</kbd>',
						'valueColOptions'=>['style'=>'width:35%;border-style:hidden'], 
						'displayOnly'=>true
					],
				],
			],
			[
				'columns' => [
					[
						'attribute'=>'ABSEN_TOTAL', 
						'label'=>'',
						'value'=>'',
						'valueColOptions'=>['style'=>'width:35%;border-style:hidden'], 
						'displayOnly'=>true,
						'bordered'=>false,
					],
					[
						'attribute'=>'ABSEN_TOTAL', 
						'label'=>'TOTAL TIME',
						'valueColOptions'=>['style'=>'width:35%;border-style:hidden'], 
						'displayOnly'=>true,
						
					],
				],
			],				
        ],
		'mode'=>DetailView::MODE_VIEW,
		'enableEditMode'=>false,
		'mainTemplate'=>'{detail}',
		'hover'=>false, //cursor select
		// 'responsive'=>true,
		// 'responsiveWrap'=>true,
		'striped'=>false,
		'bordered'=>false,
		'panel'=>false
		
    ]); 
?>
	<?=$vwHeader1?>
