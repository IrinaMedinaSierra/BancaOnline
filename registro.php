<?php
	include "header.php"
	?>
	<div class="caja-negra">
		<div class="numeros">
			<span class="numero-activo">Registro de Usuario</span>
	    </div>
	</div>
<div class="caja-blanca">
	<form id="login" method="post" class="login" action="alta.php" novalidate>
        <input type="text" name="nombre" placeholder="Nombre y Apellido"  required>
		<input type="email" name="usuario" placeholder="Email"  required>
        <input type="password" name="pass" placeholder="Contraseña" required>

        <input type="submit" value="Entrar" class="boton entrada">
	</form>
    <h4>Las contraseñas deben cumplir los siguientes criterios:</h4>
    <ul class="lista">
        <li>Logintud 8 caracteres</li>
        <li>Al menos una mayúscula</li>
        <li>Al menos una minúscula</li>
        <li>Al menos un número</li>

    </ul>


</div>
</body>
</html>
