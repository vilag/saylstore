<?php
session_start(); 
require_once "../modelos/Usuario.php";

$usuario=new Usuario();


switch ($_GET["op"]){
	

	

	case 'verificar':
		$logina=$_POST['logina'];
	    $clavea=$_POST['clavea'];

	    //Hash SHA256 en la contraseña
		//$clavehash=hash("SHA256",$clavea);

		$rspta=$usuario->verificar($logina, $clavea);

		$fetch=$rspta->fetch_object();	

		if (isset($fetch))
	    {
	        //Declaramos las variables de sesión
	        $_SESSION['idusuario']=$fetch->idusuario;
	        $_SESSION['nombre']=$fetch->nombre;
	        
	        $_SESSION['login']=$fetch->login;
	       

	        //Obtenemos los permisos del usuario
	    	$marcados = $usuario->listarmarcados($fetch->idusuario);

	    	//Declaramos el array para almacenar todos los permisos marcados
			$valores=array();

			//Almacenamos los permisos marcados en el array
			while ($per = $marcados->fetch_object())
				{
					array_push($valores, $per->idpermiso);
				}

			//Determinamos los accesos del usuario
			in_array(1,$valores)?$_SESSION['Administrador']=1:$_SESSION['Administrador']=0;
			
			

	    }
	    echo json_encode($fetch);
	break;

	case 'salir':
		//Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../login.php");

	break;
}
?>