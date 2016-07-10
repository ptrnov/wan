<?php
use kartik\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model modulprj\master\models\IjinDetail */

$this->title = $model->IJN_ID;
$this->params['breadcrumbs'][] = ['label' => 'Ijin Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

	/*dv Header View Editing*/
	$dtIjinDetail=DetailView::widget([
		'id'=>'ijin-header-id',
		'model' => $model,
		'attributes' => [
			[
				'attribute' =>	'IJN_ID',
				'label'=>'Exception.Id :',
				'labelColOptions' => ['style' => 'text-align:right;width: 30%'],
				'options'=>[
					'readonly'=>true
				]
			],
			[
				'attribute' =>	'IIJN_NM',
				'label'=>'Exception Name:',
				'labelColOptions' => ['style' => 'text-align:right;width: 30%']
			],
			[
				'attribute' =>	'IJIN_KET',
				'label'=>'Descriptions :',
				'labelColOptions' => ['style' => 'text-align:right;width: 30%']
			],
		],
		'condensed'=>true,
		'hover'=>true,
		'mode'=>DetailView::MODE_VIEW,
		'buttons1'=>'{update}',
		'buttons2'=>'{view}{save}',
		'panel'=>[
					'heading'=>'<div style="float:left;margin-right:10px" class="fa fa-1x fa-list-alt"></div><div><h6 class="modal-title"><b>EXCEPTION HEADER</b></h6></div>',
					'type'=>DetailView::TYPE_INFO,
				],
		'saveOptions'=>[ 
			'id' =>'saveBtnHeader',
			'value'=>'/master/ijin-detail/view-header?id='.$model->IJN_ID,
			'params' => ['custom_param' => true],
		],		
	]);
?>
<div style="height:100%;font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div class="row" >
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?=$dtIjinDetail?>
		</div>
	</div>
</div>
