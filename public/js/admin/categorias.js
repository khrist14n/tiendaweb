
var options={
		beforeSend: function()
	    {
	    	$("#progress").show();
	    	$("#bar").width('0%');
	    	$("#message").html("");
			$("#percent").html("0%");
	    },
	    uploadProgress: function(event, position, total, percentComplete)
	    {
	    	$("#bar").width(percentComplete+'%');
	    	$("#percent").html(percentComplete+'%');

	    },
	    success: function()
	    {
	        $("#bar").width('100%');
	    	$("#percent").html('100%');
	    },
		complete: function(response)
		{
			var data=$.parseJSON(response.responseText);
			if(data.success=='true'){
				$("#message").html("<font color='green'>"+data.message+"</font>");
				$("#imagen_id").val(data.id);
			}else{
				$("#message").html("<font color='red'> "+data.error.error+"</font>");
			}

		},
		error: function()
		{
			$("#message").html("<font color='red'> ERROR: unable to upload files</font>");
		}
	};

/**
*
* @access public
* @return void
**/
function form_upload(){
	$("#form_file").ajaxForm(options);
	$("#imagen").change(
		function(){
			try{
				$("#form_file").submit();
			}catch(ex){
				console.log("File upload failed")
			}

		}
	);
}

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
	 	'nombre',
	 	'descripcion',
	 	'imagen_id',
	 	'imagen'	 	
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
	$("#enviar").click(
			function(){
				$("#form_data").submit();				
			}
	);
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
	form_upload();
	form_data();
}

$(
	function(){
		main();
	}
)