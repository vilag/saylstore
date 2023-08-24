function init()
{
    var idproducto = $("#idproducto").text();

            $.post("ajax/detalle_productos.php?op=datos_prod",{idproducto:idproducto},function(data, status)
			{
				data = JSON.parse(data);

				var nombre = data.nombre;
                var precio = data.precio;
                var detalle_gen = data.detalle_gen;
                var detalle = data.detalle;
                var talla = data.talla;
                var det_talla = data.det_talla;
                var det_cat = data.det_cat;
                //alert(nombre);
                $("#span_prod").text(nombre);
                $("#h_nom_prod").text(nombre);
                $("#span_precio").text("$ "+precio);
                $("#p_descrip1").text(detalle_gen);
                $("#p_descrip2").text(detalle);
                //$("#descrip_p_1").text(detalle);
                $("#txt_cat").text(det_cat);
                $("#txt_sku").text("SKU: "+idproducto);
                $("#nom_categoria").text("Categoria: "+det_cat);

                document.getElementById("img_princ").src = "sgmanage/uploads/productos/"+data.imagen;
               // $("#img_slick").attr("data-thumb","sgmanage/uploads/productos/"+data.imagen);
                $("#a_img").attr("href","sgmanage/uploads/productos/"+data.imagen);

                    $.post("ajax/detalle_productos.php?op=listar_tallas&idproducto="+idproducto+"&talla="+talla+"&det_talla="+det_talla,function(r){
                    $("#select_tallas").html(r);

                        s=document.querySelector("#select_tallas");
                        Array.from(s.options).sort(
                            (a,b) => a.text.toLowerCase() > b.text.toLowerCase() ? 1: -1
                        ).forEach(
                            el => s.add(el)
                        );


                            $.post("ajax/detalle_productos.php?op=listar_fotos&idproducto="+idproducto,function(r){
                            $("#div_galeria").html(r);
        
                                
                                               
                            });
                                       
                    });

			});
}

function change_img_princ(iddetalle_producto,imagen)
{
    document.getElementById("img_princ").src = "sgmanage/uploads/productos/"+imagen;
}

function buscar_cant()
{
    var select_tallas = $("#select_tallas").val();
    //alert(select_tallas);
}

function mns_whatsapp()
{
    var idproducto = $("#idproducto").text();
    $("#enviar_mensaje").attr("href","https://api.whatsapp.com/send?phone=3332550900&text=Hola, me gusto éste producto: https://saylstore.com/detalle_productos.php?idproducto="+idproducto);
}





init();