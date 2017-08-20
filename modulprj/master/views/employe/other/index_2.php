<?php
/*
 * By ptr.nov
 * Load Config CSS/JS
 */
use backend\assets\AppAsset;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
AppAsset::register($this);

use yii\helpers\Html;
/*use yii\grid\GridView;*/

/* @var $this yii\web\View */
/* @var $searchModel app\models\maxi\MaxiprodakSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Maxiprodaks');
/*$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="maxiprodak-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'BRG_ID',
            'BRG_NM',
            ['class' => 'yii\grid\ActionColumn'],
			['class' => 'yii\grid\CheckboxColumn'],
			['class' => '\kartik\grid\RadioColumn'],
        ],
		
		'exportConfig'=> [
			GridView::EXCEL => [
				//'label' => Yii::t('kvgrid', 'Excel'),
				//'icon' => $isFa ? 'file-excel-o' : 'floppy-remove',
				'iconOptions' => ['class' => 'text-success'],
				'showHeader' => true,
				'showPageSummary' => true,
				'showFooter' => true,
				'showCaption' => true,
				//'filename' => Yii::t('kvgrid', 'grid-export'),
				//'alertMsg' => Yii::t('kvgrid', 'The EXCEL export file will be generated for download.'),
				//'options' => ['title' => Yii::t('kvgrid', 'Microsoft Excel 95+')],
				'mime' => 'application/vnd.ms-excel',
				'config' => [
				//'worksheet' => Yii::t('kvgrid', 'ExportWorksheet'),
				'cssFile' => ''
				]
			],
			
			GridView::PDF => [
				//'label' => Yii::t('kvgrid', 'PDF'),
				//'icon' => $isFa ? 'file-pdf-o' : 'floppy-disk',
				'iconOptions' => ['class' => 'text-danger'],
				'showHeader' => true,
				'showPageSummary' => true,
				'showFooter' => true,
				'showCaption' => true,
				//'filename' => Yii::t('kvgrid', 'grid-export'),
				//'alertMsg' => Yii::t('kvgrid', 'The PDF export file will be generated for download.'),
				//'options' => ['title' => Yii::t('kvgrid', 'Portable Document Format')],
				'mime' => 'application/pdf',
				'config' => [
				'mode' => 'c',
				'format' => 'A4-L',
				'destination' => 'D',
				'marginTop' => 20,
				'marginBottom' => 20,
				'cssInline' => '.kv-wrap{padding:20px;}' .
					'.kv-align-center{text-align:center;}' .
					'.kv-align-left{text-align:left;}' .
					'.kv-align-right{text-align:right;}' .
					'.kv-align-top{vertical-align:top!important;}' .
					'.kv-align-bottom{vertical-align:bottom!important;}' .
					'.kv-align-middle{vertical-align:middle!important;}' .
					'.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
					'.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
					'.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
				'methods' => [
					/*'SetHeader' => [
						['odd' => $pdfHeader, 'even' => $pdfHeader]
					],
					'SetFooter' => [
						['odd' => $pdfFooter, 'even' => $pdfFooter]
					],*/
				],
				'options' => [
					//'title' => $title,
					//'subject' => Yii::t('kvgrid', 'PDF export generated by kartik-v/yii2-grid extension'),
					//'keywords' => Yii::t('kvgrid', 'krajee, grid, export, yii2-grid, pdf')
				],
				'contentBefore'=>'',
				'contentAfter'=>''
				]
			],
			
		],
		
		/*'pjax'=>true,
		'pjaxSettings'=>[
			'neverTimeout'=>true,
			'beforeGrid'=>'My fancy content before.',
			'afterGrid'=>'My fancy content after.',
		],*/
		//'ShowPageSummary'=>true,
		//'resizableColumn'=>true,
		//'floatHeader'=>false,
		//'responsive'=>true,
		
	   'panel' => [
			'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> '.$this->title.'</h3>',
			'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Create {modelClass}',
					['modelClass' => 'Prodak',]),
					['create'], ['class' => 'btn btn-success']),
		],
		'hover'=>true, //cursor select
    ]);	
	
	
	
	// mengunakan modal 
	use yii\bootstrap\Modal;
	Modal::begin([
    'header' => '<h4 class="modal-title">Detail View Demo</h4>',
   'toggleButton' => ['label' => '<i class="glyphicon glyphicon-th-list"></i> Detail View in Modal', 'class' => 'btn btn-primary']
]);
	
	use kartik\builder\TabularForm;
	
    $form = ActiveForm::begin();
    echo TabularForm::widget([
        'form' => $form,
        'dataProvider' => $dataProvider,
        'attributes' => [
            'BRG_ID' => ['type' => TabularForm::INPUT_STATIC, 'columnOptions'=>['hAlign'=>GridView::ALIGN_CENTER]],
            'BRG_NM' => ['type' => TabularForm::INPUT_TEXT],
           /* 'color' => [
                'type' => TabularForm::INPUT_WIDGET, 
                'widgetClass' => \kartik\widgets\ColorInput::classname()
            ],
            'author_id' => [
                'type' => TabularForm::INPUT_DROPDOWN_LIST, 
                'items'=>ArrayHelper::map(Author::find()->orderBy('name')->asArray()->all(), 'id', 'name')
            ],
            'buy_amount' => [
                'type' => TabularForm::INPUT_TEXT, 
                'options'=>['class'=>'form-control text-right'], 
                'columnOptions'=>['hAlign'=>GridView::ALIGN_RIGHT]
            ],
            'sell_amount' => [
                'type' => TabularForm::INPUT_STATIC, 
                'columnOptions'=>['hAlign'=>GridView::ALIGN_RIGHT]
            ],*/
        ],
         'gridSettings'=>[
        'floatHeader'=>true,
        'panel'=>[
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Manage Books</h3>',
            'type' => GridView::TYPE_PRIMARY,
            'after'=> Html::a('<i class="glyphicon glyphicon-plus"></i> Add New', '#', ['class'=>'btn btn-success']) . ' ' . 
                    Html::a('<i class="glyphicon glyphicon-remove"></i> Delete', '#', ['class'=>'btn btn-danger']) . ' ' .
                    Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Save', ['class'=>'btn btn-primary'])
        ]
    ]   
    ]); 
    ActiveForm::end();
	
	
	
	
	
	
	
	
	
	?>

</div>
