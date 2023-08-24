<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"]))
{
  header("Location: login.php");
}
else
{
require 'header.php';
if ($_SESSION['Administrador']==1)
{
?>
<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/moment.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<style>
    .estilo_prod{
        padding: 20px 20px 20px 20px; 
        position: static; 
        float: left; 
        /* border: black 1px solid; */
        margin: 10px;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
    }
    .estilo_prod2{
        box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
        background-color: #FFF;
        cursor: pointer;
    }
    
</style>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Productos</h3>
                
            </div>
            <div class="page-content">
                <section class="row" id="div_list_prod" style="display: block">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="card-header">
                                        <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                            data-bs-target="#inlineForm" onclick="listar_cat();">
                                            Nuevo producto
                                        </button>
                                                    
                                        </div>
                                        <div class="card-header">
                                            <div class="col-lg-5 col-md-12" style="position: static; float: left;">
                                                    <label for="">Seleccionar Categoria</label>
                                                    <select class="form-select" id="select_categorias" onchange="listar_select_cat2();">
                                                            
                                                    </select>
                                            </div>
                                            <div class="col-lg-5 col-md-12" style="position: static; float: left; margin-left: 10px;">
                                                    <label for="">Seleccionar Estatus</label>
                                                    <select class="form-select" id="select_estatus" onchange="listar_select_cat2();">
                                                        <option value="1">Disponibles</option> 
                                                        <option value="2">Apartados</option> 
                                                        <option value="3">Vendidos</option>     
                                                    </select>
                                            </div>
                                                    
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-striped" id="tbl_productos">
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                 
                </section>

                <section class="row" id="div_detalle_prod" style="display: none">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="card-header">
                                            <div class="col-lg-6 col-md-6 col-sm-12" style="float: left;">
                                                <h4>Editar producto </h4>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12" style="float: left; text-align: right;">
                                                <button type="button" class="btn btn-outline-primary block" onclick="regresar_a_lista();">Regresar</button>
                                            </div>
                                                    
                                        </div>
                                        
                                        <div class="card-body">
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px;">
                                                                    <b>Categoria:</b>&nbsp;<b id="txt_categ"></b><div class="icon dripicons-document-edit" onclick="ver_categorias();"></div>  
                                                                    <select class="form-select" id="id_categoria_select" style="display:none;" onchange="actualizar_categoria();">
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px;">
                                                                    <b>Nombre: </b>
                                                                    <input type="text" class="form-control" id="input_nombre"  onchange="actualizar_nombre();">
                                                                    <input type="hidden" id="idproducto">
                                                                    <input type="hidden" id="idcategoria">
                                                                </div>
                                                                <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px;">
                                                                    <b>Descripción breve: </b>
                                                                    <textarea id="descrip_breve" cols="30" rows="2" class="form-control" onchange="actualizar_det_gen();"></textarea>
                                                                </div>
                                                                <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px;">
                                                                    <b>Descripción detallada: </b>
                                                                    <textarea id="descrip_det" cols="30" rows="2" class="form-control" onchange="actualizar_des_det();"></textarea>
                                                                </div>
                                                                <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px;">
                                                                    <b>Precio:</b>
                                                                    <input type="text" class="form-control" id="precio_edit" onchange="actualizar_precio();">   
                                                                </div>
                                                                <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px;">
                                                                    <b>Genero:</b>&nbsp;<b id="txt_genero"></b><div class="icon dripicons-document-edit" onclick="ver_generos();"></div>  
                                                                    <select class="form-select" id="genero_edit" style="display:none;" onchange="actualizar_genero();">
                                                                        <option value="0">Seleccionar</option>
                                                                        <option value="2">Mujer</option>
                                                                        <option value="1">Hombre</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px;">
                                                                    <b>Talla:</b>&nbsp;<b id="txt_talla"></b>&nbsp;&nbsp;<b>Cantidad:</b>&nbsp;<b id="txt_cant"></b>&nbsp;&nbsp;
                                                                    <label style="cursor: pointer; background-color: #043062; color: white; border-radius: 5px;" for="" onclick="ver_tallas();">&nbsp;Editar&nbsp;</label>&nbsp;&nbsp;
                                                                    <label for="" id="list_tallas"></label>&nbsp;&nbsp;
                                                                    <label style="cursor: pointer; background-color: #057E22; color: white; border-radius: 5px;" for="" onclick="nueva_talla();">&nbsp;Nuevo&nbsp;</label>
                                                                    
                                                                    <div class="col-12 col-lg-12 col-md-12" id="div_datos_talla" style="display:none; padding: 25px; background-color: #E8EAEC; margin-top: 20px;">
                                                                            <input type="hidden" value="" id="tipo_guardado">
                                                                            <input type="hidden" value="0" id="id_act_talla">
                                                                            <b id="titulo_talla">EDITAR TALLA</b><br><br>
                                                                            <label for="">Talla</label>
                                                                            <select class="form-select" id="talla_edit">
                                                                            </select>
                                                                            <hr>
                                                                            <label for="">Cantidad</label>
                                                                            <input type="number" class="form-control" id="cant_prod"><br><br>
                                                                            <button id="btn_guardar_talla" style="display: block;" onclick="guardar_talla();" >Guardar</button>
                                                                    </div>

                                                                    
                                                                    
                                                                </div>
                                                                <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px;">
                                                                    <b>Color base:</b>&nbsp;<b id="txt_color"></b><div class="icon dripicons-document-edit" onclick="ver_colores();"></div>  
                                                                    
                                                                    <select class="form-select" id="colores_edit" style="display:none;" onchange="actualizar_colores();">
                                                                        
                                                                    </select>
                                                                    
                                                                </div>
                                                                <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px;">
                                                                    <b>Destacado:</b>&nbsp;<b id="txt_dest"></b><div class="icon dripicons-document-edit" onclick="ver_dest();"></div>  
                                                                    <select class="form-select" id="dest_edit" style="display:none;" onchange="actualizar_dest();">
                                                                        <option value="">Seleccionar</option>
                                                                        <option value="1">Si</option>
                                                                        <option value="0">No</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px;">
                                                                        <b>Orden:</b>
                                                                        <input type="text" class="form-control" id="orden_prod" onchange="actualizar_orden();">   
                                                                </div>
                                                                <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px;">
                                                                        <b>Marca:</b>&nbsp;<b id="txt_marca"></b><div class="icon dripicons-document-edit" onclick="ver_marca();"></div>
                                                                        <select class="form-select" id="marca_edit" style="display:none;" onchange="actualizar_marca();">
                                                                            
                                                                        </select>   
                                                                </div>
                                                                <div class="col-12 col-lg-12 col-md-12" style="padding: 10px 30px 30px 30px; padding-buttom: 10px; text-align: center; border: black 1px solid; margin-top: 50px; height: 700px; ">
                                                                    <div class="col-12 col-lg-12 col-md-12">
                                                                        <div class="col-6 col-lg-6 col-md-6" style="float: left;">
                                                                             <label for="">Imagenes</label>
                                                                        </div>
                                                                        <div class="col-6 col-lg-6 col-md-6" style="float: left; text-align: right;">
                                                                            <button type="button" class="btn btn-outline-primary block" onclick="ver_form_img_new();" style="font-size: 30px;">+</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-lg-12 col-md-12" id="box_imagenes" style="display: block; margin-top: 30px; height: 300px;">
                                                                        
                                                                    </div>
                                                                    
                                                                    <div class="col-12 col-lg-12 col-md-12" id="box_imagenes_new" style="display: none; margin-top: 30px;">
                                                                            <form action="" class="">

                                                                            <div class="dropzone" id="caja_subir">
                                                                                <div class="dz-default dz-message" >
                                                                                    <button class="dz-button" type="button"><img src="images/upload.png" alt=""></button>
                                                                                </div>
                                                                            </div>
                                                                            <!-- <div class="button">
                                                                            <button type="button" id="send" onclick="subir_img();">Enviar</button>
                                                                            </div> -->

                                                                            </form>
                                                                    </div>
                                                                   
                                                                        <!-- <img id="img_producto" src="../img/productos/'.$reg->imagen.'" alt="" style="width:200px; height: 200px;">  -->

                                                                                                    <!-- <form method="post" action="#" enctype="multipart/form-data">
                                                                                                        
                                                                                                            <div class="card-body">    
                                                                                                                <div class="form-group">
                                                                                                                    <label for="image2">Cambiar imagen</label>
                                                                                                                    <input type="file" class="form-control" name="image2" id="image2" onchange="guardar_img();">
                                                                                                                </div> 
                                                                                                            </div>
                                                                                                    
                                                                                                    </form> -->

                                                                                                    
                                                                </div>
                                                               
                                                                <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px; text-align: center;">
                                                                    <button style="background-color: transparent; border: black 1px solid;" type="button" class="btn btn-block" id="btn_delete" onclick="borrar_prod();">Eliminar</button>
                                                                </div>
                                                                <div class="col-12 col-lg-12 col-md-12" style="padding-top: 10px; padding-buttom: 10px; text-align: center;">
                                                                    <button style="background-color: transparent; border: black 1px solid;" type="button" class="btn btn-block" onclick="subir_img();">Actualizar</button>
                                                                </div>
                                                               
                                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                 
                </section>

            </div>

                                    <!--Basic Modal -->
                                            <div class="modal fade text-left" id="inlineForm" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel33">Registrar nuevo producto </h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                       
                                                            <div class="modal-body" style="overflow: scroll; height: 400px;">
                                                                
                                                                    <div class="form-group">
                                                                        <label for="">Seleccionar categoria</label>
                                                                        <select class="form-select" id="select_categorias_n" name="select_categorias_n">
                                                                            
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Nombre: </label>
                                                                        <input type="text" class="form-control" id="nombre_prod_n" name="nombre_prod_n">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Descripción breve: </label>
                                                                        <textarea name="descrip_breve_n" id="descrip_breve_n" cols="30" rows="2" class="form-control"></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Detalle del producto: </label>
                                                                        <textarea name="detalle_prod_n" id="detalle_prod_n" cols="30" rows="5" class="form-control"></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Hombre/Mujer: </label>
                                                                        <select class="form-select" id="select_gen_n" name="select_gen_n">
                                                                            <option value="">Seleccionar</option>
                                                                            <option value="1">Mujer</option>
                                                                            <option value="2">Hombre</option>
                                                                        </select>
                                                                    </div> 
                                                                    <div class="form-group">
                                                                        <label>Precio: </label>
                                                                        <input type="number" class="form-control" id="precio_prod_n" name="precio_prod_n">
                                                                    </div> 
                                                                
                                                                
                                                                <form method="post" action="#" enctype="multipart/form-data">
                                                                    
                                                                        <!-- <img class="card-img-top" src="images/default-avatar.png"> -->
                                                                        <div class="card-body">
                                                                            
                                                                            <div class="form-group">
                                                                                <label for="image">Imagen</label>
                                                                                <input type="file" class="form-control" name="image" id="image">
                                                                            </div>
                                                                            <div class="col-12 col-lg-12 col-md-12" style="margin-top: 30px; text-align: center;">
                                                                                <button type="button" class="btn btn-light-secondary"
                                                                                    data-bs-dismiss="modal">
                                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                                    <span class="d-none d-sm-block">Cancelar</span>
                                                                                </button>
                                                                                <input type="button" class="btn btn-primary upload" value="Guardar" onclick="guardar_prod();">
                                                                            </div>  
                                                                        </div>
                                                                   
                                                                </form>
 
                                                            </div>
                                                            <div class="modal-footer">
                                                                
                                                            </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>


                                            <!--Basic Modal -->
                                            <div class="modal fade text-left" id="modal_det_prod" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel33">Editar producto </h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                       
                                                        <div class="modal-body" style="overflow: scroll; height: 400px;">
                                                                
                                                                    
                                                                
                                                                
                                                               
 
                                                        </div>
                                                            <div class="modal-footer">
                                                                
                                                            </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            


<script type="text/javascript" src="scripts/productos.js?v=<?php echo(rand()); ?>"></script>
<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/bootbox.min.js"></script>
<script src="node_modules/dropzone/dist/dropzone-min.js"></script>
<script src="scripts/app.js"></script>

<?php
require 'footer.php';
?>

<?php
}
else
{
  require 'noacceso.php';
}

?>

<?php
}
ob_end_flush();
?>