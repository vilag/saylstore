<?php
require_once "../modelos/Productos.php";

$productos=new Productos();

switch ($_GET["op"])
	{


        case 'listar_prod_tot':
            
           // $idproducto = $_GET['idproducto'];
			$rspta = $productos->listar_prod_tot();

			while ($reg = $rspta->fetch_object())
					{

                        echo '


                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="sgmanage/uploads/productos/'.$reg->imagen.'" alt="IMG-PRODUCT">

                                    
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

        case 'listar_prod_tot_cat':
            
             $idcategoria = $_GET['idcategoria'];
             $rspta = $productos->listar_prod_tot_cat($idcategoria);
 
             while ($reg = $rspta->fetch_object())
                     {
 
                         echo '
 
 
                         <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                             <!-- Block2 -->
                             <div class="block2">
                                 <div class="block2-pic hov-img0">
                                     <img src="sgmanage/uploads/productos/'.$reg->imagen.'" alt="IMG-PRODUCT">
 
                                     
                                     
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

        case 'listar_prod_tot_marca':
            
            $idmarca = $_GET['idmarca'];
            $rspta = $productos->listar_prod_tot_marca($idmarca);

            while ($reg = $rspta->fetch_object())
                    {

                        echo '


                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="sgmanage/uploads/productos/'.$reg->imagen.'" alt="IMG-PRODUCT">

                                    
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
        
        case 'listar_prod_tot_color':
            
            $idcolor = $_GET['idcolor'];
            $rspta = $productos->listar_prod_tot_color($idcolor);

            while ($reg = $rspta->fetch_object())
                    {

                        echo '


                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="sgmanage/uploads/productos/'.$reg->imagen.'" alt="IMG-PRODUCT">

                                    
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

        case 'listar_prod_tot_precio':
            
            $precio = $_GET['precio'];
            $rspta = $productos->listar_prod_tot_precio($precio);

            while ($reg = $rspta->fetch_object())
                    {

                        echo '


                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="sgmanage/uploads/productos/'.$reg->imagen.'" alt="IMG-PRODUCT">

                                    
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

        case 'listar_prod_tot_orden':
            
            $orden = $_GET['orden'];
            $rspta = $productos->listar_prod_tot_orden($orden);

            while ($reg = $rspta->fetch_object())
                    {

                        echo '


                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="sgmanage/uploads/productos/'.$reg->imagen.'" alt="IMG-PRODUCT">

                                    
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
             $rspta = $productos->listar_categorias();

                        echo '
                        
                            <a href="productos.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            
                                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                                    Todos los productos
                                </button>
                            
                            </a>
                        
                        ';
 
             while ($reg = $rspta->fetch_object())
                     {
 
                         echo '
 
                         

                            <a href="productos.php?idcategoria='.$reg->idcategoria.'&idmarca=0&idcolor=0&precio=0&orden=0" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            
                                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                                    '.$reg->nombre.'
                                </button>
                            
                            </a>
                        
                         
                         ';
                         
                                             
                     }
                         
         break;

         case 'listar_colores':
            
            // $idproducto = $_GET['idproducto'];
             $rspta = $productos->listar_colores();
 
             while ($reg = $rspta->fetch_object())
                     {
 
                         echo '
 
                                <li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: '.$reg->codigo.';">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="productos.php?idcategoria=0&idmarca=0&idcolor='.$reg->idcolor.'&precio=0&orden=0" class="filter-link stext-106 trans-04">
                                    '.$reg->nombre.'
									</a>
								</li>
                        
                         
                         ';
                         
                                             
                     }
                         
         break;

         case 'listar_marcas':
            
            // $idproducto = $_GET['idproducto'];
             $rspta = $productos->listar_marcas();
 
             while ($reg = $rspta->fetch_object())
                     {
 
                         echo '
 
                        <a href="productos.php?idcategoria=0&idmarca='.$reg->idmarca.'&idcolor=0&precio=0&orden=0" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                            '.$reg->nombre.'
                        </a>
                        
                         
                         ';
                         
                                             
                     }
                         
         break;



	}

?>