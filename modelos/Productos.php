<?php

//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Productos
{
	public function __construct()
	{

	}


	public function listar_prod_tot()
	{
		$sql="SELECT * FROM productos WHERE estatus=1 AND visible=1";
		return ejecutarConsulta($sql);			
	}

	public function listar_prod_tot_marca($idmarca)
	{
		$sql="SELECT * FROM productos WHERE idmarca='$idmarca' AND estatus=1 AND visible=1";
		return ejecutarConsulta($sql);			
	}

	public function listar_prod_tot_cat($idcategoria)
	{
		$sql="SELECT * FROM productos WHERE idcategoria='$idcategoria' AND estatus=1 AND visible=1";
		return ejecutarConsulta($sql);			
	}

	public function listar_prod_tot_color($idcolor)
	{
		$sql="SELECT * FROM productos WHERE color='$idcolor' AND estatus=1 AND visible=1";
		return ejecutarConsulta($sql);			
	}

	public function listar_prod_tot_precio($precio)
	{
		if ($precio==1) {
			$sql="SELECT * FROM productos WHERE precio>0 AND estatus=1 AND visible=1";
			return ejecutarConsulta($sql);
		}

		if ($precio==2) {
			$sql="SELECT * FROM productos WHERE precio>0 AND precio<=100 AND estatus=1 AND visible=1";
			return ejecutarConsulta($sql);
		}

		if ($precio==3) {
			$sql="SELECT * FROM productos WHERE precio>100 AND precio<=500 AND estatus=1 AND visible=1";
			return ejecutarConsulta($sql);
		}

		if ($precio==4) {
			$sql="SELECT * FROM productos WHERE precio>500 AND precio<=1000 AND estatus=1 AND visible=1";
			return ejecutarConsulta($sql);
		}

		if ($precio==5) {
			$sql="SELECT * FROM productos WHERE precio>1000 AND precio<=2000 AND estatus=1 AND visible=1";
			return ejecutarConsulta($sql);
		}

		if ($precio==6) {
			$sql="SELECT * FROM productos WHERE precio>2000 AND estatus=1 AND visible=1";
			return ejecutarConsulta($sql);
		}
					
	}

	public function listar_prod_tot_orden($orden)
	{
		if ($orden==1) {
			$sql="SELECT * FROM productos WHERE estatus=1 AND visible=1";
			return ejecutarConsulta($sql);
		}

		if ($orden==2) {
			$sql="SELECT * FROM productos WHERE estatus=1 AND visible=1 ORDER BY precio ASC";
			return ejecutarConsulta($sql);
		}

		if ($orden==3) {
			$sql="SELECT * FROM productos WHERE estatus=1 AND visible=1 ORDER BY precio DESC";
			return ejecutarConsulta($sql);
		}

		
					
	}

	public function listar_categorias()
	{

		$sql="SELECT * FROM categorias";
		return ejecutarConsulta($sql);			
	}

	public function listar_colores()
	{

		$sql="SELECT * FROM colores";
		return ejecutarConsulta($sql);			
	}

	public function listar_marcas()
	{

		$sql="SELECT * FROM marcas";
		return ejecutarConsulta($sql);			
	}


}
?>

