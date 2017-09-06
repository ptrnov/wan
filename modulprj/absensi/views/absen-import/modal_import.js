/**
 * ===============================
 * JS Modal Import
 * Author	: ptr.nov2gmail.com
 * Update	: 05/09/2017
 * Version	: 2.1
 * ===============================
*/

/*
 * Import-review.
*/
$.fn.modal.Constructor.prototype.enforceFocus = function(){};
//$.fn.modal.prototype.constructor.Constructor.DEFAULTS.backdrop = 'static';	
$(document).on('click','#import-button-review', function(ehead){ 			  
	$('#import-modal-review').modal('show')
	.find('#import-modal-content-review').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
	//.load(ehead.target.value);
	.load($(this).attr('value'));
});

/*
 * import-Export-Excel.
*/
$.fn.modal.Constructor.prototype.enforceFocus = function(){};	
$(document).on('click','#import-button-export-excel', function(ehead){ 			  
	$('#import-modal-export-excel').modal('show')
	.find('#import-modal-content-export-excel').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
	.load(ehead.target.value);
});

/*
 * import-Export-Formula.
*/
$.fn.modal.Constructor.prototype.enforceFocus = function(){};	
$(document).on('click','#import-button-export-format', function(ehead){ 			  
	$('#import-modal-export-format').modal('show')
	.find('#import-modal-content-export-format').html('<i class=\"fa fa-2x fa-spinner fa-spin\"></i>')
	.load(ehead.target.value);
});


/**
 * ======================================== TIPS ========================================
 * HELPER INCLUDE FILE
 * include 	: index.php [MODAL JS AND CONTENT].
 * File		: modal_store.js And modal_store.php
 * Version	: 2.1
*/
/* 
	$this->registerJs($this->render('modal_store.js'),View::POS_READY);
	echo $this->render('modal_store');
*/

/**
 * HELPER BUTTON 
 * Action 	: Button
 * include	: View
 * Version	: 2.1
*/
/* 
	return  Html::button(Yii::t('app', 
		'<span class="fa-stack fa-xs">																	
			<i class="fa fa-circle fa-stack-2x " style="color:#f08f2e"></i>
			<i class="fa fa-cart-arrow-down fa-stack-1x" style="color:#fbfbfb"></i>
		</span> View Customers'
	),
	['value'=>url::to(['/marketing/sales-promo/view','id'=>$model->ID]),
	'id'=>'store-button-view',
	'class'=>"btn btn-default btn-xs ",      
	'style'=>['text-align'=>'left','width'=>'170px', 'height'=>'25px','border'=> 'none'],
	]); 
*/

/*=========================================================================================*/