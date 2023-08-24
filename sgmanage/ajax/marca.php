<?php
session_start(); 
require_once "../modelos/Marca.php";

$marca=new Marca();


switch ($_GET["op"]){

    case 'listar_marca':
 
        $rspta = $marca->listar_marca();

        while ($reg = $rspta->fetch_object())   
                {

                    echo '
                        <div style="width: 100%;">
                            <label>'.$reg->nombre.'</label>
                        </div>
                        
                        
                    ';
                }
       
    break;

    case 'guardar_marca':

        $nombre_marca = $_POST['nombre_marca'];

        $rspta=$marca->guardar_marca($nombre_marca);
        echo json_encode($rspta);

    break;
	
    
		
	
}
?>