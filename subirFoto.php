<?php
//subirFoto.php
extract($_GET);

echo "<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>


<body>
	<h3>Sube Tu foto de perfil</h3>
	
	<form name='formulario' action='actualizarDatos.php' method='get' enctype='multipart/form-data'>
		<input type='hidden' name='opcion' value='$opcion'>
		<input type='file' name='archivo'>
		<label>nombre:</label><input type='text' name='nombre'>
		<label>apellidos:</label><input type='text' name='apellidos'>
		<label>mail:</label><input type='mail' name='mail'>
		<label>teléfono:</label><input type='number' name='telefono'>
		<label>observaciones:</label><input type='text' name='observaciones'>
		<input type='submit' name='enviar' value='Subir archivo'>
	</form>
	<a href='mostraContacto.php'><button>volver</button></a>
</body>
</html>";



?>