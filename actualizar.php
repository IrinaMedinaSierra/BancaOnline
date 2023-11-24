<?php
	session_start();
	if (!isset($_SESSION["usuario"])){
		header("Location:http://localhost:63342/SeptimoPHP/login.php?mensaje=Usuario no autorizado");
	}
    if (!isset($_GET['id']) || empty($_GET['id'])){
	    header("Location:http://localhost:63342/SeptimoPHP/dashboard.php");
    }else{
        include "header.php";
        $consulta="select * from cliente where id=".$_GET['id'];
        include "modelo/conexion.php";
        $link=conectar();
        $resultado=mysqli_query($link,$consulta);
        while ($row=mysqli_fetch_assoc($resultado)){

?>
<body>
<div class="caja-negra">
	<div class="numeros">
		<span class="numero-activo">Actualizar Cliente</span>
	</div>
</div>
<div class="caja-blanca">
	<h3></h3>
	<form id="formulario" method="post" class="formulario" action="acRegistro.php" novalidate>
        <input type="hidden" value="<?=$row['id']?>" name="id">
		<div class="input-izquierda">
			<input class="validar" type="text" required id="dni" name="dni" placeholder="DNI" value="<?=$row['dni']?>" >
			<p>00000000A</p>
			<input class="validar" type="email" id="email" name="email" placeholder="EMAIL"
                   value="<?=$row['email']?>"required>
			<p>usuario@dominio.ext</p>
		</div>
		<div class="input-derecha">
			<input class="validar" type="text" id="movil" name="movil" placeholder="TELÉFONO
			MÓVIL"value="<?=$row['telefono']?>" required>
			<p>000 000 000</p>
			<input class="validar" type="email" id="email2" name="email2" placeholder="CONFIRMA TU EMAIL"
                   value="<?=$row['email']?>" required>
			<p>usuario@dominio.ext</p>
		</div>

		<div class="input-izquierda">
			<input type="text" name="nombre" required placeholder="NOMBRE" value="<?=$row['nombre']?>">
			<p>Ej: María</p>
			<input type="number" required min="18" max="85" placeholder="EDAD" name="edad" value="<?=$row['edad']?>">
			<p>Indica tu edad. Mínimo 18 años</p>
		</div>
		<div class="input-derecha">
			<input type="text" required placeholder="PRIMER APELLIDO" name="apellido" value="<?=$row['apellido1']?>">
			<p>Ej: López</p>
			<input type="text" placeholder="SEGUNDO APELLIDO" name="apellido2" value="<?=$row['apellido2']?>">
			<p>Ej: Martinez</p>
		</div>
		<div class="acciones">
			<p class="centrado">
				<input type="submit"  class="boton entrada"  name="enviar" value="Actualizar" id="enviar">

			</p>
		</div>
	</form>
</div>
<?php
	}

	}
?>
</body>
</html>
