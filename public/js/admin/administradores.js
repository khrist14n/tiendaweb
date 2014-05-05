
var optionsForm={
		beforeSend: function()
	    {
	    },
	    uploadProgress: function(event, position, total, percentComplete)
	    {	    
	    	
	    },
	    success: function()
	    {
	    	
	    },
		complete: function(response)
		{
			var data=$.parseJSON(response.responseText);
			if(data.success=='true'){
				$("#message").html("<font color='green'>"+data.message+"</font>");
				clear_form_data();
			}else{
				$("#message").html("<font color='red'> "+data.error+"</font>");
			}

		},
		error: function()
		{
			$("#message").html("<font color='red'> ERROR: unable to send form</font>");
		}
	};

var inputs=
	[
	 	'id',
	 	'login',
	 	'password',
	 	'email',	 	
    ];

/**
*
* @access public
* @return void
**/
function clear_form_data(){
	for(var i in inputs){
		$("#"+inputs[i]).val('');					
	}
}

/**
*
* @access public
* @return void
**/
function form_data(){
	$("#form_data").ajaxForm(optionsForm);
//	$("#enviar").click(
//			function(event){
//				$("#form_data").submit();
//				event.preventDefault();				
//			}
//	);
	$("#cancelar").click(
			function(){
				clear_form_data();
			}
	);
	
}

/**
 *
 * @access public
 * @return void
 **/
function main(){
	form_data();
}

$(
	function(){
		main();
	}
);