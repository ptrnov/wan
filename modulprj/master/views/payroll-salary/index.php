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


	/*Modal View|Edit Salary*/
	Modal::begin([
		'id' => 'modal-view-salary',
		'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-clock-o"></div><div><h5 class="modal-title"><b>VIEW SALARY</b></h5></div>',
		'size' => 'modal-lg',
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(74, 206, 231, 1)',
		],
	]);
	echo "<div id='modalContentSalary'></div>";
	Modal::end();
	
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
		'size'=>'modal-dm'
    ]);
    Modal::end();
	
	
	
	/*
	 * VIEW EDITING SALARY
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	$this->registerJs("
	$(document).ready(function () {
		if(localStorage.getItem('stsSalary')==null){
			//alert(stsSalary);
			localStorage.setItem('stsSalary','hidden');
		};
		if(localStorage.getItem('stsSalary')!=null){
			localStorage.setItem('sts','hidden');
		};
		var stsSalary  = localStorage.getItem('stsSalary');
		var nilaiValueHdr = localStorage.getItem('nilaiSalary');
		localStorage.setItem('stsSalary','hidden');
		/*
		 * FIRST SHOW MODAL
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/
		$(document).on('click','#modalButtonSalary', function(ehead){	
				$.fn.modal.Constructor.prototype.enforceFocus = function(){};
				//e.preventDefault(); 		
				localStorage.clear();
				localStorage.setItem('nilaiSalary',ehead.target.value);			
				localStorage.setItem('stsSalary','show');
				$('#modal-view-salary').modal('show')
				.find('#modalContentSalary')
				.load(ehead.target.value);
		});
		
		/* TEST VALUE */
		//alert(stsSalary);
		//alert(nilaiValue);
		
		/*
		 * STATUS SHOW IF EVENT BUTTON SAVED
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/
		$(document).on('click','#saveBtnSalary', function(e){		
			localStorage.setItem('stsSalary','show');
			localStorage.setItem('sts','hidden');			
		}); 
		
		/*
		 * STATUS HIDDEN IF EVENT MODAL HIDE
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/
		$(document).one('hidden.bs.modal','#modal-view-salary', function () {
			localStorage.setItem('stsSalary','hidden');
		});
		
		/*
		 * CALL BACK SHOW MODAL
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/	
		setTimeout(function(){
			$('#modal-view-salary').modal(stsSalary)
			.find('#modalContentSalary')
			.load(nilaiValueHdr);
		}, 1000);  
	});
	",$this::POS_READY);
	
	$this->registerJs("
		 $.fn.modal.Constructor.prototype.enforceFocus = function(){};
		 $('#modal-update-button-salary').on('show.bs.modal', function (event) {
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
        'id' => 'modal-update-button-salary',
		'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-money"></div><div><h4 class="modal-title">EDIT SALARY</h4></div>',
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(97, 211, 96, 0.3)',
		],
    ]);
    Modal::end();
?>