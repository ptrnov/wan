<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
use yii\widget\Pjax;
use yii\helpers\Url;

use modulprj\assets\AppAsset; 	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
AppAsset::register($this);
$this->mddPage = 'hrd';
$this->params['breadcrumbs'][] = $this->title;
$this->sideCorp="Employee"; 


	$ijinDetail=$this->render('_ijinDetail',[
		'searchModelDetail' => $searchModelDetail,
		'dataProviderDetail' => $dataProviderDetail,
		'aryKaryawan'=>$aryKaryawan,
		'aryIjinHeader'=>$aryIjinHeader,
	]);
	$ijinHeader=$this->render('_ijinHeader',[
		'searchModelHeader'=>$searchModelHeader,
		'dataProviderHeader'=>$dataProviderHeader,
	]);
		
	$items=[
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Employee Exception','content'=>$ijinDetail,//$tab_employe_active,
		],
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Exception List','content'=>$ijinHeader,
		]
	];

	$tabIjin= TabsX::widget([
		'items'=>$items,
		'position'=>TabsX::POS_ABOVE,
		'bordered'=>true,
		'encodeLabels'=>false,
	]);	

?>
<div class="container-fluid" style="font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div  class="row" style="margin-top:0px"> 
		<?=$tabIjin?>
	</div>
</div>
<?php
	/*
	 * PROCESS EXCEPTION ADD
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	$this->registerJs("
		 $.fn.modal.Constructor.prototype.enforceFocus = function(){};
		 $('#process-exception-add').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget)
			var modal = $(this)
			var title = button.data('title')
			var href = button.attr('href')
			//modal.find('.modal-title').html(title)
			modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
			$.post(href)
				.done(function( data ) {
					modal.find('.modal-body').html(data)
				});
			})
	",$this::POS_READY);
    Modal::begin([
        'id' => 'process-exception-add',
		'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-clock-o"></div><div><h4 class="modal-title">Add Process Exception</h4></div>',
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(74, 206, 231, 1)',
		],
		'size'=>'modal-xs'
    ]);
    Modal::end();
?>