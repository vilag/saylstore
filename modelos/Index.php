<?php

//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Index
{
	public function __construct()
	{

	}

	public function listar_prod_dest_()
	{

		$sql="SELECT 

		(SELECT nombre FROM productos WHERE dest=1) as nombre_cat1_1,
		(SELECT imagen FROM productos WHERE dest=1) as imagen_cat1_1
		
		FROM productos WHERE idcategoria=2 limit 1";
		return ejecutarConsultaSimpleFila($sql);			
	}

	public function listar_prod_dest()
	{

		$sql="SELECT * FROM productos WHERE idcategoria=2 AND dest>0";
		return ejecutarConsulta($sql);			
	}

	public function listar_categorias()
	{

		$sql="SELECT * FROM categorias";
		return ejecutarConsulta($sql);			
	}


}
?>

