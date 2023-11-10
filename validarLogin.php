<?php
	session_start();
if (!empty($_POST["email"]) && !empty($_POST["pass"])){
	$email=$_POST["email"];
	$passFormulario=$_POST["pass"];
	//debo hacer una consulta a bbdd verificando que ese email existe y recuperar la contraseña de la bbdd para
	// compararla con la contraseña insertada en formulario
	//tambien me traigo el nombre para mostrarlo en caso positivo en dashboard
	include "modelo/conexion.php";
	$link=conectar();
	//se consulta en la bbdd el email suministrado en el formulario
	$consulta="select * from usuarios where email='".$email."';";
//	echo "<br>$consulta";
	$resultado=mysqli_query($link,$consulta);
	$row=mysqli_num_rows($resultado);
	//se valida si existe algun registro
	if ($row!=0){
		$registro=mysqli_fetch_assoc($resultado);
		$emailBBDD=$registro["email"];
	//	echo "<br>El usuario ". $emailBBDD . " existe";
		//llamamos la funcion de  validar password y verificamos que sean iguales
		$passBBDD=$registro["pass"]; //guarda en esta variable el hash del bbdd
		if (validarPass($passFormulario,$passBBDD)){
	//		echo "<br>La contraseña es correcta";
			$_SESSION["usuario"]=$registro["nombre"];
			header("Location:http://localhost:63342/SeptimoPHP/dashboard.php");
		}else{
			$mensaje="Error, verifique su clave ";
			header("Location:http://localhost:63342/SeptimoPHP/login.php?mensaje=$mensaje");
	//		echo "<br> Error, contraseña inválida";
		}
	}else{
		$mensaje="No existe este usuario";
		header("Location:http://localhost:63342/SeptimoPHP/login.php?mensaje=$mensaje");
//		echo "No existe este usuario";
	}
}

//Funcion que valida el password ingresado con el password guardado en la BBDD
function validarPass($passFormulario,$passBBDD){
	// el metodo password_verify($passwordFormulario,$passwordBBDD) y los va a comparar
	// resultado true si son iguales y false caso contrario.
	$verificacion=password_verify($passFormulario,$passBBDD); //true o false (0 - 1 )
	if ($verificacion){//si la verificacion es true
		return true;    //devuelve a la llamada de la funcion true
	}else{
		return false;   //devuelve a la llamada de la funcion false
	}




}