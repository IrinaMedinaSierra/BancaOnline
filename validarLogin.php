<?php
if (!empty($_POST["email"]) && !empty($_POST["pass"])){
	$email=$_POST["email"];
	$pass=$_POST["pass"];
	//debo hacer una consulta a bbdd verificando que ese email existe y recuperar la contraseña de la bbdd para
	// compararla con la contraseña insertada en formulario
	//tambien me traigo el nombre para mostrarlo en caso positivo en dashboard
	include "modelo/conexion.php";
	$link=conectar();
	$consulta="select * from usuarios where email='".$email."';";
	$resultado=mysqli_query($link,$consulta);
	$row=mysqli_num_rows($resultado);
	if ($row!=0){
		$registro=mysqli_fetch_assoc($resultado);
		$emailBBDD=$registro["email"];
		echo "<br>". $emailBBDD;
	}









}