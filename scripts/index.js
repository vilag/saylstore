function init()
{
    listar_prod_dest();
    listar_categorias();
    
}

function listar_prod_dest()
{

    $.post("ajax/index.php?op=listar_prod_dest",function(r){
    $("#box_prod_dest").html(r);
                       
    });


    
    // $.post("ajax/index.php?op=listar_prod_dest",function(data, status)
    // {
    // data = JSON.parse(data);

        
    //     $("#nombre_cat1_1").text(data.nombre_cat1_1);
    //     document.getElementById("cat1_2").style.display = "block";

    // });	

    
}

function listar_categorias()
{
    $.post("ajax/index.php?op=listar_categorias",function(r){
    $("#categ_box").html(r);
                           
    });
}

init();