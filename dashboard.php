<?php
	session_start();
	//validamos que solo entren en esta página los usuarios autoriza
	if (!isset($_SESSION["usuario"])){
		header("Location:http://localhost:63342/SeptimoPHP/login.php?mensaje=Usuario no autorizado");
	}
    include "header.php";
	?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>

<div class="caja-negra">
    <div class="opciones">
        <a href="" title="Descargar" >
        <span class="material-symbols-outlined">download</span>
        </a>
        <a href="javascript:window.print()" title="Imprimir">
            <span class="material-symbols-outlined">print</span>
        </a>
        <a href="password.php" title="Cambiar Password">
            <span class="material-symbols-outlined">lock_reset</span>
        </a>
        <a href="borrarCookies.php" title="Salir">
            <span class="material-symbols-outlined">logout</span>
        </a>
    </div>
    <div class="numeros">
		<span class="numero-activo">Sistema De Alta Clientes </span>
	</div>

    <div class="opciones">
       <span class="material-symbols-outlined">account_circle</span> <p><?=$_SESSION["usuario"]?></p>
    </div>

</div>


<div class="caja-blanca">

</div>
</body>
</html>
