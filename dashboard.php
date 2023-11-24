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
    <h3></h3>
    <p><?php
		    if (isset($_GET['mensaje'])){
			     echo $_GET['mensaje'];
		    }
        ?></p>
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
            <th>Opciones</th>
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
   <!--                icono de actualizar -->
                <td><a href='actualizar.php?id=".$row['id']. "' title='Actualizar'>
                <span class='material-symbols-outlined'>
                edit_note
                </span> </a>
        <!--      icono de eliminar -->
                <a href='eliminar.php?id=".$row['id']. "' title='Eliminar' onclick='confirmar()'>
                <span class='material-symbols-outlined'>
                delete
                </span> </a> 
                </td>
                </tr>";
            }
        ?>

    </table>



</div>
</body>
</html>
