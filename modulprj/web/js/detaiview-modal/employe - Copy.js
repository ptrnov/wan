$(document).ready(function () {
	var stt  = localStorage.getItem("sts");
	var nilaiValue = localStorage.getItem("nilai");
	localStorage.setItem('sts','hidden');
	/*
	 * FIRST SHOW MODAL
	 * @author Ptr.nov [ptr.nov@gmail.com]
	*/
	$(document).on('click','#modalButton', function(ehead){			
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