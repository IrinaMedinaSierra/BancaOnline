<?php
	session_start();
	//validamos que solo entren en esta página los usuarios autoriza
	if (!isset($_SESSION["usuario"])){
		header("Location:http://localhost:63342/SeptimoPHP/login.php?mensaje=Usuario no autorizado");
	}else{
        //entra porque inicio sesion
        if ($_GET['opcion']=='exportar'){ //si la opcion es exportar envio a exportar en xls y al final debo ir a
            // dashboard
	        $file="archivo.xls";
	        echo pack("CCC",0xef,0xbb,0xbf);
	        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
	        header("Content-Disposition: attachment; filename=$file");
        }
        if ($_GET['opcion']=="listar"){ //muestro el cuadro de dialogo y debearia volver al dashboard
            echo "<script>window.print()</script>";
        }
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="vista/css/style.css">
	<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
"></script>
	<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
" rel="stylesheet">
	<script src="vista/js/scriptConfirmar.js"></script>
	<title>DashBoard</title>
</head>
<body>

<div class="caja-blanca ancha">
	<img src="vista/img/banca.png" alt="logo">
	<h3></h3>

	<table class="tabla-cliente">
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>1º Apellido</th>
			<th>2º Apellido</th>
			<th>Edad</th>
			<th>DNI</th>
			<th>Email</th>
			<th>Teléfono</th>

		</tr>
		<!--        hacemos una consulta y despues mostramos todos los clientes-->
		<?php
			include "modelo/conexion.php";
			$link=conectar();
			$consulta="select * from cliente;";
			$resultado=mysqli_query($link,$consulta);
			while ($row=mysqli_fetch_assoc($resultado)){
				echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['nombre']."</td>
                <td>".$row['apellido1']."</td>
                <td>".$row['apellido2']."</td>
                <td>".$row['edad']."</td>
                <td>".$row['dni']."</td>
                <td>".$row['email']."</td>
                <td>".$row['telefono']."</td>
   
                </tr>";
			}
		?>

	</table>
</div>
<?php

	}
 ?>
</body>
</html>
