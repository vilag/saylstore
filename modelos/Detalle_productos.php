<?php

//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Detalle_productos
{
	public function __construct()
	{

	}


	public function datos_prod($idproducto)
	{

		$sql="SELECT 

		a.idproducto,
		a.idcategoria,
		a.nombre,
		a.detalle_gen,
		a.detalle,
		a.genero,
		a.orden,
		a.precio,
		a.imagen,
		a.estatus,
		a.precio_venta,
		a.dest,
		a.talla,
		a.color,
		a.cantidad,
		(SELECT detalle FROM tallas WHERE idtallas = a.talla) as det_talla,
		(SELECT nombre FROM categorias WHERE idcategoria=a.idcategoria) as det_cat
		
		FROM productos a WHERE a.idproducto='$idproducto'";
		return ejecutarConsultaSimpleFila($sql);			
	}

	public function listar_tallas($idproducto)
	{

		$sql="SELECT
		a.idprod_talla,
		a.idprod,
		a.talla as talla_1,
		a.cantidad,
		(SELECT detalle FROM tallas WHERE idtallas = a.talla) as det_talla_1	
		FROM prod_tallas a WHERE a.idprod='$idproducto' ORDER BY (SELECT detalle FROM tallas WHERE idtallas = a.talla) ASC";
		return ejecutarConsulta($sql);			
	}

	public function listar_fotos($idproducto)
	{

		$sql="SELECT * FROM detalle_producto WHERE idproducto='$idproducto' ORDER BY orden DESC";
		return ejecutarConsulta($sql);			
	}

	


}
?>

