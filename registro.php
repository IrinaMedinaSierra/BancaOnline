<?php
	include "header.php"
	?>
	<div class="caja-negra">
		<div class="numeros">
			<span class="numero-activo">Iniciar Sesión</span>
	    </div>
	</div>
<div class="caja-blanca">
	<form id="login" method="post" class="login" action="alta.php" novalidate>
		<input type="email" name="usuario" placeholder="Email"  required>
        <input type="password" name="pass" placeholder="Contraseña" required>

        <input type="submit" value="Entrar" class="boton entrada">
	</form>
</div>
</body>
</html>
