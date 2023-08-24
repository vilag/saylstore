function init()
{
    cargar_ventas();
}

function cargar_ventas()
{

            $.post("ajax/index.php?op=cargar_ventas",function(data, status)
			{
			data = JSON.parse(data);

                if (data.venta==null) {
                    var monto_venta = 0;
                }else{
                    var monto_venta = data.venta;
                }
                $("#ventas").text("$ "+monto_venta);




                $.post("ajax/index.php?op=cargar_avances",function(data, status)
			    {
			    data = JSON.parse(data);

                    if (data.avance==null) {
                        var monto_avance = 0;
                    }else{
                        var monto_avance = data.avance;
                    }
                     $("#av_apart").text("$ "+monto_avance);




                     $.post("ajax/index.php?op=cargar_por_cobrar",function(data, status)
                     {
                     data = JSON.parse(data);

                        if (data.total==null) {
                            var monto_total = 0;
                        }else{
                            var monto_total = data.total;
                        }

                        if (data.avance1==null) {
                            var monto_avance1 = 0;
                        }else{
                            var monto_avance1 = data.avance1;
                        }

                        var por_cobrar = parseFloat(monto_total)-parseFloat(monto_avance1)
     
                          $("#por_cobrar").text("$ "+por_cobrar);

                            $.post("ajax/index.php?op=en_inventario",function(data, status)
                            {
                            data = JSON.parse(data);

                                if (data.inventario==null) {
                                    var monto_inventario = 0;
                                }else{
                                    var monto_inventario = data.inventario;
                                }
                                $("#en_inventario").text("$ "+monto_inventario);           
                            });
     
                     });



                });	

			});	
}



init();