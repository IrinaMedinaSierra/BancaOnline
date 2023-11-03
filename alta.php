<?php
	if (!empty($_POST["usuario"]) && !empty($_POST["pass"])) {
		$usuario = $_POST["usuario"];
		$pass = $_POST["pass"];
		$paso=true;
		if (validarEmail($usuario)) {
			echo "Email validado correctamente";
		} else {
			echo "Email en formato incorrecto";
			$paso=false;
		}
		if (validarPass($pass)) {
			echo "El password cumple los requisitos de complejidad";
		} else {
			echo "El password NOO cumple los requisitos de complejidad";
			$paso=false;
		}
		if ($paso){
			$insertarUser="insert into usuarios (email,pass) values 
            ('".$usuario."','".$pass."');";
			echo "<br>$insertarUser";
			include "modelo/conexion.php";
			$link=conectar();
			$result=mysqli_query($link,$insertarUser);
			if ($result) {
				echo "Alta realizada correctamente";
			}
				else {
					echo "Existe un error al relizar el alta";
				}
		}

	}
	function validarEmail($email)
	{
		// las expresiones regulares
		$regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$/";
		if (preg_match($regex,$email)){//compara que la expresion regular se cumple en variable $email
			return true;
		}else{
			return false;
		}

	}
	function validarPass($pass){
		$regex ="/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/";
		if (preg_match($regex,$pass)){
			return true;
		}else{
			return false;
		}
		}



