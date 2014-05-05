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
/**
*
* @access public
* @return void
**/
function categoria_load(){
	$.ajax(
		{
			type:'POST',
			url:base_url+'admin_categoria/combo/',
			data:{
				
			}
		}
	).done(
		function(msg){			
			var json;
			if(msg['data'].length>0){
				json=msg;
			}else{
				json=$.parseJSON(msg);
			}
			var data=json['data'];
			
			var html='';
			if(data!='false'){
				for(var i in data){
					var nombre=data[i].nombre;
					var id=data[i].id;
					html+='<option value="'+id+'">'+
							nombre+
						'</option>';				
				}
			}			
			$("#categoria").html(html);
			subcategoria_load();			
		}
	);
	$("#categoria").change(
		function(event){
			subcategoria_load();
		}
	);	
	$("#subcategoria").html('');
}
/**
*
* @access public
* @return void
**/
function subcategoria_load(){
	var id=$("#categoria").val();
	$.ajax(
		{
			type:'POST',
			url:base_url+'admin_subcategoria/combo/',
			data:{
				id:id
			}
		}
	).done(
		function(msg){			
			var json;
			if(msg['data'].length>0){
				json=msg;
			}else{
				json=$.parseJSON(msg);
			}
			var data=json['data'];
			
			var html='';
			if(data!='false'){
				for(var i in data){
					var nombre=data[i].nombre;
					var id=data[i].id;
					html+='<option value="'+id+'">'+
							nombre+
						'</option>';				
				}
			}
			$("#subcategoria").html(html);			
			producto_load();
		}
	);
	$("#subcategoria").change(
		function(event){
			producto_load();
		}
	);	
	$("#producto").html('');
}
/**
*
* @access public
* @return void
**/
function producto_load(){
	var id=$("#subcategoria").val();
	$.ajax(
		{
			type:'POST',
			url:base_url+'admin_producto/combo/',
			data:{
				id:id
			}
		}
	).done(
		function(msg){			
			var json;
			if(msg['data'].length>0){
				json=msg;
			}else{
				json=$.parseJSON(msg);
			}
			var data=json['data'];
			
			var html='';
			if(data!='false'){
				for(var i in data){
					var nombre=data[i].nombre;
					var id=data[i].id;
					html+='<option value="'+id+'">'+
							nombre+
						'</option>';				
				}
			}
			$("#producto").html(html);			
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
	 	'categoria',
	 	"subcategoria",
	 	"producto",
	 	'nombre',
	 	'descripcion',
	 	'marca',
	 	'precio',
	 	'precio_oferta',
	 	'descuento',
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
	categoria_load();	
	form_upload();
	form_data();
}

$(
	function(){
		main();
	}
);
