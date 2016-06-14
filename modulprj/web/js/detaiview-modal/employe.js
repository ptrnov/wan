$(document).ready(function () {
	var stt  = localStorage.getItem("sts");
	var nilaiValue = localStorage.getItem("nilai");
	localStorage.setItem('sts','hidden');
	/*
	 * FIRST SHOW MODAL
	 * @author Ptr.nov [ptr.nov@gmail.com]
	*/
	$(document).on('click','#modalButton', function(ehead){	
			$.fn.modal.Constructor.prototype.enforceFocus = function(){};
			//e.preventDefault(); 		
			localStorage.clear();
			localStorage.setItem('nilai',ehead.target.value);			
			localStorage.setItem('sts','show');
			$('#modal-view').modal('show')
			.find('#modalContent')
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
	}); 
	
	/*
	 * STATUS HIDDEN IF EVENT MODAL HIDE
	 * @author Ptr.nov [ptr.nov@gmail.com]
	*/
	$('#modal-view').one('hidden.bs.modal', function () {
		localStorage.setItem('sts','hidden');
	});
	
	/*
	 * CALL BACK SHOW MODAL
	 * @author Ptr.nov [ptr.nov@gmail.com]
	*/	
	setTimeout(function(){
		$('#modal-view').modal(stt)
		.find('#modalContent')
		.load(nilaiValue);
		//.load('/master/employe/view?id=1.1215.0001');
		//.load(e.target.value);
		//alert(stt);
	}, 1000);  
});

	/*
	 * NOTED BUTTON NEDDED
	 * @author Ptr.nov [ptr.nov@gmail.com]
	 * @since 2.1
	*/
	// '<li>' . Html::button('<span class="fa fa-eye fa-dm"></span> '.Yii::t('app', 'View'),
	// ['value'=>url::to(['/master/employe/view','id'=>$model->KAR_ID]),
	// 'id'=>'modalButton',
	// 'style'=>['width'=>'100%','text-align'=>'left','border'=>0, 'background-color'=>'white', 'padding-left'=>'20px'],
	// ]). '</li>' . PHP_EOL; 