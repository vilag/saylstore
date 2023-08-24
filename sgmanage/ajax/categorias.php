<?php
session_start(); 
require_once "../modelos/Categorias.php";

$categorias=new Categorias();


switch ($_GET["op"]){
	
    case 'listar_categorias':

        $rspta = $categorias->listar_categorias();
                    
        while ($reg = $rspta->fetch_object())
                {
                    echo '
                           

                        <div class="col-lg-3 col-md-6 col-sm-12 estilo_prod">
                            <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px;">
                                <b>Nombre: </b>
                                <input type="text" class="form-control" id="input_categoria'.$reg->idcategoria.'" value="'.$reg->nombre.'" onchange="actualizar_nombre('.$reg->idcategoria.');">
                            </div>
                            <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px;">
                                <b>Color etiqueta: </b>
                                <input type="color" class="form-control" id="input_color'.$reg->idcategoria.'" value="'.$reg->color_eti.'" onchange="actualizar_color('.$reg->idcategoria.');">
                            </div>
                            <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px;">
                                <b>Orden:</b>
                                <input type="text" class="form-control" id="orden_categoria'.$reg->idcategoria.'" value="'.$reg->orden.'" onchange="actualizar_orden('.$reg->idcategoria.');">   
                            </div>
                            <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px; text-align: center;">
                                <img src="../img/productos/categorias/'.$reg->imagen.'" alt="" style="width:200px; height: 200px;"> 
                                <form method="post" action="#" enctype="multipart/form-data">
                                                                    
                                        <div class="card-body">    
                                            <div class="form-group">
                                                <label for="image">Cambiar imagen</label>
                                                <input type="file" class="form-control" name="image'.$reg->idcategoria.'" id="image'.$reg->idcategoria.'" onchange="guardar_img('.$reg->idcategoria.');">
                                            </div> 
                                        </div>
                                
                                </form>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px; text-align: center;">
                                <button style="background-color: transparent; border: black 1px solid;" type="button" class="btn btn-block" id="btn_delete'.$reg->idcategoria.'" onclick="borrar_cat('.$reg->idcategoria.');">Eliminar</button>
                            </div>
                            <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px; text-align: center;">
                                <button style="background-color: transparent; border: black 1px solid;" type="button" class="btn btn-block">Actualizar</button>
                            </div>
                        </div>




                    ';
                }
                               
    break;

    case 'guardar_categoria':

        $nombre_categoria = $_POST['nombre_categoria']; 
        $nombre_archivo = $_POST['nombre_archivo']; 
        $color_categoria = $_POST['color_categoria'];                                          
        $rspta=$categorias->guardar_categoria($nombre_categoria,$nombre_archivo,$color_categoria);
        echo json_encode($rspta);
         
    break;

    case 'actualizar_orden':

        $orden_categoria = $_POST['orden_categoria'];
        $idcategoria = $_POST['idcategoria'];                                          
        $rspta=$categorias->actualizar_orden($orden_categoria,$idcategoria);
        echo json_encode($rspta);
         
    break;

    case 'actualizar_nombre':

        $input_categoria = $_POST['input_categoria'];
        $idcategoria = $_POST['idcategoria'];                                          
        $rspta=$categorias->actualizar_nombre($input_categoria,$idcategoria);
        echo json_encode($rspta);
         
    break;

    case 'actualizar_color':

        $input_color = $_POST['input_color'];
        $idcategoria = $_POST['idcategoria'];                                          
        $rspta=$categorias->actualizar_color($input_color,$idcategoria);
        echo json_encode($rspta);
         
    break;

    case 'borrar_cat':

        $idcategoria = $_POST['idcategoria'];                                          
        $rspta=$categorias->borrar_cat($idcategoria);
        echo json_encode($rspta);
         
    break;

    case 'consul_nom_arch':

        $nombre_archivo = $_POST['nombre_archivo'];

        $rspta=$categorias->consul_nom_arch($nombre_archivo);
        echo json_encode($rspta);

    break;

    case 'update_img_producto':

        $nombre_archivo = $_POST['nombre_archivo'];
        $idcategoria = $_POST['idcategoria'];

        $rspta=$categorias->update_img_producto($nombre_archivo,$idcategoria);
        echo json_encode($rspta);

    break;

		
	
}
?>