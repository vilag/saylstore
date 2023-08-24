function init()
{
    //alert("entra");
    listar_select_cat();
    
}

function listar_select_cat()
{
    $.post("ajax/productos.php?op=listar_select_cat",function(r){
	    $("#select_categorias").html(r);

        var select_categorias = $("#select_categorias").val();
		var select_estatus = $("#select_estatus").val();
        
        $.post("ajax/productos.php?op=listar_productos&idcategoria="+select_categorias+"&estatus="+select_estatus,function(r){
            $("#tbl_productos").html(r);			    	
                            
        });
	                     
	});
}

function listar_select_cat2()
{
    var select_categorias = $("#select_categorias").val();
	var select_estatus = $("#select_estatus").val();
        
    $.post("ajax/productos.php?op=listar_productos&idcategoria="+select_categorias+"&estatus="+select_estatus,function(r){
        $("#tbl_productos").html(r);			    	
                        
    });
}

function listar_cat()
{
    $.post("ajax/productos.php?op=listar_select_cat",function(r){
	    $("#select_categorias_n").html(r);

    });
}

function guardar_prod()
{
	
	var nombre_prod_n = $("#nombre_prod_n").val();
	var descrip_breve_n = $("#descrip_breve_n").val();
	var detalle_prod_n = $("#detalle_prod_n").val();
	var select_gen_n = $("#select_gen_n").val();
	var precio_prod_n = $("#precio_prod_n").val();
	var nom_file = $("#image").val();
	var nombre_archivo = nom_file.substr(12);

	if (nombre_prod_n != "" && descrip_breve_n != "" && detalle_prod_n != "" && select_gen_n != "" && precio_prod_n != "" && nom_file != "") {
		
		$.post("ajax/productos.php?op=consul_nom_arch",{nombre_archivo:nombre_archivo},function(data, status)
		{
			data = JSON.parse(data);

			if (data.num_arch==0) {

				var formData = new FormData();
				var files = $('#image')[0].files[0];
				formData.append('file',files);
				$.ajax({
					url: 'upload.php',
					type: 'post',
					data: formData,
					contentType: false,
					processData: false,
					success: function(response) {
						if (response != 0) {
							
							var select_categorias_n = $("#select_categorias_n").val();
							var nombre_prod_n = $("#nombre_prod_n").val();
							var descrip_breve_n = $("#descrip_breve_n").val();
							var detalle_prod_n = $("#detalle_prod_n").val();
							var select_gen_n = $("#select_gen_n").val();
							var precio_prod_n = $("#precio_prod_n").val();

							$.post("ajax/productos.php?op=guardar_producto",{
								nombre_archivo:nombre_archivo,
								select_categorias_n:select_categorias_n,
								nombre_prod_n:nombre_prod_n,
								descrip_breve_n:descrip_breve_n,
								detalle_prod_n:detalle_prod_n,
								select_gen_n:select_gen_n,
								precio_prod_n:precio_prod_n
							},function(data, status)
							{
								data = JSON.parse(data);

								bootbox.alert("Producto guardado exitosamente");
								listar_select_cat2();

								$("#image").val("");
								$("#select_categorias_n").val("");
								$("#nombre_prod_n").val("");
								$("#descrip_breve_n").val("");
								$("#detalle_prod_n").val("");
								$("#select_gen_n").val("");
								$("#precio_prod_n").val("");

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

function actualizar_nombre()
{
	var idproducto = $("#idproducto").val();
    var input_nombre = $("#input_nombre").val();
    $.post("ajax/productos.php?op=actualizar_nombre",{input_nombre:input_nombre,idproducto:idproducto},function(data, status)
	{
		data = JSON.parse(data);
		abrir_detalle_prod(idproducto);
	});	
}

function actualizar_det_gen()
{
	var idproducto = $("#idproducto").val();
    var descrip_breve = $("#descrip_breve").val();
    $.post("ajax/productos.php?op=actualizar_det_gen",{descrip_breve:descrip_breve,idproducto:idproducto},function(data, status)
	{
		data = JSON.parse(data);
		abrir_detalle_prod(idproducto);
	});	
}

function actualizar_des_det()
{
	var idproducto = $("#idproducto").val();
    var descrip_det = $("#descrip_det").val();
    $.post("ajax/productos.php?op=actualizar_des_det",{descrip_det:descrip_det,idproducto:idproducto},function(data, status)
	{
		data = JSON.parse(data);
		abrir_detalle_prod(idproducto);
	});	
}

function actualizar_precio()
{
	var idproducto = $("#idproducto").val();
    var precio_edit = $("#precio_edit").val();
    $.post("ajax/productos.php?op=actualizar_precio",{precio_edit:precio_edit,idproducto:idproducto},function(data, status)
	{
		data = JSON.parse(data);
		abrir_detalle_prod(idproducto);
	});	
}

function actualizar_orden()
{
	var idproducto = $("#idproducto").val();
    var orden_prod = $("#orden_prod").val();
    $.post("ajax/productos.php?op=actualizar_orden",{orden_prod:orden_prod,idproducto:idproducto},function(data, status)
	{
		data = JSON.parse(data);
		abrir_detalle_prod(idproducto);
	});	
}

function actualizar_genero()
{
	var idproducto = $("#idproducto").val();
    var genero_edit = $("#genero_edit").val();
	//alert(genero_edit);
    $.post("ajax/productos.php?op=actualizar_genero",{genero_edit:genero_edit,idproducto:idproducto},function(data, status)
	{
		data = JSON.parse(data);
		abrir_detalle_prod(idproducto);
		document.getElementById("genero_edit").style.display = "none";
	});	
}

function guardar_talla()
{
	var tipo_guardado = $("#tipo_guardado").val();
	var idproducto = $("#idproducto").val();
	var talla_edit = $("#talla_edit").val();
	var cant_prod = $("#cant_prod").val();
	var id_act_talla = $("#id_act_talla").val();

	//alert(tipo_guardado);

	if (talla_edit!="") {

		if (tipo_guardado==1) {
			
			//alert(genero_edit);
			$.post("ajax/productos.php?op=actualizar_talla",{talla_edit:talla_edit,idproducto:idproducto,cant_prod:cant_prod,id_act_talla:id_act_talla},function(data, status)
			{
				data = JSON.parse(data);

				document.getElementById("div_datos_talla").style.display = "none";
				abrir_detalle_prod(idproducto);
						
			});	
		}else{
			if (tipo_guardado==2) {


				$.post("ajax/productos.php?op=guardar_talla",{talla_edit:talla_edit,idproducto:idproducto,cant_prod:cant_prod},function(data, status)
				{
					data = JSON.parse(data);

					document.getElementById("div_datos_talla").style.display = "none";
					abrir_detalle_prod(idproducto);
							
				});	
				
			}
		}
		
	}else{
		bootbox.alert("Por favor seleccione una talla.");
	}

	

	
}



function actualizar_colores()
{
	var idproducto = $("#idproducto").val();
    var colores_edit = $("#colores_edit").val();
	//alert(genero_edit);
    $.post("ajax/productos.php?op=actualizar_colores",{colores_edit:colores_edit,idproducto:idproducto},function(data, status)
	{
		data = JSON.parse(data);

		document.getElementById("colores_edit").style.display = "none";
		abrir_detalle_prod(idproducto);
	});	
}

function actualizar_dest()
{
	var idproducto = $("#idproducto").val();
    var dest_edit = $("#dest_edit").val();
	//alert(genero_edit);
    $.post("ajax/productos.php?op=actualizar_dest",{dest_edit:dest_edit,idproducto:idproducto},function(data, status)
	{
		data = JSON.parse(data);

		document.getElementById("dest_edit").style.display = "none";
		abrir_detalle_prod(idproducto);
	});	
}

function actualizar_marca()
{
	var idproducto = $("#idproducto").val();
    var marca_edit = $("#marca_edit").val();
	//alert(genero_edit);
    $.post("ajax/productos.php?op=actualizar_marca",{marca_edit:marca_edit,idproducto:idproducto},function(data, status)
	{
		data = JSON.parse(data);

		document.getElementById("marca_edit").style.display = "none";
		abrir_detalle_prod(idproducto);
	});	
}

function borrar_prod()
{
	var idproducto = $("#idproducto").val();
	bootbox.confirm('¿Deseas borrar este producto?', function(result) {
        if (result==true) {           
			$.post("ajax/productos.php?op=borrar_prod",{idproducto:idproducto},function(data, status)
			{
				data = JSON.parse(data);
				var select_categorias = $("#select_categorias").val();				
				$.post("ajax/productos.php?op=listar_productos&idcategoria="+select_categorias,function(r){
					$("#tbl_productos").html(r);					
					bootbox.alert("Producto eliminado correctamente");	
					$("#modal_det_prod").modal("show");								
				});				
			});	
        }      
    });
			
}

function guardar_img()
{
	var idproducto = $("#idproducto").val();
	var nom_file = $("#image2").val();
	var nombre_archivo = nom_file.substr(12);

	$.post("ajax/productos.php?op=consul_nom_arch",{nombre_archivo:nombre_archivo},function(data, status)
	{
			data = JSON.parse(data);

			if (data.num_arch==0) {

				var formData = new FormData();
				var files = $('#image2')[0].files[0];
				formData.append('file',files);
				$.ajax({
					url: 'upload.php',
					type: 'post',
					data: formData,
					contentType: false,
					processData: false,
					success: function(response) {
						if (response != 0) {
							//alert(nombre_archivo);
							$.post("ajax/productos.php?op=update_img_producto",{
								nombre_archivo:nombre_archivo,
								idproducto:idproducto
							},function(data, status)
							{
								data = JSON.parse(data);
								listar_select_cat2();
								$("#img_producto").attr("src","../img/productos/"+nombre_archivo);

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

function abrir_detalle_prod(idproducto)
{
	document.getElementById("div_list_prod").style.display = "none";
	document.getElementById("div_detalle_prod").style.display = "block";

	$.post("ajax/productos.php?op=abrir_detalle_prod",{idproducto:idproducto},function(data, status)
	{
		data = JSON.parse(data);
		
		//$("#modal_det_prod").modal("show");
		$("#input_nombre").val(data.nombre);
		$("#idproducto").val(data.idproducto);
		$("#idcategoria").val(data.idcategoria);
		$("#descrip_breve").val(data.detalle_gen);
		$("#descrip_det").val(data.detalle);
		$("#precio_edit").val(data.precio);
		$("#txt_color").text(data.codigo_color);
		$("#orden_prod").val(data.orden);
		$("#cant_prod").val(data.cantidad);
		$("#txt_marca").text(data.nom_marca);
		$("#txt_categ").text(data.nom_categoria);

		if (data.dest==1) {
			$("#txt_dest").text("Si");
			$("#dest_temp"+idproducto).text('Destacado');
		}else{
			$("#txt_dest").text("");
			$("#dest_temp"+idproducto).text('');
		}

		document.getElementById("txt_color").style.backgroundColor = data.codigo_color;
		document.getElementById("txt_color").style.color = data.codigo_color;
		//alert(data.talla);
		if (data.talla!=null) {
			$("#txt_talla").text(data.talla);
			$("#txt_cant").text(data.cantidad);
			//$("#talla_temp"+idproducto).text(data.talla);
		}

		if (data.genero==1) {
			$("#txt_genero").text('Hombre');
			$("#gen_temp"+idproducto).text('Hombre');
		}else{
			$("#txt_genero").text('Mujer');
			$("#gen_temp"+idproducto).text('Mujer');
		}
		
		$("#img_producto").attr("src","../img/productos/"+data.imagen);

		$("#nom_temp"+idproducto).text(data.nombre);
		$("#det1_temp"+idproducto).text(data.detalle_gen);
		$("#det2_temp"+idproducto).text(data.detalle);
		$("#precio_temp"+idproducto).text('$ '+data.precio);
		$("#color_temp"+idproducto).text(data.codigo_color);
		$("#marca_temp"+idproducto).text(data.nom_marca);
		document.getElementById("color_temp"+idproducto).style.backgroundColor = data.codigo_color;
		document.getElementById("color_temp"+idproducto).style.color = data.codigo_color;

		listar_img_prod();
		listar_tallas_1();
		
	});

	
	
}

function regresar_a_lista()
{
	document.getElementById("div_list_prod").style.display = "block";
	document.getElementById("div_detalle_prod").style.display = "none";
}

function ver_form_img_new()
{
	document.getElementById("box_imagenes").style.display = "block";
	document.getElementById("box_imagenes_new").style.display = "block";
}

function ver_tallas()
{
	var idcategoria = $("#idcategoria").val();

	$.post("ajax/productos.php?op=listar_tallas&idcategoria="+idcategoria,function(r){
		$("#talla_edit").html(r);	
		
		document.getElementById("div_datos_talla").style.display = "block";
		
		$("#titulo_talla").text("EDITAR TALLA");
		$("#tipo_guardado").val("1");
		$("#id_act_talla").val("0");
										
	});
}

function ver_tallas2(idprod_talla)
{
	var idcategoria = $("#idcategoria").val();

	$.post("ajax/productos.php?op=listar_tallas&idcategoria="+idcategoria,function(r){
		$("#talla_edit").html(r);	
		
		document.getElementById("div_datos_talla").style.display = "block";
		
		$("#titulo_talla").text("EDITAR TALLA");
		$("#tipo_guardado").val("1");
		$("#id_act_talla").val(idprod_talla);
										
	});
}

function nueva_talla()
{
	var idcategoria = $("#idcategoria").val();
	$.post("ajax/productos.php?op=listar_tallas&idcategoria="+idcategoria,function(r){
		$("#talla_edit").html(r);	
		
		$("#titulo_talla").text("NUEVA TALLA");
		$("#tipo_guardado").val("2");
		document.getElementById("div_datos_talla").style.display = "block";
										
	});

}

function ver_colores()
{
	$.post("ajax/productos.php?op=listar_colores",function(r){
		$("#colores_edit").html(r);	
		document.getElementById("colores_edit").style.display = "block";										
	});
}

function ver_marca()
{
	$.post("ajax/productos.php?op=listar_marcas",function(r){
		$("#marca_edit").html(r);	
		document.getElementById("marca_edit").style.display = "block";										
	});
}

function ver_categorias()
{
	$.post("ajax/productos.php?op=listar_categorias",function(r){
		$("#id_categoria_select").html(r);	
		document.getElementById("id_categoria_select").style.display = "block";										
	});
}

function actualizar_categoria()
{
	var idproducto = $("#idproducto").val();
    var idcategoria = $("#id_categoria_select").val();
	//alert(genero_edit);
    $.post("ajax/productos.php?op=actualizar_categoria",{idcategoria:idcategoria,idproducto:idproducto},function(data, status)
	{
		data = JSON.parse(data);
		abrir_detalle_prod(idproducto);
		document.getElementById("id_categoria_select").style.display = "none";
	});	
}

function ver_generos()
{
	document.getElementById("genero_edit").style.display = "block";
}

function ver_dest()
{
	document.getElementById("dest_edit").style.display = "block";
}

function apartar(idproducto, precio, nombre, imagen, estatus, avance, precio_venta)
{
	//alert(avance+precio);
	if (estatus!=2) {

		bootbox.confirm('<label>Confirmar apartado de producto.</label><br><br><label>'+nombre+'</label><br><label>Precio:</label><input id="inp_precio_apartar" type="number" class="form-control" value="'+precio+'"><br><img src="../img/productos/'+imagen+'" style="width: 100%;">', function(result) {
			/* your callback code */ 

			if (result==true) {

				var precio_venta = $("#inp_precio_apartar").val();

				$.post("ajax/productos.php?op=apartar_prod",{idproducto:idproducto,precio_venta:precio_venta},function(data, status)
				{
					data = JSON.parse(data);

					bootbox.confirm('<label>Capturar avance de pago.</label><br><br><label>Monto:</label><input id="inp_monto_apartar" type="number" class="form-control" value="0"><label>Comentario:</label><input id="inp_coment_apartar" type="text" class="form-control">', function(result2) {
						/* your callback code */ 

						if (result2==true) {
							var abono = $("#inp_monto_apartar").val();
							var coment = $("#inp_coment_apartar").val();
							var fecha=moment().format('YYYY-MM-DD');
							var hora=moment().format('HH:mm:ss');
							var fecha_hora=fecha+" "+hora;

							$.post("ajax/productos.php?op=guardar_abono",{idproducto:idproducto,abono:abono,fecha_hora:fecha_hora,coment:coment},function(data, status)
							{
								data = JSON.parse(data);

								bootbox.alert("Producto apartado correctamente");
								listar_select_cat2();

							});
						}else{
							bootbox.alert("Producto apartado correctamente");
							listar_select_cat2();
						}
						

					});

				});
				
			}
		});
		
	}else{
		if (estatus==2) {

			bootbox.confirm('<label>Capturar avance de pago.</label><br><br><label>Monto:</label><input id="inp_monto_apartar" type="number" class="form-control" value="0"><label>Comentario:</label><input id="inp_coment_apartar" type="text" class="form-control">', function(result2) {
				/* your callback code */ 

				if (result2==true) {
					var abono = $("#inp_monto_apartar").val();
					var coment = $("#inp_coment_apartar").val();
					var fecha=moment().format('YYYY-MM-DD');
					var hora=moment().format('HH:mm:ss');
					var fecha_hora=fecha+" "+hora;

					var new_avance = parseFloat(avance)+parseFloat(abono);
					
					if (parseFloat(new_avance) < parseFloat(precio_venta)) {
						$.post("ajax/productos.php?op=guardar_abono",{idproducto:idproducto,abono:abono,fecha_hora:fecha_hora,coment:coment},function(data, status)
						{
							data = JSON.parse(data);
							bootbox.alert("Avance de pago registrado correctamente");
							listar_select_cat2();
						});
					}else{
						$.post("ajax/productos.php?op=guardar_abono_upd",{idproducto:idproducto,abono:abono,fecha_hora:fecha_hora,coment:coment},function(data, status)
						{
							data = JSON.parse(data);
							bootbox.alert("Producto pagado, estatus actualizado correctamente.");
							listar_select_cat2();
						});
					}

					
				}
				

			});
		}else{
			bootbox.alert("Error al procesar esta acción.");
		}
	}
	
	
}

function disponible(idproducto)
{
	bootbox.confirm('¿Desea mover este producto a la lista de disponibles?', function(result) {

		if (result==true) {
			$.post("ajax/productos.php?op=disponible",{idproducto:idproducto},function(data, status)
			{
				data = JSON.parse(data);

				bootbox.alert("Movido a la lista de productos disponibles");
				listar_select_cat2();

			});
		}
	
	});

	
}


function vender(idproducto, precio, nombre, imagen)
{
	var fecha=moment().format('YYYY-MM-DD');
	var hora=moment().format('HH:mm:ss');
	var fecha_hora=fecha+" "+hora;

	bootbox.confirm('<label>Confirmar venta de producto.</label><br><br><label>'+nombre+'</label><br><label>Precio:</label><input id="inp_precio_apartar" type="number" class="form-control" value="'+precio+'"><label>Comentario:</label><input id="inp_coment_apartar" type="text" class="form-control" value=""><br><img src="../img/productos/'+imagen+'" style="width: 100%;">', function(result) {
		/* your callback code */ 

		if (result==true) {

			var precio_venta = $("#inp_precio_apartar").val();
			var coment = $("#inp_coment_apartar").val();

			$.post("ajax/productos.php?op=venta_prod",{idproducto:idproducto,precio_venta:precio_venta,fecha_hora:fecha_hora,coment:coment},function(data, status)
			{
				data = JSON.parse(data);

				bootbox.alert("Registro de venta guardado exitosamente");
				listar_select_cat2();
			});
			
		}
	});
	
}

function ocultar(idproducto, visible)
{
	
			$.post("ajax/productos.php?op=ocultar",{idproducto:idproducto,visible:visible},function(data, status)
			{
				data = JSON.parse(data);

				var visible = data.visible;

				if (visible==1) {
					var vis = "Visible";
				}else{
					var vis = "Oculto";
				}

				$("#btn_visible"+idproducto).text(vis);

			});
}

function listar_img_prod()
{
	var idproducto = $("#idproducto").val();

	$.post("ajax/productos.php?op=listar_img_prod&idproducto="+idproducto,function(r){
		$("#box_imagenes").html(r);									
	});	
}

function set_primary(iddetalle_producto, idproducto, imagen)
{
	// alert(imagen);
	

			$.post("ajax/productos.php?op=set_primary",{iddetalle_producto:iddetalle_producto,idproducto:idproducto,imagen:imagen},function(data, status)
			{
				data = JSON.parse(data);

				listar_img_prod();

			});
}

function eliminar_imagen(iddetalle_producto,orden,imagen)
{
	
	if (orden==0) {
		$.post("ajax/productos.php?op=eliminar_imagen",{iddetalle_producto:iddetalle_producto,imagen:imagen},function(data, status)
		{
			data = JSON.parse(data);

			listar_img_prod();

		});
	}else{
		bootbox.alert("Asigne por favor otra imagen como principal, antes de eliminar esta imagen.")
	}
	
}

function listar_tallas_1()
{
	var idproducto = $("#idproducto").val();

	$.post("ajax/productos.php?op=listar_tallas_1&idproducto="+idproducto,function(r){
		$("#list_tallas").html(r);									
	});	
}

function eliminar_tallas(idprod_talla)
{
		$.post("ajax/productos.php?op=eliminar_tallas",{idprod_talla:idprod_talla},function(data, status)
		{
			data = JSON.parse(data);

			listar_tallas_1();

		});
}




init();