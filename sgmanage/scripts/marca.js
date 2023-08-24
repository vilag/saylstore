function init()
{
    listar_marca();
}

function listar_marca()
{
	$.post("ajax/marca.php?op=listar_marca",function(r){
		$("#tbl_marcas").html(r);									
	});	
}

function guardar_marca()
{
    var nombre_marca = $("#nombre_marca").val();
            $.post("ajax/marca.php?op=guardar_marca",{nombre_marca:nombre_marca},function(data, status)
			{
				data = JSON.parse(data);

				listar_marca();

			});
}

init();