<?php
 	require "../config/Conexion.php";

 	Class Categorias
 	{
 		public function __construct()
		{

		}

		public function listar_categorias()
		{
            $sql="SELECT * FROM categorias ORDER BY orden ASC";
			return ejecutarConsulta($sql);						
		}

        public function guardar_categoria($nombre_categoria,$nombre_archivo,$color_categoria)
		{
            $sql="INSERT INTO categorias (nombre,imagen,color_eti) VALUES ('$nombre_categoria','$nombre_archivo','$color_categoria')";
			return ejecutarConsulta($sql);						
		}

        public function actualizar_orden($orden_categoria,$idcategoria)
		{
            $sql="UPDATE categorias SET orden='$orden_categoria' WHERE idcategoria='$idcategoria'";
			return ejecutarConsulta($sql);						
		}

		public function actualizar_nombre($input_categoria,$idcategoria)
		{
            $sql="UPDATE categorias SET nombre='$input_categoria' WHERE idcategoria='$idcategoria'";
			return ejecutarConsulta($sql);						
		}

		public function actualizar_color($input_color,$idcategoria)
		{
            $sql="UPDATE categorias SET color_eti='$input_color' WHERE idcategoria='$idcategoria'";
			return ejecutarConsulta($sql);						
		}

        public function borrar_cat($idcategoria)
		{
            $sql="DELETE FROM categorias WHERE idcategoria='$idcategoria'";
			return ejecutarConsulta($sql);						
		}

		public function consul_nom_arch($nombre_archivo)
		{
            $sql="SELECT count(idcategoria) as num_arch FROM categorias WHERE imagen='$nombre_archivo'";
			return ejecutarConsultaSimpleFila($sql);							
		}

		public function update_img_producto($nombre_archivo,$idcategoria)
		{
            $sql="UPDATE categorias SET imagen='$nombre_archivo' WHERE idcategoria='$idcategoria'";
			return ejecutarConsulta($sql);						
		}

 	}

?>