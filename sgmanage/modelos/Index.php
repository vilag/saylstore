<?php
 	require "../config/Conexion.php";

 	Class Index
 	{
 		public function __construct()
		{

		}

		public function cargar_ventas()
		{   
            $sql="SELECT sum(b.monto) as venta FROM productos a INNER JOIN pagos_productos b ON a.idproducto=b.idproducto WHERE a.estatus=3";
			return ejecutarConsultaSimpleFila($sql);						
		}

        public function cargar_avances()
		{   
            $sql="SELECT sum(b.monto) as avance FROM productos a INNER JOIN pagos_productos b ON a.idproducto=b.idproducto WHERE a.estatus=2";
			return ejecutarConsultaSimpleFila($sql);						
		}

        public function cargar_por_cobrar()
		{   
            $sql="SELECT sum(b.monto) as avance1, 
            (SELECT sum(precio_venta) as total FROM productos WHERE estatus=2) as total
            
            FROM productos a INNER JOIN pagos_productos b ON a.idproducto=b.idproducto WHERE a.estatus=2";
			return ejecutarConsultaSimpleFila($sql);						
		}

        public function en_inventario()
		{   
            $sql="SELECT sum(precio) as inventario FROM productos WHERE estatus=1";
			return ejecutarConsultaSimpleFila($sql);						
		}

 	}

?>