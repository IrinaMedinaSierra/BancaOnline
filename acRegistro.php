<?php
	session_start();
	if (!isset($_SESSION["usuario"])){
		header("Location:http://localhost:63342/SeptimoPHP/login.php?mensaje=Usuario no autorizado");
	}
	if (empty($_POST['id']) || empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['apellido2']) ||
		empty($_POST['edad']) || empty($_POST['dni']) || empty($_POST['email']) || empty($_POST['movil']) ||
		empty($_POST['email2'])  && $_POST['email'] != $_POST['email2']) {
			//se valida los 7 campos que no esten vacios!!
			header("Location:http://localhost:63342/SeptimoPHP/actualizar.php?id=" . $_POST['id']);
		}
		else{
		include "modelo/conexion.php";
		$link=conectar();
		$actualizar="update cliente set nombre='".$_POST['nombre']."', apellido1='".$_POST['apellido']."',apellido2='".$_POST['apellido2']."',edad=".$_POST['edad'].",telefono=".$_POST['movil'].",dni='".$_POST['dni']."',email='".$_POST['email']."' where id=".$_POST['id'].";";
	//	echo $actualizar;
		$resultado=mysqli_query($link,$actualizar);
		if ($resultado){
			$mensaje="El cliente ".$_POST["nombre"]." ".$_POST['apellido']." ". $_POST['apellido2']. " se actualizo exitosamente";
		}	else{
			$mensaje="ERROR al actualizar el cliente ".$_POST["nombre"]." ".$_POST['apellido']." ". $_POST['apellido2'];
		}
			header("Location:http://localhost:63342/SeptimoPHP/dashboard.php?mensaje=".$mensaje);

		//lo que falta ....link resultado...si resultado esta bien...enviar mensaje
	}