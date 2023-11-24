<?php
	session_start();
	if (!isset($_SESSION["usuario"])){
		header("Location:http://localhost:63342/SeptimoPHP/login.php?mensaje=Usuario no autorizado");
	}

if (isset($_GET['id'])){
    $consulta="delete from cliente where id=".$_GET['id'];
    include "modelo/conexion.php";
    $link=conectar();
    $resultado=mysqli_query($link,$consulta);
    if ($resultado){
        $mensaje="El registro se elimino correctamente";
    }else{
        $mensaje="Error al intentar borrar el registro.";
    }
    header("Location:http://localhost:63342/SeptimoPHP/dashboard.php?mensaje=$mensaje");
}
