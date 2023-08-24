function init()
{
    //alert("entra");

    $.post("ajax/categorias.php?op=listar_categorias",function(r){
	    $("#tbl_categorias").html(r);			    	
	                     
	});
}

function guardar_categoria()
{
    var nombre_categoria = $("#nombre_categoria").val();

            $.post("ajax/categorias.php?op=guardar_categoria",{nombre_categoria:nombre_categoria},function(data, status)
			{
			data = JSON.parse(data);

                $.post("ajax/categorias.php?op=listar_categorias",function(r){
                    $("#tbl_categorias").html(r);			    	
                                    
                });

			});	
}

function actualizar_orden(idcategoria)
{
    var orden_categoria = $("#orden_categoria"+idcategoria).val();

            $.post("ajax/categorias.php?op=actualizar_orden",{orden_categoria:orden_categoria,idcategoria:idcategoria},function(data, status)
			{
			data = JSON.parse(data);

                

			});	
}

function actualizar_nombre(idcategoria)
{
    var input_categoria = $("#input_categoria"+idcategoria).val();

            $.post("ajax/categorias.php?op=actualizar_nombre",{input_categoria:input_categoria,idcategoria:idcategoria},function(data, status)
			{
			data = JSON.parse(data);

                

			});	
}

function actualizar_color(idcategoria)
{
    var input_color = $("#input_color"+idcategoria).val();

            $.post("ajax/categorias.php?op=actualizar_color",{input_color:input_color,idcategoria:idcategoria},function(data, status)
			{
			data = JSON.parse(data);

                

			});	
}

function reordenar()
{
    $.post("ajax/categorias.php?op=listar_categorias",function(r){
        $("#tbl_categorias").html(r);			    	
                        
    });
}

function borrar_cat(idcategoria)
{

    bootbox.confirm('¿Deseas borrar esta categoria?', function(result) {
        if (result==true) {
            $.post("ajax/categorias.php?op=borrar_cat",{idcategoria:idcategoria},function(data, status)
            {
            data = JSON.parse(data);
            reordenar();
            });	
        }      
    });


            
}


function guardar_cat()
{
	
	var nombre_categoria = $("#nombre_categoria").val();
	var nom_file = $("#image").val();
	var nombre_archivo = nom_file.substr(12);
	
	if (nombre_categoria != "" && nom_file != "") {
		$.post("ajax/categorias.php?op=consul_nom_arch",{nombre_archivo:nombre_archivo},function(data, status)
		{
			data = JSON.parse(data);

			if (data.num_arch==0) {

				var formData = new FormData();
				var files = $('#image')[0].files[0];
				formData.append('file',files);
				$.ajax({
					url: 'upload_cat.php',
					type: 'post',
					data: formData,
					contentType: false,
					processData: false,
					success: function(response) {
						if (response != 0) {
							
							var nombre_categoria = $("#nombre_categoria").val();
							var color_categoria = $("#color_categoria").val();
							
							$.post("ajax/categorias.php?op=guardar_categoria",{
								nombre_categoria:nombre_categoria,
								nombre_archivo:nombre_archivo,
								color_categoria:color_categoria							
							},function(data, status)
							{
								data = JSON.parse(data);

								bootbox.alert("Categoria guardada exitosamente");
								reordenar();

								$("#nombre_categoria").val("");
								$("#image").val("");

								$("#inlineForm").modal("hide");

							});
							
																			
						} else {
							bootbox.alert('Formato de imagen incorrecto.');
						}
					}
				});
				return false;
			}else{
				bootbox.alert("Este nombre de archivo ya existe, por favor seleccione una imagen diferente");
			}

			

		});
	}else{
		bootbox.alert("Por favor verifica que todos los datos estén capturados.");
	}

	


		
}

function guardar_img(idcategoria)
{
	var nom_file = $("#image"+idcategoria).val();
	var nombre_archivo = nom_file.substr(12);

	$.post("ajax/categorias.php?op=consul_nom_arch",{nombre_archivo:nombre_archivo},function(data, status)
	{
			data = JSON.parse(data);

			if (data.num_arch==0) {

				var formData = new FormData();
				var files = $('#image'+idcategoria)[0].files[0];
				formData.append('file',files);
				$.ajax({
					url: 'upload_cat.php',
					type: 'post',
					data: formData,
					contentType: false,
					processData: false,
					success: function(response) {
						if (response != 0) {
							//alert(nombre_archivo);
							$.post("ajax/categorias.php?op=update_img_producto",{
								nombre_archivo:nombre_archivo,
								idcategoria:idcategoria
							},function(data, status)
							{
								data = JSON.parse(data);
								reordenar();

							});

						} else {

							bootbox.alert('Formato de imagen incorrecto.');

						}
					}
				});
				return false;
				
			}else{
				bootbox.alert("Este nombre de archivo ya existe, por favor seleccione una imagen diferente");
			}

	});
}

init();