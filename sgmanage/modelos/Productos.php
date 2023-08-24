<?php
 	require "../config/Conexion.php";

 	Class Productos
 	{
 		public function __construct()
		{

		}

		public function listar_productos($idcategoria,$estatus)
		{
            $sql="SELECT a.idproducto, a.idcategoria, a.nombre, a.detalle_gen, a.detalle, a.genero, a.orden, a.precio, a.imagen, a.estatus, a.precio_venta, a.dest, a.visible,
			(SELECT sum(monto) FROM pagos_productos WHERE idproducto=a.idproducto) as avance,
			(SELECT detalle FROM tallas WHERE idtallas = a.talla) as talla,
			(SELECT codigo FROM colores WHERE idcolor = a.color) as codigo_color,
			(SELECT nombre FROM marcas WHERE idmarca = a.idmarca) as nom_marca
			FROM productos a WHERE a.idcategoria='$idcategoria' AND a.estatus='$estatus' ORDER BY a.dest DESC ,a.orden ASC";
			return ejecutarConsulta($sql);						
		}

        public function listar_select_cat()
		{
            $sql="SELECT * FROM categorias ORDER BY orden ASC";
			return ejecutarConsulta($sql);						
		}

		public function consul_nom_arch($nombre_archivo)
		{
            $sql="SELECT count(idproducto) as num_arch FROM productos WHERE imagen='$nombre_archivo'";
			return ejecutarConsultaSimpleFila($sql);							
		}

		public function guardar_producto($nombre_archivo,$select_categorias_n,$nombre_prod_n,$descrip_breve_n,$detalle_prod_n,$select_gen_n,$precio_prod_n)
		{
            $sql="INSERT INTO productos (idcategoria,nombre,detalle_gen,detalle,genero,precio,imagen) VALUES ('$select_categorias_n','$nombre_prod_n','$descrip_breve_n','$detalle_prod_n','$select_gen_n','$precio_prod_n','$nombre_archivo')";
			//return ejecutarConsulta($sql);
			$idingresonew=ejecutarConsulta_retornarID($sql);

			$sql_insert="INSERT INTO detalle_producto (idproducto, imagen) VALUES('$idingresonew','$nombre_archivo')";
			return ejecutarConsulta($sql_insert);						
		}

		public function actualizar_nombre($input_nombre,$idproducto)
		{
            $sql="UPDATE productos SET nombre='$input_nombre' WHERE idproducto='$idproducto'";
			return ejecutarConsulta($sql);						
		}

		public function actualizar_det_gen($descrip_breve,$idproducto)
		{
            $sql="UPDATE productos SET detalle_gen='$descrip_breve' WHERE idproducto='$idproducto'";
			return ejecutarConsulta($sql);						
		}

		public function actualizar_des_det($descrip_det,$idproducto)
		{
            $sql="UPDATE productos SET detalle='$descrip_det' WHERE idproducto='$idproducto'";
			return ejecutarConsulta($sql);						
		}

		public function actualizar_precio($precio_edit,$idproducto)
		{
            $sql="UPDATE productos SET precio='$precio_edit' WHERE idproducto='$idproducto'";
			return ejecutarConsulta($sql);						
		}

		public function actualizar_orden($orden_prod,$idproducto)
		{
            $sql="UPDATE productos SET orden='$orden_prod' WHERE idproducto='$idproducto'";
			return ejecutarConsulta($sql);						
		}

		public function actualizar_genero($genero_edit,$idproducto)
		{
            $sql="UPDATE productos SET genero='$genero_edit' WHERE idproducto='$idproducto'";
			return ejecutarConsulta($sql);						
		}

		public function actualizar_talla($talla_edit,$idproducto,$cant_prod,$id_act_talla)
		{

			if ($id_act_talla>0) {
				$sql="UPDATE prod_tallas SET talla='$talla_edit', cantidad='$cant_prod' WHERE idprod_talla='$id_act_talla'";
				return ejecutarConsulta($sql);
			}elseif ($id_act_talla==0) {
				$sql="UPDATE productos SET talla='$talla_edit', cantidad='$cant_prod' WHERE idproducto='$idproducto'";
				return ejecutarConsulta($sql);
			}
										
		}
		public function guardar_talla($talla_edit,$idproducto,$cant_prod)
		{
            $sql="INSERT INTO prod_tallas (idprod, talla, cantidad) VALUES ('$idproducto', '$talla_edit', '$cant_prod')";
			return ejecutarConsulta($sql);						
		}

		public function actualizar_colores($colores_edit,$idproducto)
		{
            $sql="UPDATE productos SET color='$colores_edit' WHERE idproducto='$idproducto'";
			return ejecutarConsulta($sql);						
		}

		public function actualizar_dest($dest_edit,$idproducto)
		{
            $sql="UPDATE productos SET dest='$dest_edit' WHERE idproducto='$idproducto'";
			return ejecutarConsulta($sql);						
		}

		public function actualizar_marca($marca_edit,$idproducto)
		{
            $sql="UPDATE productos SET idmarca='$marca_edit' WHERE idproducto='$idproducto'";
			return ejecutarConsulta($sql);						
		}

		public function borrar_prod($idproducto)
		{
            $sql="DELETE FROM productos WHERE idproducto='$idproducto'";
			return ejecutarConsulta($sql);						
		}

		public function update_img_producto($nombre_archivo,$idproducto)
		{
            $sql="UPDATE productos SET imagen='$nombre_archivo' WHERE idproducto='$idproducto'";
			return ejecutarConsulta($sql);						
		}

		public function abrir_detalle_prod($idproducto)
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
			a.cantidad,
			(SELECT detalle FROM tallas WHERE idtallas = a.talla) as talla,
			(SELECT codigo FROM colores WHERE idcolor = a.color) as codigo_color,
			(Select nombre FROM marcas WHERE idmarca = a.idmarca) as nom_marca,
			(Select nombre FROM categorias WHERE idcategoria = a.idcategoria) as nom_categoria
			FROM productos a WHERE idproducto='$idproducto'";
			return ejecutarConsultaSimpleFila($sql);						
		}

		public function apartar_prod($idproducto,$precio_venta)
		{
            $sql="UPDATE productos SET estatus=2, precio_venta='$precio_venta' WHERE idproducto='$idproducto'";
			return ejecutarConsulta($sql);						
		}

		public function guardar_abono($idproducto,$abono,$fecha_hora,$coment)
		{
            $sql="INSERT INTO pagos_productos (idproducto, monto, fecha, comentario) VALUES('$idproducto','$abono','$fecha_hora','$coment')";
			return ejecutarConsulta($sql);						
		}

		public function guardar_abono_upd($idproducto,$abono,$fecha_hora,$coment)
		{
            $sql="INSERT INTO pagos_productos (idproducto, monto, fecha, comentario) VALUES('$idproducto','$abono','$fecha_hora','$coment')";
			ejecutarConsulta($sql);
			
			$sql_1="UPDATE productos SET estatus=3 WHERE idproducto='$idproducto'";
			return ejecutarConsulta($sql_1);
		}

		public function disponible($idproducto)
		{
            $sql="UPDATE productos SET estatus=1 WHERE idproducto='$idproducto'";
			return ejecutarConsulta($sql);						
		}

		public function venta_prod($idproducto,$precio_venta,$fecha_hora,$coment)
		{
            $sql="UPDATE productos SET estatus=3, precio_venta='$precio_venta' WHERE idproducto='$idproducto'";
			ejecutarConsulta($sql);	
			
			$sql2="INSERT INTO pagos_productos (idproducto, monto, fecha, comentario) VALUES('$idproducto','$precio_venta','$fecha_hora','$coment')";
			return ejecutarConsulta($sql2);
		}

		public function listar_tallas($idcategoria)
		{
            $sql="SELECT * FROM tallas WHERE idformato = (SELECT tipo_talla FROM categorias WHERE idcategoria='$idcategoria')";
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

		public function listar_img_prod($idproducto)
		{
            $sql="SELECT * FROM detalle_producto WHERE idproducto='$idproducto'";
			return ejecutarConsulta($sql);						
		}

		public function actualizar_nombre2($idproducto)
		{
            $sql="UPDATE detalle_producto SET idproducto='$idproducto' WHERE idproducto=0";
			return ejecutarConsulta($sql);						
		}

		public function set_primary($iddetalle_producto,$idproducto,$imagen)
		{
			$sql="UPDATE detalle_producto SET orden='0' WHERE idproducto='$idproducto'";
			ejecutarConsulta($sql);

			$sql_1="UPDATE productos SET imagen='$imagen' WHERE idproducto='$idproducto'";
			ejecutarConsulta($sql_1);

            $sql_2="UPDATE detalle_producto SET orden='1' WHERE iddetalle_producto='$iddetalle_producto'";
			return ejecutarConsulta($sql_2);						
		}

		public function eliminar_imagen($iddetalle_producto)
		{
            $sql="DELETE FROM detalle_producto WHERE iddetalle_producto='$iddetalle_producto'";
			return ejecutarConsulta($sql);						
		}

		public function listar_tallas_1($idproducto)
		{
            $sql="SELECT

			a.idprod_talla,
			a.talla,
			a.cantidad,
			(SELECT detalle FROM tallas WHERE idtallas=a.talla) as det_talla
			
			FROM prod_tallas a WHERE idprod='$idproducto'";
			return ejecutarConsulta($sql);						
		}

		public function eliminar_tallas($idprod_talla)
		{
            $sql="DELETE FROM prod_tallas WHERE idprod_talla='$idprod_talla'";
			return ejecutarConsulta($sql);						
		}

		public function listar_categorias()
		{
            $sql="SELECT * FROM categorias";
			return ejecutarConsulta($sql);						
		}

		public function actualizar_categoria($idcategoria,$idproducto)
		{
            $sql="UPDATE productos SET idcategoria='$idcategoria' WHERE idproducto='$idproducto'";
			return ejecutarConsulta($sql);						
		}

		public function ocultar($idproducto,$visible)
		{
			if ($visible==1) {
				$sql="UPDATE productos SET visible='0' WHERE idproducto='$idproducto'";
				ejecutarConsulta($sql);
			}elseif ($visible==0) {
				$sql="UPDATE productos SET visible='1' WHERE idproducto='$idproducto'";
				ejecutarConsulta($sql);
			}
			
			$sql="SELECT * FROM productos WHERE idproducto='$idproducto'";
			return ejecutarConsultaSimpleFila($sql);							
		}


 	}

?>