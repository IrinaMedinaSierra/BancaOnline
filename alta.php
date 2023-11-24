<?php
	include "modelo/conexion.php";
	global $link;
	$link=conectar();
	if (!empty($_POST["usuario"]) && !empty($_POST["pass"]) && !empty($_POST["nombre"])) {
		$nombre=$_POST["nombre"];
		$usuario = $_POST["usuario"];
		$pass = $_POST["pass"];
		$paso=true;
		$mesaje="";
		if (!validarEmail($usuario)) {
			$mensaje= "Email en formato incorrecto";
			$paso=false;
		}
		if (!validarPass($pass)) {
			$mensaje=$mensaje."<br>El password NOO cumple los requisitos de complejidad";
			$paso=false;
		}
		//funcion que se llama para buscar si existe el email en la bbdd
		if (!validarEmailBBDD($usuario)){
			$mensaje=$mensaje."<br> Error: El email ya existe";
			$paso=false;
		}

	//funcion  que guarda el registro cuando todo es correcto en la bbdd
		if ($paso){
			$passSeguro=password_hash($pass,PASSWORD_BCRYPT);
		//	echo "<br>".$passSeguro;
			$insertarUser="insert into usuarios (email,pass,nombre) values 
            ('".$usuario."','".$passSeguro."','".$nombre."');";
		//	echo "<br>$insertarUser";
			$result=mysqli_query($link,$insertarUser);
			if ($result) {
				$mensaje= "Alta realizada correctamente, pueden entrar al Sistema";
				header("Location:http://localhost:63342/SeptimoPHP/login.php?mensaje=$mensaje");
			}
				else {
					$mensaje = "Existe un error al relizar el alta";
					header("Location:http://localhost:63342/SeptimoPHP/registro.php?mensaje=$mensaje");
				}
				mysqli_close($link); //cerrar la bbdd
		}else{
			header("Location:http://localhost:63342/SeptimoPHP/registro.php?mensaje=$mensaje");
		}

	}else{
		$mensaje="Todos los campos son resqueridos";
		header("Location:http://localhost:63342/SeptimoPHP/registro.php?mensaje=$mensaje");
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
//funcion para validar que email no exista en la bbdd
	function validarEmailBBDD($email){
		global $link;
		$consulta="select email from usuarios where email='".$email."';";
		$resultado=mysqli_query($link,$consulta); //ejecutar la consulta
		//verifica que existe y devuelve el nº de registros...
		$row=mysqli_num_rows($resultado);
		if ($row!=0){
			return false;
		}else{
			return true;
		}
	}

