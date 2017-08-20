<?php
use kartik\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\Breadcrumbs;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\tabs\TabsX;
use kartik\date\DatePicker;
use kartik\builder\Form;
use yii\bootstrap\Modal;
use modulprj\assets\AppAsset; 
AppAsset::register($this);

$this->mddPage = 'hrd';
$this->title = Yii::t('app', 'Department');
$this->params['breadcrumbs'][] = $this->title;


	/*Modal DEPARTMENT*/
	Modal::begin([
		'id' => 'modal-view-dept',
		'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-clock-o"></div><div><h5 class="modal-title"><b>VIEW DEPARTMENT</b></h5></div>',
		//'size' => Modal::SIZE_SMALL,
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(74, 206, 231, 1)',
		],
	]);
	echo "<div id='modalContentDept'></div>";
	Modal::end();

	
	
	/*Modal Kepangkatan/Level*/
	Modal::begin([
		'id' => 'modal-view-kepangkatan',
		'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-clock-o"></div><div><h5 class="modal-title"><b>VIEW KEPANGKATAN</b></h5></div>',
		//'size' => Modal::SIZE_SMALL,
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(74, 206, 231, 1)',
		],
	]);
	echo "<div id='modalContentKepangkatan'></div>";
	Modal::end();
	
	/* Modal GRDAING/GOLONGAN */
	Modal::begin([
		'id' => 'modal-view-grading',
		'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-clock-o"></div><div><h5 class="modal-title"><b>VIEW GRADING</b></h5></div>',
		//'size' => Modal::SIZE_SMALL,
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(74, 206, 231, 1)',
		],
	]);
	echo "<div id='modalContentGrading'></div>";
	Modal::end();

	/*	Grid View Department */
	$rnDept=$this->render('_indexDept', [
		'searchModel_Dept'=>$searchModel_Dept,
		'dataProvider_Dept'=>$dataProvider_Dept,
	]);
	
	$rnDept=$this->render('_indexDept', [
		/*	Department */
		'searchModel_Dept'=>$searchModel_Dept,
		'dataProvider_Dept'=>$dataProvider_Dept,
	]);
	
	$rnKepangkatan=$this->render('_indexKepangkatan', [
		/*	Department */
		'searchModel_Gf'=>$searchModel_Gf,
		'dataProvider_Gf'=>$dataProvider_Gf,
	]);
	
	$rnGrading=$this->render('_indexGrading', [
		/*	Department */
		'searchModel_Grading'=>$searchModel_Grading,
		'dataProvider_Grading'=>$dataProvider_Grading,
	]);

?>
<div class="container-fluid" style="font-family: verdana, arial, sans-serif ;font-size: 8pt">
	<div class="raw">
		<div class="col-xs-12 col-sm-4 col-dm-4 col-lg-4">	
				<?=$rnDept?>		
		</div>
		<div class="col-xs-12 col-sm-4 col-dm-4 col-lg-4">		
				<?=$rnKepangkatan?>			
		</div>
		<div class="col-xs-12 col-sm-4 col-dm-4 col-lg-4">
			
				<?=$rnGrading?>
			
		</div>
	</div>
</div>
<?php
	/*  ADD GRADING */
	$this->registerJs("
		$.fn.modal.Constructor.prototype.enforceFocus = function(){};
		 $('#create-grading-id').on('show.bs.modal', function (event) {
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
        'id' => 'create-grading-id',
       'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-book"></div><div><h4 class="modal-title">GRADING INPUT</h4></div>',
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(97, 211, 96, 0.3)',
		],
    ]);
    Modal::end();
	
	/*  ADD  GROUP FUNCTION */
	$this->registerJs("
		 $('#create-gf-id').on('show.bs.modal', function (event) {
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
        'id' => 'create-gf-id',
       'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-book"></div><div><h4 class="modal-title">GROUP FUNCTION INPUT</h4></div>',
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(97, 211, 96, 0.3)',
		],
    ]);
    Modal::end();
	
	/* ADD DEPARTMENT  */
	$this->registerJs("
		 $('#create-dept-id').on('show.bs.modal', function (event) {
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
        'id' => 'create-dept-id',
       'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-book"></div><div><h4 class="modal-title">DEPARTMENT INPUT</h4></div>',
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(97, 211, 96, 0.3)',
		],
    ]);
    Modal::end();
	
	/* MODAL VIEW EDITING DEPARTMENT 
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	$this->registerJs("
		$(document).ready(function () {
		if(localStorage.getItem('sts_dept')==null){
			//alert(sts);
			localStorage.setItem('sts_dept','hidden');
		};
		var sts_dept_val = localStorage.getItem('sts_dept');
		var nilaiValueDept = localStorage.getItem('nilai');
		/*
		 * FIRST SHOW MODAL
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/
		$(document).on('click','#modalButtonDept', function(ehead){	
				$.fn.modal.Constructor.prototype.enforceFocus = function(){};
				//e.preventDefault(); 		
				localStorage.clear();
				localStorage.setItem('nilai',ehead.target.value);			
				localStorage.setItem('sts_dept','show');
				$('#modal-view-dept').modal('show')
				.find('#modalContentDept')
				.load(ehead.target.value);
		});
		
		/* TEST VALUE */
		//alert(sts_dept);
		//alert(nilaiValueDept);
		
		/*
		 * STATUS SHOW IF EVENT BUTTON SAVED
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/
		$(document).on('click','#saveBtnDept', function(e){		
			localStorage.setItem('sts_dept','show');
			localStorage.setItem('stsHeader','hidden');			
		}); 
		
		/*
		 * STATUS HIDDEN IF EVENT MODAL HIDE
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/
		$(document).one('hidden.bs.modal','#modal-view-dept', function () {
			localStorage.setItem('sts_dept','hidden');
		});
		
		/*
		 * CALL BACK SHOW MODAL
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/	
		setTimeout(function(){
			$('#modal-view-dept').modal(sts_dept_val)
			.find('#modalContentDept')
			.load(nilaiValueDept);
		}, 1000);  
	});
	",$this::POS_READY);
	
	/* MODAL VIEW EDITING KEPANGKATAN 
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	$this->registerJs("
		$(document).ready(function () {
		if(localStorage.getItem('sts_kepangkatan')==null){
			//alert(sts_kepangkatan);
			localStorage.setItem('sts_kepangkatan','hidden');
		};
		var sts_kepangkatan_val = localStorage.getItem('sts_kepangkatan');
		var nilaiValue = localStorage.getItem('nilai');
		/*
		 * FIRST SHOW MODAL
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/
		$(document).on('click','#modalButtonKepangkatan', function(ehead){	
				$.fn.modal.Constructor.prototype.enforceFocus = function(){};
				//e.preventDefault(); 		
				localStorage.clear();
				localStorage.setItem('nilai',ehead.target.value);			
				localStorage.setItem('sts_kepangkatan','show');
				$('#modal-view-kepangkatan').modal('show')
				.find('#modalContentKepangkatan')
				.load(ehead.target.value);
		});
		
		/*
		 * STATUS SHOW IF EVENT BUTTON SAVED
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/
		$(document).on('click','#saveBtnKepangkatan', function(e){		
			localStorage.setItem('sts_kepangkatan','show');
			localStorage.setItem('stsHeader','hidden');			
		}); 
		
		/*
		 * STATUS HIDDEN IF EVENT MODAL HIDE
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/
		$(document).one('hidden.bs.modal','#modal-view-kepangkatan', function () {
			localStorage.setItem('sts_kepangkatan','hidden');
		});
		
		/*
		 * CALL BACK SHOW MODAL
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/	
		setTimeout(function(){
			$('#modal-view-kepangkatan').modal(sts_kepangkatan_val)
			.find('#modalContentKepangkatan')
			.load(nilaiValue);
		}, 1000);  
	});
	",$this::POS_READY);
	
	/* MODAL VIEW EDITING GRADING 
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	$this->registerJs("
		$(document).ready(function () {
		if(localStorage.getItem('sts_grading')==null){
			//alert(sts_grading);
			localStorage.setItem('sts_grading','hidden');
		};
		var sts_grading_val = localStorage.getItem('sts_grading');
		var nilaiValue = localStorage.getItem('nilai');
		/*
		 * FIRST SHOW MODAL
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/
		$(document).on('click','#modalButtonGrading', function(ehead){	
				$.fn.modal.Constructor.prototype.enforceFocus = function(){};
				//e.preventDefault(); 		
				localStorage.clear();
				localStorage.setItem('nilai',ehead.target.value);			
				localStorage.setItem('sts_grading','show');
				$('#modal-view-grading').modal('show')
				.find('#modalContentGrading')
				.load(ehead.target.value);
		});
		
		/*
		 * STATUS SHOW IF EVENT BUTTON SAVED
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/
		$(document).on('click','#saveBtnGrading', function(e){		
			localStorage.setItem('sts_grading','show');
			localStorage.setItem('stsHeader','hidden');			
		}); 
		
		/*
		 * STATUS HIDDEN IF EVENT MODAL HIDE
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/
		$(document).one('hidden.bs.modal','#modal-view-grading', function () {
			localStorage.setItem('sts_grading','hidden');
		});
		
		/*
		 * CALL BACK SHOW MODAL
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/	
		setTimeout(function(){
			$('#modal-view-grading').modal(sts_grading_val)
			.find('#modalContentGrading')
			.load(nilaiValue);
		}, 1000);  
	});
	",$this::POS_READY);
?>
