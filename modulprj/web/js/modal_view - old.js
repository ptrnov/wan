$(document).ready(function () {
	var result;
	var stt;
	var nilaiValue = localStorage.getItem("nilai");
	/*
	 * FIRST SHOW MODAL
	 * @author Ptr.nov [ptr.nov@gmail.com]
	*/
	//$(document).on('click','#modalButton', function(e){
	$(document).on('click','#modalButton', function(e){			
			//e.preventDefault(); 
			 localStorage.setItem('nilai',e.target.value);
			$('#modal-view').modal('show')
			.find('#modalContent')
			.load(e.target.value);
	});
	
	//alert(nilaiValue);
	setTimeout(function(){
		$('#modal-view').modal('show')
		.find('#modalContent')
		.load(nilaiValue);
		//.load('/master/employe/view?id=1.1215.0001');
		//.load(e.target.value);
		//alert(stt);
	}, 2000);  
	
	/* $('#saveButton').on('click', function(e){
		$('#modal-view').modal('hide');
		$('#modal-view').one('hidden.bs.modal').modal("hidden");
	}) */
	
	/* $(document).on('click','#saveButton', function(e){
			//e.preventDefault(); 
			//e.isDefaultPrevented();
			$('#modal-view').modal('show')
			.find('#modalContent')
			.load(e.target.value);
			//.load($(this).attr("value"));
			//return false;	
			storage.clear();			
	}); */
	 
	/*
	 * FIRST SHOW MODAL EDIT
	 * @author Ptr.nov [ptr.nov@gmail.com]
	*/
	/* $('#modalButton').on('click', function(e){
		//e.preventDefault();
		result="'"+e.target.value+"'";
		$('#modal-view').modal('show')
		.find('#modalContent')
		.load(e.target.value);
		//return false;
	})  */
	//alert(result);
	
	/* $('#modalButton').on('click', function(e){
		stt=1;
	})
	setTimeout(function(){
		$('#modal-view').modal('show')
		.find('#modalContent')
		.load('/master/employe/view?id=1.1215.0001');
		//.load(e.target.value);
		alert(stt);
	}, 2000);  */
	
	//$(document).on('hide','#modal-view', function () {
	//$("#modal-view").on('hidden.bs.modal', function () {
	/* $(document).on('click','#saveButton', function(e){
		$("#modal-view").on('show.bs.modal', function () {
			alert("123");
			// ('#modal-view').modal('show')
			// .find('#modalContent')
			// .load('/master/employe/view?id=1.1215.0001');
		})
	}); */
	/* $(function() {
		startRefresh();
	}); */
	/* $('#button').on('click', function(evt){
    $('#myModal').one('shown.bs.modal', function (e) {
        // this handler is detached after it has run once
    }).one('hidden.bs.modal', function(e) {
        // this handler is detached after it has run once
    }).modal(options);
}); */
	
	//function startRefresh() {
		
		
			
			
				
				/* $(document).on('click','#saveButton', function(e){
						
						 //urlData=urlData1
						//var stt=1;
					}); */
				
					/* $(document).on('click','#saveButton',function(e){
							alert('123');
					}); */
					/*  $(document).on('click','#saveButton', function(e){
						//rslt=e.target.value;
						//$('#modal-view').modal('hide');
						$('#modal-view').modal('show')
						.find('#modalContent')
						.load(e.target.value);
						return false;
					});	 */
					
					//if (stt=='1'){
						//alert(rslt);			
					//}
					//
					/* setTimeout(function(e){
						alert(rslt);
					}, 2000); */
					
					
					
				/* 	$('#modal-view').on('hide', function(){
						alert(urlData);
						
						//$('#modal-view').
						//alert('test123');
						//$('#modal-view').modal('show')
						//.find('#modalContent')
						//.load('/master/employe/view?id=1.1215.0001');
					}); */
				
				
		
	//}
	
	
	/*
	 * FIRST SHOW MODAL EDIT
	 * @author Ptr.nov [ptr.nov@gmail.com]
	*/
	/* $(document).on('click','#saveButton',function(e) {
		e.preventDefault();
		$('#modal-view').modal('show')
		.find('#modalContent')
		.load(e.target.value);
		return false;
	}) */
	
	 				
	
					
                   
	/* $(document).on('change', '#saveButton', function(e) {
		
		setTimeout(function(){

			alert('test123');
		}, 3000);
	}); */
					
		 
		/* 
		$(document).on('click', '#saveButton', function(e) {
			 
             var self = $(this);
            $.ajax({
                //url: '/master/employe/view?id=1.1215.0001',
                url: e.target.value,
                type: 'POST',
                data: self.closest('form').serialize(),
                success: function(data) {
                    if(data.success == true) {
						alert('test');
                        //$('#modal-view').modal('hide');
                       // location.reload(false)
                    } else {
                        //$('#modal-view').html(data);
						alert('test');
                    }
                }
            }); 
        });
	*/
	
	
	
	
	
	//alert("test");
/* 	$('#modalButton').click(function(){
					$('#modal-view').modal('show')
					.find('#modalContent')
					.load($(this).attr("value"));
			}); */
			
			// $('#modalButton').click(function(){
				// alert($(this).attr("value"));
			// });
			// $('#modalButton1').click(function(){
				// alert($(this).attr("value"));
			// });
			
		/* 	$(document).on('click', function(e) {
			//$('#modalButton').on('click', function(e) {
				//$('#modalButton').click(function(){
				//alert("test");
				alert(e.target.value);
			}); */
			
	
	
	//$(document).on('click','#saveButton',function(e) {
	/* $(document).on('submit',function(e){
			//e.preventDefault();
			$.ajax({
				type : 'POST',
				data: $(document).serialize(),
				url : 'http://wan.int/master/employe/view?id=1.1215.0001',
				success : function(data){
					alert('ok');
					//$("#download_link").html(data);
					// $('#modal-view').modal('show')
					 // .find('#modalContent')
					// .load('/master/employe/view?id=1.1215.0001');
				}
			});
			//return false;
			// $(document).on('click','#saveButton',function(e) {
				// alert(e.target.value); 
			// });
		
		
		
	//$(document).on('afterSubmit',function(e) {
				//alert(e.target.value); 
				
				//e.preventDefault();
				//$(this).submit();
				// $('#modal-view').modal('hide');
			  // $('#modal-view').modal('hide')
			  // .find('#modalContent')
			  // .load(e.target.value); 
			  
			   //$('#modal-view').modal('show')
			  //.find('#modalContent')
			  //.load(e.target.value);
			  
				
			
			 //return false;
		
	});
	 */
	// $(document).on('afterSubmit',function(e){
			// alret('test');
		// });
	
	
	
	
});