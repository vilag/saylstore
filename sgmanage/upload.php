<?php

$servername = 'sql195.main-hosting.eu';
$username = 'u690371019_sarahg';
$password = "Bp=>6a$&S]5";
$dbname = "u690371019_sarahg";
$conn = new mysqli($servername, $username, $password, $dbname);

//$fechaActual = date('d-m-Y H:i:s');
date_default_timezone_set('America/Mexico_City');

$anio = date('Y');
$mes = date('m');
$dia = date('d');
$hora = date('H');
$minuto = date('i');
$segundo = date('s');
$nom_pref = $anio.$mes.$dia.$hora.$minuto.$segundo;

$file = $_FILES['file'];
$file_nom = $nom_pref."_".$_FILES['file']['name'];
$idproducto = $_POST['idproducto'];

if ($idproducto>0){
  $sql3="UPDATE detalle_producto SET idproducto='$idproducto' WHERE idproducto=0";
	$result = $conn->query($sql3);
}

if ( move_uploaded_file( $file['tmp_name'], 'uploads/productos/' . $file_nom ) ) {
  echo json_encode('success');

  $sql2="INSERT INTO detalle_producto (idproducto, imagen, orden) VALUES ('0','$file_nom','0')";
	$result = $conn->query($sql2);

} else {
  echo json_encode('fail');
}
