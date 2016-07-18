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


	$itemSalary=$this->render('_salary',[
		'dataProvider' => $dataProvider,
        'searchModel' => $searchModel,
		'aryKaryawan'=>$aryKaryawan,
	]);
	// $timetableOvertime=$this->render('_salaryChart',[
		// 'dataProviderOt' => $dataProviderOt,
        // 'searchModelOt' => $searchModelOt,
	// ]);
		
	$items=[
		[
			'label'=>'<i class="fa fa-money fa-lg"></i> List Salary','content'=>$itemSalary,
		],
		[
			'label'=>'<i class="fa fa-area-chart fa-lg"></i> Chart ','content'=>'',
		],       
	];

	$tabSalary= TabsX::widget([
		'items'=>$items,
		'position'=>TabsX::POS_ABOVE,
		'bordered'=>true,
		'encodeLabels'=>false,
	]);	

?>
<div class="container-fluid" style="font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div  class="row" style="margin-top:0px"> 
		<?=$tabSalary?>
	</div>
</div>
<?php
/*
	 * ADD EMPLOYEE SALARY
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	$this->registerJs("
		 $.fn.modal.Constructor.prototype.enforceFocus = function(){};
		 $('#modal-create-salary').on('show.bs.modal', function (event) {
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
        'id' => 'modal-create-salary',
		'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-clock-o"></div><div><h4 class="modal-title">EMPLOYEE SALARY</h4></div>',
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(74, 206, 231, 1)',
		],
		'size'=>'modal-lg'
    ]);
    Modal::end();
?>