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


	Modal::begin([
			'id' => 'modal-view',
			'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-clock-o"></div><div><h5 class="modal-title"><b>VIEW TIMETABLE</b></h5></div>',
			'size' => Modal::SIZE_LARGE,
			'headerOptions'=>[
					'style'=> 'border-radius:5px; background-color: rgba(74, 206, 231, 1)',
			],
		]);
		echo "<div id='modalContent'></div>";
		Modal::end();

	$timetableNormal=$this->render('_timetableNormal',[
		'searchModelOtNormal' => $searchModelOtNormal,
		'dataProviderOtNormal' => $dataProviderOtNormal,
	]);
	
	$timetableOvertime=$this->render('_timetableOvertime',[
		'dataProviderOt' => $dataProviderOt,
        'searchModelOt' => $searchModelOt,
	]);
	
	$timetableOption=$this->render('_timetableOption',[
		'searchModelGrp'=>$searchModelGrp,
		'dataProviderGrp'=>$dataProviderGrp,
		'searchModelLvl'=>$searchModelLvl,
		'dataProviderLvl'=>$dataProviderLvl,
		'searchModelStt'=>$searchModelStt,
		'dataProviderStt'=>$dataProviderStt,
		'searchModelKtg'=>$searchModelKtg,
		'dataProviderKtg'=>$dataProviderKtg,
	]);
	$formulaOvertime=$this->render('_timetableFormula',[
		'searchModelFormula'=>$searchModelFormula,
		'dataProviderFormula'=>$dataProviderFormula,
	]);
	
	$items=[
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> TimeTabel','content'=>$timetableNormal,
		],
		// [
			// 'label'=>'<i class="glyphicon glyphicon-home"></i> TimeTabel Overtime','content'=>$timetableOvertime,
		// ],
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Tabel Formula','content'=>$formulaOvertime,
		],		
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Option','content'=>$timetableOption,
		],
		
	];

	$tabTimaTable= TabsX::widget([
		'items'=>$items,
		'position'=>TabsX::POS_ABOVE,
		//'height'=>'tab-height-xs',
		'bordered'=>true,
		'encodeLabels'=>false,
		//'align'=>TabsX::ALIGN_LEFT,

	]);	

?>
<div class="container-fluid" style="font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div  class="row" style="margin-top:0px;font-family: verdana, arial, sans-serif ;font-size: 8pt"> 
		<?=$tabTimaTable?>
	</div>
</div>
<?php
	/*
	 * CREATE TIMETABLE
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	$this->registerJs("
		 $.fn.modal.Constructor.prototype.enforceFocus = function(){};
		 $('#tt-add').on('show.bs.modal', function (event) {
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
        'id' => 'tt-add',
		'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-clock-o"></div><div><h4 class="modal-title">Add OfficeHour</h4></div>',
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(74, 206, 231, 1)',
		],
		'size'=>'modal-md'
    ]);
    Modal::end();
	
	/*
	 * CREATE OVERTIME
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	$this->registerJs("
		 $.fn.modal.Constructor.prototype.enforceFocus = function(){};
		 $('#set-overtime').on('show.bs.modal', function (event) {
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
        'id' => 'set-overtime',
		'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-clock-o"></div><div><h4 class="modal-title">Add Overtime</h4></div>',
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(74, 206, 231, 1)',
		],
		'size'=>'modal-md'
    ]);
    Modal::end();
?>
<?php
	/*
	 * CREATE EMPLOYEE JS
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	
?>