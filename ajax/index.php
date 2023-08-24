<?php
require_once "../modelos/Index.php";

$index=new Index();

switch ($_GET["op"])
	{

        case 'listar_prod_dest_':
      
            $rspta=$index->listar_prod_dest();
            echo json_encode($rspta);
             
        break;

		case 'listar_prod_dest':		
			
		
			$rspta = $index->listar_prod_dest();
	
			while ($reg = $rspta->fetch_object())
					{

                        echo '
                        
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-pic hov-img0">
                                        <img src="sgmanage/uploads/productos/'.$reg->imagen.'" alt="IMG-PRODUCT">
            
                                        <a href="detalle_productos.php?idproducto='.$reg->idproducto.'" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                            Ver más
                                        </a>
                                    </div>
            
                                    <div class="block2-txt flex-w flex-t p-t-14">
                                        <div class="block2-txt-child1 flex-col-l ">
                                            <a href="detalle_productos.php?idproducto='.$reg->idproducto.'" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            '.$reg->nombre.'
                                            </a>
            
                                            <span class="stext-105 cl3">
                                             $ '.$reg->precio.'
                                            </span>
                                            <a href="detalle_productos.php?idproducto='.$reg->idproducto.'" style="background: black; color: white; padding: 5px 10px 5px 10px; border-radius: 8px; margin-top: 10px;">
                                                Ver más
                                            </a>
                                        </div>
            
                                        
                                    </div>
                                    
                                </div>
                                
                            </div>
                        
                        
                        ';
						
											
					}   
						
		break;

        case 'listar_categorias':
            
            // $idproducto = $_GET['idproducto'];
             $rspta = $index->listar_categorias();
             while ($reg = $rspta->fetch_object())
                     {
 
                         echo '
 

                            <div class="col-md-6 col-xl-3 p-b-30 m-lr-auto" >
                                <!-- Block1 -->
                                <div class="block1 wrap-pic-w" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.1); border-style: none;">
                                    <img src="images/categorias/'.$reg->imagen.'" alt="IMG-BANNER">

                                    <a href="productos.php?idcategoria='.$reg->idcategoria.'" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                                        <div class="block1-txt-child1 flex-col-l">
                                            

                                            <!-- <span class="block1-info stext-102 trans-04">
                                                Spring 2018
                                            </span> -->
                                        </div>

                                        <div class="block1-txt-child2 p-b-4 trans-05">
                                            <div class="block1-link stext-101 cl0 trans-09" style="font-family: Poppins-Bold !important; font-size: 28px;">
                                                '.$reg->nombre.'
                                            </div>
                                        </div>
                                    </a>
                                </div>
                               
                            </div>
                        
                         
                         ';
                         
                                             
                     }
                         
         break;



	}

?>