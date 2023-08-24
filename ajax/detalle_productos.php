<?php
require_once "../modelos/Detalle_productos.php";

$detalle_productos=new Detalle_productos();

switch ($_GET["op"])
	{

        case 'datos_prod':

            $idproducto = $_POST['idproducto'];
      
            $rspta=$detalle_productos->datos_prod($idproducto);
            echo json_encode($rspta);
             
        break;

		

        case 'listar_tallas':
            
            $idproducto = $_GET['idproducto'];
            $talla = $_GET['talla'];
            $det_talla = $_GET['det_talla'];
			
		
			$rspta = $detalle_productos->listar_tallas($idproducto);

                        echo '
                            
                            <option value="'.$talla.'">'.$det_talla.'</option>
                        ';
	
			while ($reg = $rspta->fetch_object())
					{

                        echo '
                        
                            <option value="'.$reg->talla_1.'">'.$reg->det_talla_1.'</option>
                        
                        ';
						
											
					}
						
		break;

        case 'listar_fotos':
            
            $idproducto = $_GET['idproducto'];
			$rspta = $detalle_productos->listar_fotos($idproducto);

			while ($reg = $rspta->fetch_object())
					{

                        echo '


                        <li role="presentation" onclick="change_img_princ('.$reg->iddetalle_producto.',\''.$reg->imagen.'\');">
								<img src="sgmanage/uploads/productos/'.$reg->imagen.'">
								<div class="slick3-dot-overlay"></div>
						</li>
                        
                        ';
						
											
					}
						
		break;



	}

?>