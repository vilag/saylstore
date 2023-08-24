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
                <h3>Marcas</h3>
                
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
                                            Nueva Marca
                                        </button>
                                                    
                                        </div>
                                        <!-- <div class="card-header">
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
                                                    
                                        </div> -->
                                        <div class="card-body">
                                            <table class="table table-striped" id="tbl_marcas">
                                                
                                            </table>
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
                                                            <h4 class="modal-title" id="myModalLabel33">Registrar nueva marca </h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                       
                                                            <div class="modal-body" style="overflow: scroll; height: 200px;">
                                                                
                                                                   
                                                                    <div class="form-group">
                                                                        <label>Nombre: </label>
                                                                        <input type="text" class="form-control" id="nombre_marca" name="nombre_marca">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <input type="button" class="btn btn-primary upload" value="Guardar" onclick="guardar_marca();">
                                                                    </div>
 
                                                            </div>
                                                            <div class="modal-footer">
                                                                
                                                            </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>


                                           

                                            


<script type="text/javascript" src="scripts/marca.js?v=<?php echo(rand()); ?>"></script>
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