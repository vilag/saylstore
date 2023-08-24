<?php
session_start(); 
require_once "../modelos/Productos.php";

$productos=new Productos();


switch ($_GET["op"]){

    
	
    case 'listar_productos':

        $idcategoria = $_GET['idcategoria'];
        $estatus = $_GET['estatus'];

        $rspta = $productos->listar_productos($idcategoria,$estatus);
                   
        while ($reg = $rspta->fetch_object())
                {
                   if ($reg->genero==2) {
                    $genero = "Mujer";
                   
                   }elseif ($reg->genero==1) {
                    $genero = "Hombre";
                    
                   }

                   

                  if ($reg->estatus==1) {
                    $disab_disp = "disabled";
                    $disab_apart = "";
                    $disab_vender = "";
                    $disp = "none;";
                  }
                  if ($reg->estatus==2) {
                    $disab_disp = "";
                    $disab_apart = "";
                    $disab_vender = "";
                    $disp = "block;";
                  }
                  if ($reg->estatus==3) {
                    $disab_disp = "";
                    $disab_apart = "";
                    $disab_vender = "disabled";
                    $disp = "block;";
                  }

                  if ($reg->genero==2){
                    $gen = "Mujer";
                  }else{
                    $gen = "Hombre";
                  }

                  if ($reg->dest==1){
                    $dest = "Destacado";
                  }else{
                    $dest = "";
                  }

                  if ($reg->visible==1) {
                    $visible = "Visible";
                  }elseif ($reg->visible==0) {
                    $visible = "Oculto";
                  }

                   echo '
                           

                        <div class="col-lg-12 col-md-12 col-sm-12 estilo_prod">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="col-lg-10 col-md-10 col-sm-12" style="padding-top: 10px; padding-buttom: 10px; float: left;">
                                    <b>'.$reg->idproducto.'</b>&nbsp;-&nbsp;<b id="nom_temp'.$reg->idproducto.'">'.$reg->nombre.'</b><br>
                                    <label id="det1_temp'.$reg->idproducto.'">'.$reg->detalle_gen.'</label><br>
                                    <label id="det2_temp'.$reg->idproducto.'">'.$reg->detalle.'</label>
                                    <b style="display: '.$disp.'">Precio de venta: $ '.$reg->precio_venta.'</b>
                                    <b style="display: '.$disp.'">Avance de pago: $ '.$reg->avance.'</b>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12" style="padding-top: 10px; padding-buttom: 10px; text-align: right; float: left;">
                                        <img src="uploads/productos/'.$reg->imagen.'" alt="" style="width:80px; height: 100px; box-sizing: content-box;"> 
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="col-lg-2 col-md-2 col-sm-12" style="padding-top: 10px; float: left;">
                                        Genero: <b id="gen_temp'.$reg->idproducto.'">'.$gen.'</b>
                                           
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12" style="padding-top: 10px; float: left;">
                                        Marca: <b id="marca_temp'.$reg->idproducto.'">'.$reg->nom_marca.'</b>                          
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12" style="padding-top: 10px; center; float: left;">
                                        <label>Color:</label>&nbsp;<b id="color_temp'.$reg->idproducto.'" style="color:'.$reg->codigo_color.'; background-color: '.$reg->codigo_color.';">'.$reg->codigo_color.'</b>   
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12" style="padding-top: 10px; padding-buttom: 10px;  float: left;">
                                    <button type="button" class="btn" onclick="abrir_detalle_prod('.$reg->idproducto.');"><div class="icon dripicons-document-edit"></div></button>    
                                    <button type="button" class="btn" onclick="disponible('.$reg->idproducto.');" '.$disab_disp.'><div class="icon dripicons-arrow-thin-left"></div></button>
                                    <button type="button" class="btn" onclick="apartar('.$reg->idproducto.',\''.$reg->precio.'\',\''.$reg->nombre.'\',\''.$reg->imagen.'\',\''.$reg->estatus.'\',\''.$reg->avance.'\',\''.$reg->precio_venta.'\');" '.$disab_apart.'><div class="icon dripicons-enter"></div></button> 
                                    <button type="button" class="btn" onclick="vender('.$reg->idproducto.',\''.$reg->precio.'\',\''.$reg->nombre.'\',\''.$reg->imagen.'\');" '.$disab_vender.'><div class="icon dripicons-checkmark"></div></button>
                                    <button type="button" class="btn" onclick="ocultar('.$reg->idproducto.',\''.$reg->visible.'\');" id="btn_visible'.$reg->idproducto.'">'.$visible.'</button>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-12" style="padding-top: 10px; padding-buttom: 10px; float: left;">
                                    <b style="font-size: 14px;" id="dest_temp'.$reg->idproducto.'">'.$dest.'</b>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-12" style="padding-top: 10px; padding-buttom: 10px; float: left; text-align: right;">
                                    <b style="font-size: 20px;" id="precio_temp'.$reg->idproducto.'">$ '.$reg->precio.'</b>
                                </div>
                                
                            </div>
                        </div>
                    ';

                   

                   
                }
                              
    break;

    case 'listar_select_cat':

        $rspta = $productos->listar_select_cat();
        while ($reg = $rspta->fetch_object())
                {
                    echo '
                        <option value="'.$reg->idcategoria.'">'.$reg->nombre.'</option>
                    ';
                }
       
    break;

    case 'consul_nom_arch':

        $nombre_archivo = $_POST['nombre_archivo'];

        $rspta=$productos->consul_nom_arch($nombre_archivo);
        echo json_encode($rspta);

    break;

    case 'guardar_producto':

        $nombre_archivo = $_POST['nombre_archivo'];
        $select_categorias_n = $_POST['select_categorias_n'];
        $nombre_prod_n = $_POST['nombre_prod_n'];
        $descrip_breve_n = $_POST['descrip_breve_n'];
        $detalle_prod_n = $_POST['detalle_prod_n'];
        $select_gen_n = $_POST['select_gen_n'];
        $precio_prod_n = $_POST['precio_prod_n'];

        $rspta=$productos->guardar_producto($nombre_archivo,$select_categorias_n,$nombre_prod_n,$descrip_breve_n,$detalle_prod_n,$select_gen_n,$precio_prod_n);
        echo json_encode($rspta);

    break;

    case 'actualizar_nombre':

        $input_nombre = $_POST['input_nombre'];
        $idproducto = $_POST['idproducto'];

        $rspta=$productos->actualizar_nombre($input_nombre,$idproducto);
        echo json_encode($rspta);

    break;

    case 'actualizar_det_gen':

        $descrip_breve = $_POST['descrip_breve'];
        $idproducto = $_POST['idproducto'];

        $rspta=$productos->actualizar_det_gen($descrip_breve,$idproducto);
        echo json_encode($rspta);

    break;

    case 'actualizar_des_det':

        $descrip_det = $_POST['descrip_det'];
        $idproducto = $_POST['idproducto'];

        $rspta=$productos->actualizar_des_det($descrip_det,$idproducto);
        echo json_encode($rspta);

    break;

    case 'actualizar_precio':

        $precio_edit = $_POST['precio_edit'];
        $idproducto = $_POST['idproducto'];

        $rspta=$productos->actualizar_precio($precio_edit,$idproducto);
        echo json_encode($rspta);

    break;

    case 'actualizar_orden':

        $orden_prod = $_POST['orden_prod'];
        $idproducto = $_POST['idproducto'];

        $rspta=$productos->actualizar_orden($orden_prod,$idproducto);
        echo json_encode($rspta);

    break;

    case 'actualizar_genero':

        $genero_edit = $_POST['genero_edit'];
        $idproducto = $_POST['idproducto'];

        $rspta=$productos->actualizar_genero($genero_edit,$idproducto);
        echo json_encode($rspta);

    break;

    case 'actualizar_talla':

        $talla_edit = $_POST['talla_edit'];
        $idproducto = $_POST['idproducto'];
        $cant_prod = $_POST['cant_prod'];
        $id_act_talla = $_POST['id_act_talla'];

        $rspta=$productos->actualizar_talla($talla_edit,$idproducto,$cant_prod,$id_act_talla);
        echo json_encode($rspta);

    break;

    case 'guardar_talla':

        $talla_edit = $_POST['talla_edit'];
        $idproducto = $_POST['idproducto'];
        $cant_prod = $_POST['cant_prod'];

        $rspta=$productos->guardar_talla($talla_edit,$idproducto,$cant_prod);
        echo json_encode($rspta);

    break;

    case 'actualizar_colores':

        $colores_edit = $_POST['colores_edit'];
        $idproducto = $_POST['idproducto'];

        $rspta=$productos->actualizar_colores($colores_edit,$idproducto);
        echo json_encode($rspta);

    break;

    case 'actualizar_dest':

        $dest_edit = $_POST['dest_edit'];
        $idproducto = $_POST['idproducto'];

        $rspta=$productos->actualizar_dest($dest_edit,$idproducto);
        echo json_encode($rspta);

    break;

    case 'actualizar_marca':

        $marca_edit = $_POST['marca_edit'];
        $idproducto = $_POST['idproducto'];

        $rspta=$productos->actualizar_marca($marca_edit,$idproducto);
        echo json_encode($rspta);

    break;

    case 'borrar_prod':
        $idproducto = $_POST['idproducto'];

        $rspta=$productos->borrar_prod($idproducto);
        echo json_encode($rspta);

    break;

    case 'update_img_producto':

        $nombre_archivo = $_POST['nombre_archivo'];
        $idproducto = $_POST['idproducto'];

        $rspta=$productos->update_img_producto($nombre_archivo,$idproducto);
        echo json_encode($rspta);

    break;

    case 'abrir_detalle_prod':

        $idproducto = $_POST['idproducto'];

        $rspta=$productos->abrir_detalle_prod($idproducto);
        echo json_encode($rspta);

    break;

    case 'apartar_prod':

        $idproducto = $_POST['idproducto'];
        $precio_venta = $_POST['precio_venta'];

        $rspta=$productos->apartar_prod($idproducto,$precio_venta);
        echo json_encode($rspta);

    break;

    case 'guardar_abono':

        $idproducto = $_POST['idproducto'];
        $abono = $_POST['abono'];
        $fecha_hora = $_POST['fecha_hora'];
        $coment = $_POST['coment'];

        $rspta=$productos->guardar_abono($idproducto,$abono,$fecha_hora,$coment);
        echo json_encode($rspta);

    break;

    case 'guardar_abono_upd':

        $idproducto = $_POST['idproducto'];
        $abono = $_POST['abono'];
        $fecha_hora = $_POST['fecha_hora'];
        $coment = $_POST['coment'];

        $rspta=$productos->guardar_abono_upd($idproducto,$abono,$fecha_hora,$coment);
        echo json_encode($rspta);

    break;

    case 'disponible':

        $idproducto = $_POST['idproducto'];

        $rspta=$productos->disponible($idproducto);
        echo json_encode($rspta);

    break;

    case 'venta_prod':

        $idproducto = $_POST['idproducto'];
        $precio_venta = $_POST['precio_venta'];
        $fecha_hora = $_POST['fecha_hora'];
        $coment = $_POST['coment'];

        $rspta=$productos->venta_prod($idproducto,$precio_venta,$fecha_hora,$coment);
        echo json_encode($rspta);

    break;

    case 'listar_tallas':
        $idcategoria = $_GET['idcategoria'];
        $rspta = $productos->listar_tallas($idcategoria);
                        echo '
                        <option value="">Seleccionar</option>
                        ';
        while ($reg = $rspta->fetch_object())
                {
                    echo '
                        <option value="'.$reg->idtallas.'">'.$reg->detalle.'</option>
                    ';
                }
       
    break;

    case 'listar_colores':

        $rspta = $productos->listar_colores();
        echo '
        <option value="">Seleccionar</option>
        ';
        while ($reg = $rspta->fetch_object())
                {
                    echo '
                        <option style="background-color:'.$reg->codigo.'; color:'.$reg->codigo.';" value="'.$reg->idcolor.'">'.$reg->nombre.'</option>
                    ';
                }
       
    break;

    case 'listar_marcas':

        $rspta = $productos->listar_marcas();
        echo '
        <option value="">Seleccionar</option>
        <option value="0">Ninguno</option>
        
        ';
        while ($reg = $rspta->fetch_object())
                {
                    echo '
                        <option value="'.$reg->idmarca.'">'.$reg->nombre.'</option>
                    ';
                }
       
    break;

    case 'listar_img_prod':
        $idproducto = $_GET['idproducto'];
        $rspta = $productos->listar_img_prod($idproducto);
        while ($reg = $rspta->fetch_object())   
                {

                    if($reg->orden==1){
                        $estilo = 'border: black 5px solid;';
                    }else {
                        $estilo = '';
                    }

                    echo '
                        <div style="width: 80px; height: 100px; float: left; margin: 10px;" onclick="set_primary('.$reg->iddetalle_producto.',\''.$reg->idproducto.'\',\''.$reg->imagen.'\');">
                            <div style="width: 100%; '.$estilo.'">
                                <img id="img_producto" src="uploads/productos/'.$reg->imagen.'" alt="" style="width: 100%;">
                                <input type="hidden" value="'.$reg->imagen.'">
                            </div>
                            <div style="width: 100%;">
                                <button type="button" class="btn" onclick="eliminar_imagen('.$reg->iddetalle_producto.',\''.$reg->orden.'\',\''.$reg->imagen.'\');">Eliminar</button>
                            </div>
                        </div>
                        
                        
                    ';
                }
       
    break;

    case 'actualizar_nombre2':

        $idproducto = $_POST['idproducto'];

        $rspta=$productos->actualizar_nombre2($idproducto);
        echo json_encode($rspta);

    break;

    case 'set_primary':

        $iddetalle_producto = $_POST['iddetalle_producto'];
        $idproducto = $_POST['idproducto'];
        $imagen = $_POST['imagen'];

        $rspta=$productos->set_primary($iddetalle_producto,$idproducto,$imagen);
        echo json_encode($rspta);

    break;

    case 'eliminar_imagen':

        $iddetalle_producto = $_POST['iddetalle_producto'];
        $imagen = $_POST['imagen'];

        unlink(__DIR__ ."../uploads/".$imagen);

        $rspta=$productos->eliminar_imagen($iddetalle_producto);
        echo json_encode($rspta);

    break;

    case 'listar_tallas_1':

        $idproducto = $_GET['idproducto'];

        $rspta = $productos->listar_tallas_1($idproducto);

        while ($reg = $rspta->fetch_object())
                {
                    echo '
                        <b>Talla:</b>&nbsp;<b id="txt_talla">'.$reg->det_talla.'</b>&nbsp;&nbsp;<b>Cantidad:</b>&nbsp;<b id="txt_cant">'.$reg->cantidad.'</b>&nbsp;&nbsp;
                        <label style="cursor: pointer; background-color: #9B1503; color: white; border-radius: 5px;" for="" onclick="eliminar_tallas('.$reg->idprod_talla.');">&nbsp;x&nbsp;</label>
                        <label style="cursor: pointer; background-color: #043062; color: white; border-radius: 5px;" for="" onclick="ver_tallas2('.$reg->idprod_talla.');">&nbsp;Editar&nbsp;</label>&nbsp;&nbsp;
                    ';
                }
       
    break;

    case 'eliminar_tallas':

        $idprod_talla = $_POST['idprod_talla'];

        $rspta=$productos->eliminar_tallas($idprod_talla);
        echo json_encode($rspta);

    break;

    case 'listar_categorias':

        $rspta = $productos->listar_categorias();
        echo '
        <option value="">Seleccionar</option>
        ';
        while ($reg = $rspta->fetch_object())
                {
                    echo '
                        <option value="'.$reg->idcategoria.'">'.$reg->nombre.'</option>
                    ';
                }
       
    break;

    case 'actualizar_categoria':

        $idcategoria = $_POST['idcategoria'];
        $idproducto = $_POST['idproducto'];

        $rspta=$productos->actualizar_categoria($idcategoria,$idproducto);
        echo json_encode($rspta);

    break;

    case 'ocultar':

        $idproducto = $_POST['idproducto'];
        $visible = $_POST['visible'];

        $rspta=$productos->ocultar($idproducto,$visible);
        echo json_encode($rspta);

    break;
		
	
}
?>