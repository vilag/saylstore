<?php
session_start(); 
require_once "../modelos/Index.php";

$index=new Index();


switch ($_GET["op"]){
	
    case 'cargar_ventas':

        $rspta=$index->cargar_ventas();
        echo json_encode($rspta);

    break;

    case 'cargar_avances':
        $rspta=$index->cargar_avances();
        echo json_encode($rspta);
    break;

    case 'cargar_por_cobrar':
        $rspta=$index->cargar_por_cobrar();
        echo json_encode($rspta);
    break;

	case 'en_inventario':
        $rspta=$index->en_inventario();
        echo json_encode($rspta);
    break;	
	
}
?>