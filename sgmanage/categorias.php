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

<style>
    .estilo_prod{
        padding: 20px 20px 20px 20px; 
        position: static; 
        float: left; 
        box-shadow: 5px 5px 5px rgba(0,0,0,0.2);
        background-color: #FFF;
        cursor: pointer;
    }

    .estilo_prod:hover{
        padding: 20px 20px 20px 20px; 
        position: static; 
        float: left; 
        box-shadow: 5px 5px 5px rgba(0,0,0,0.2);
        background-color: #FCE9F0;
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
                <h3 id="input_value">Categorias</h3>
                
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="card-header">
                                        <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                            data-bs-target="#inlineForm">
                                            Nueva Categoria
                                        </button>
                                        <button type="button" class="btn btn-outline-primary block" onclick="reordenar();">
                                            Reordenar
                                        </button>
                                        </div>
                                        <div class="card-body">

                                        <div class="col-12 col-lg-12 col-md-12" id="tbl_categorias">

                                        </div>

                                            <!-- <table class="table table-striped" >
                                                
                                            </table> -->
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
                                                            <h4 class="modal-title" id="myModalLabel33">Registrar nueva categoria </h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                       
                                                            <div class="modal-body">
                                                                
                                                                <div class="form-group">
                                                                    <label>Nombre: </label>
                                                                    <input type="text" class="form-control" id="nombre_categoria">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Color de etiqueta: </label>
                                                                    <input type="color" class="form-control" id="color_categoria">
                                                                </div>
                                                                <form method="post" action="#" enctype="multipart/form-data">
                                                                    
                                                                        
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
                                                                                <input type="button" class="btn btn-primary upload" value="Guardar" onclick="guardar_cat();">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                   
                                                                </form>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                               
                                                            </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>

<script type="text/javascript" src="scripts/categorias.js?v=<?php echo(rand()); ?>"></script>
<script src="js/jquery-3.6.1.min.js"></script>
<script src="js/bootbox.min.js"></script>


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