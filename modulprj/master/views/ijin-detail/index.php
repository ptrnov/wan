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

// use modulprj\assets\AppAsset; 	/* CLASS ASSET CSS/JS/THEME Author: -ptr.nov-*/
// AppAsset::register($this);
$this->mddPage = 'hrd';
$this->params['breadcrumbs'][] = $this->title;
//$this->sideCorp="Employee"; 

	/*Modal Detail*/
	Modal::begin([
		'id' => 'modal-view-ijin',
		'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-clock-o"></div><div><h5 class="modal-title"><b>VIEW PROCCESS EXCEPTION</b></h5></div>',
		'size' => Modal::SIZE_LARGE,
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(74, 206, 231, 1)',
		],
	]);
	echo "<div id='modalContentIjin'></div>";
	Modal::end();
	
	/*Modal header*/
	Modal::begin([
		'id' => 'modal-view-ijin-header',
		'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-clock-o"></div><div><h5 class="modal-title"><b>VIEW HEADER EXCEPTION</b></h5></div>',
		//'size' => Modal::SIZE_SMALE,
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(74, 206, 231, 1)',
		],
	]);
	echo "<div id='modalContentIjinHeader'></div>";
	Modal::end();
		

	$ijinDetail=$this->render('_ijinDetail',[
		'searchModelDetail' => $searchModelDetail,
		'dataProviderDetail' => $dataProviderDetail,
		'aryKaryawan'=>$aryKaryawan,
		'aryIjinHeader'=>$aryIjinHeader,
		'aryCbg'=>$aryCbg,
		'aryDep'=>$aryDep,
	]);
	$ijinHeader=$this->render('_ijinHeader',[
		'searchModelHeader'=>$searchModelHeader,
		'dataProviderHeader'=>$dataProviderHeader,
	]);
	if($tab==0){
		$tab0=true;
		$tab1=false;
	}elseif($tab==1){
		$tab0=false;
		$tab1=true;
	}
	$items=[
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Employee Exception','content'=>$ijinDetail,
			'active'=>$tab0,
		],
		[
			'label'=>'<i class="glyphicon glyphicon-home"></i> Exception List','content'=>$ijinHeader,
			'active'=>$tab1,
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
	
	/*HEADER*/
	/*
	 * PROCESS EXCEPTION ADD
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	$this->registerJs("
		 $.fn.modal.Constructor.prototype.enforceFocus = function(){};
		 $('#modal-create-header').on('show.bs.modal', function (event) {
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
        'id' => 'modal-create-header',
		'header' => '<div style="float:left;margin-right:10px" class="fa fa-2x fa-clock-o"></div><div><h4 class="modal-title">Add Exception</h4></div>',
		'headerOptions'=>[
				'style'=> 'border-radius:5px; background-color: rgba(74, 206, 231, 1)',
		],
		'size'=>'modal-xs'
    ]);
    Modal::end();
?>
<?php
	/*
	 * PROCESS EXCEPTION VIEW EDITING
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	$this->registerJs("
	$(document).ready(function () {
		if(localStorage.getItem('sts')==null){
			//alert(sts);
			localStorage.setItem('sts','hidden');
		};
		var stt  = localStorage.getItem('sts');
		var nilaiValue = localStorage.getItem('nilai');
		localStorage.setItem('sts','hidden');
		/*
		 * FIRST SHOW MODAL
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/
		$(document).on('click','#modalButtonIjin', function(ehead){	
				$.fn.modal.Constructor.prototype.enforceFocus = function(){};
				//e.preventDefault(); 		
				localStorage.clear();
				localStorage.setItem('nilai',ehead.target.value);			
				localStorage.setItem('sts','show');
				$('#modal-view-ijin').modal('show')
				.find('#modalContentIjin')
				.load(ehead.target.value);
		});
		
		/* TEST VALUE */
		//alert(stt);
		//alert(nilaiValue);
		
		/*
		 * STATUS SHOW IF EVENT BUTTON SAVED
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/
		$(document).on('click','#saveBtn', function(e){		
			localStorage.setItem('sts','show');
			localStorage.setItem('stsHeader','hidden');			
		}); 
		
		/*
		 * STATUS HIDDEN IF EVENT MODAL HIDE
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/
		$(document).one('hidden.bs.modal','#modal-view-ijin', function () {
			localStorage.setItem('sts','hidden');
		});
		
		/*
		 * CALL BACK SHOW MODAL
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/	
		setTimeout(function(){
			$('#modal-view-ijin').modal(stt)
			.find('#modalContentIjin')
			.load(nilaiValue);
		}, 1000);  
	});
	",$this::POS_READY);
	
	/*
	 * PROCESS EXCEPTION VIEW EDITING IJIN HEADER
	 * @author ptrnov [ptr.nov@gmail.com]
	 * @since 1.2
	 */
	$this->registerJs("
	$(document).ready(function () {
		if(localStorage.getItem('stsHdr')==null){
			//alert(stsHdr);
			localStorage.setItem('stsHdr','hidden');
		};
		if(localStorage.getItem('stsHdr')!=null){
			localStorage.setItem('sts','hidden');
		};
		var stsHdr  = localStorage.getItem('stsHdr');
		var nilaiValueHdr = localStorage.getItem('nilaiHdr');
		localStorage.setItem('stsHdr','hidden');
		/*
		 * FIRST SHOW MODAL
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/
		$(document).on('click','#modalButtonIjinHeader', function(ehead){	
				$.fn.modal.Constructor.prototype.enforceFocus = function(){};
				//e.preventDefault(); 		
				localStorage.clear();
				localStorage.setItem('nilaiHdr',ehead.target.value);			
				localStorage.setItem('stsHdr','show');
				$('#modal-view-ijin-header').modal('show')
				.find('#modalContentIjinHeader')
				.load(ehead.target.value);
		});
		
		/* TEST VALUE */
		//alert(stsHdr);
		//alert(nilaiValue);
		
		/*
		 * STATUS SHOW IF EVENT BUTTON SAVED
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/
		$(document).on('click','#saveBtnHeader', function(e){		
			localStorage.setItem('stsHdr','show');
			localStorage.setItem('sts','hidden');			
		}); 
		
		/*
		 * STATUS HIDDEN IF EVENT MODAL HIDE
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/
		$(document).one('hidden.bs.modal','#modal-view-ijin-header', function () {
			localStorage.setItem('stsHdr','hidden');
		});
		
		/*
		 * CALL BACK SHOW MODAL
		 * @author Ptr.nov [ptr.nov@gmail.com]
		*/	
		setTimeout(function(){
			$('#modal-view-ijin-header').modal(stsHdr)
			.find('#modalContentIjinHeader')
			.load(nilaiValueHdr);
		}, 1000);  
	});
	",$this::POS_READY);
?>