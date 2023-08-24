<?php
 	require "../config/Conexion.php";

 	Class Marca
 	{
 		public function __construct()
		{

		}

		public function listar_marca()
		{
            $sql="SELECT * FROM marcas ORDER BY nombre ASC";
			return ejecutarConsulta($sql);						
		}

        public function guardar_marca($nombre_marca)
		{
            $sql="INSERT INTO marcas (nombre, estatus) VALUES ('$nombre_marca','1')";
			return ejecutarConsulta($sql);						
		}

 	}

?>