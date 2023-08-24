function init()
{
    var idcategoria_get = $("#idcategoria_get").text();
    var idmarca_get = $("#idmarca_get").text();
    var idcolor_get = $("#idcolor_get").text();
    var precio = $("#precio_get").text();
    var orden = $("#orden_get").text();
    // alert(idcategoria_get);
    // alert(idmarca_get);
    if (idcategoria_get>0) {
        listar_prod_tot_cat();
    }else{
        if (idmarca_get>0) {
            listar_prod_tot_marca();
        }else{
            if (idcolor_get>0) {
                listar_prod_tot_color();
            }else{
                if (precio>0) {
                    //alert(precio);
                    listar_prod_tot_precio();
                }else{
                    if (orden>0) {
                        listar_prod_tot_orden();
                    }else{
                        listar_prod_tot();
                    }

                }
                
            }
            
        }
        
    }

    listar_categorias();
    listar_colores();
    listar_marcas();

}

function listar_prod_tot()
{

    $.post("ajax/productos.php?op=listar_prod_tot",function(r){
    $("#box_prod_tot").html(r);
                       
    });

}

function listar_prod_tot_cat()
{
    var idcategoria_get = $("#idcategoria_get").text();

        $.post("ajax/productos.php?op=listar_prod_tot_cat&idcategoria="+idcategoria_get,function(r){
        $("#box_prod_tot").html(r);
                           
        });
}

function listar_prod_tot_marca()
{
    var idmarca_get = $("#idmarca_get").text();

        $.post("ajax/productos.php?op=listar_prod_tot_marca&idmarca="+idmarca_get,function(r){
        $("#box_prod_tot").html(r);
                           
        });
}

function listar_prod_tot_color()
{
    var idcolor_get = $("#idcolor_get").text();

        $.post("ajax/productos.php?op=listar_prod_tot_color&idcolor="+idcolor_get,function(r){
        $("#box_prod_tot").html(r);
                           
        });
}

function listar_prod_tot_precio()
{
    var precio = $("#precio_get").text();

    //alert(precio);

        $.post("ajax/productos.php?op=listar_prod_tot_precio&precio="+precio,function(r){
        $("#box_prod_tot").html(r);
                           
        });
}

function listar_prod_tot_orden()
{
    var orden = $("#orden_get").text();

    //alert(precio);

        $.post("ajax/productos.php?op=listar_prod_tot_orden&orden="+orden,function(r){
        $("#box_prod_tot").html(r);
                           
        });
}


function listar_categorias()
{
    $.post("ajax/productos.php?op=listar_categorias",function(r){
    $("#box_categorias").html(r);
                           
    });
}

function listar_colores()
{
    $.post("ajax/productos.php?op=listar_colores",function(r){
    $("#listar_colores").html(r);
                           
    });
}

function listar_marcas()
{
    $.post("ajax/productos.php?op=listar_marcas",function(r){
    $("#box_marcas").html(r);
                               
    });
}

function listar_precio1()
{
    var rango = 1;
    $("#precio1").attr("href","productos.php?idcategoria=0&idmarca=0&idcolor=0&precio="+rango+"&orden=0");
}

function listar_precio2()
{
    var rango = 2;
    $("#precio2").attr("href","productos.php?idcategoria=0&idmarca=0&idcolor=0&precio="+rango+"&orden=0");
}

function listar_precio3()
{
    var rango = 3;
    $("#precio3").attr("href","productos.php?idcategoria=0&idmarca=0&idcolor=0&precio="+rango+"&orden=0");
}

function listar_precio4()
{
    var rango = 4;
    $("#precio4").attr("href","productos.php?idcategoria=0&idmarca=0&idcolor=0&precio="+rango+"&orden=0");
}

function listar_precio5()
{
    var rango = 5;
    $("#precio5").attr("href","productos.php?idcategoria=0&idmarca=0&idcolor=0&precio="+rango+"&orden=0");
}

function listar_precio6()
{
    var rango = 6;
    $("#precio6").attr("href","productos.php?idcategoria=0&idmarca=0&idcolor=0&precio="+rango+"&orden=0");
}

function listar_orden1()
{
    var orden = 1;
    $("#orden1").attr("href","productos.php?idcategoria=0&idmarca=0&idcolor=0&precio=0&orden="+orden);
}

function listar_orden2()
{
    var orden = 2;
    $("#orden2").attr("href","productos.php?idcategoria=0&idmarca=0&idcolor=0&precio=0&orden="+orden);
}

function listar_orden3()
{
    var orden = 3;
    $("#orden3").attr("href","productos.php?idcategoria=0&idmarca=0&idcolor=0&precio=0&orden="+orden);
}

init();