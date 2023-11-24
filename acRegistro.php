<?php
	session_start();
	if (!isset($_SESSION["usuario"])){
		header("Location:http://localhost:63342/SeptimoPHP/login.php?mensaje=Usuario no autorizado");
	}
	if (!isset($_POST['id']) || empty($_POST['id'])){ //se valida los 7 campos que no esten vacios!!
		header("Location:http://localhost:63342/SeptimoPHP/dashboard.php");
	}else{
		include "modelo/conexion.php";
		$link=conectar();

		$actualizar="update cliente set nombre='".$_POST['nombre']."', apellido1='".$_POST['apellido']."',apellido2='".$_POST['apellido2']."',edad=".$_POST['edad'].",telefono=".$_POST['movil'].",dni='".$_POST['dni']."',email='".$_POST['email']."' where id=".$_POST['id'].";";
		echo $actualizar;


	}