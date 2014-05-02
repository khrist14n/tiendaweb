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
				$("#image_id").val(data.id);
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
/**
 *
 * @access public
 * @return void
 **/
function main(){
	form_upload();
}

$(
	function(){
		main();
	}
)