
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<!--
	<form action='actualizarDatos.php' method='get'>
		<input type='hidden' name='cod_contacto' value='$cod_contacto'>
		<label>nombre:</label><input type='text' name='nombre' value='$nombre'>
		<label>apellidos:</label><input type='text' name='apellidos' value='$apellidos'>
		<label>mail:</label><input type='mail' name='mail' value='$mail'>
		<label>teléfono:</label><input type='number' name='telefono' value='$telefono'>
		<label>observaciones:</label><input type='text' name='mail' value='$observaciones'>
		<input type="submit" name="enviar">
		<a href=""><input type="button" name="borrar"></a>
	</form>
	<button><a href="">volver</a></button>
	
	-->


	<?php  

	/*<h1>¿Quieres modificar la foto?</h1>
	<form>
		<label>Si</label><input type="checkbox" id="imgpregunta" name="preguntar" value="no">
		<label>No</label><input type="checkbox" id="imgpregunta" name="preguntar" value="si">
	</form>
	*/

	//editarContacto.php
	
	if (isset($_GET['agregarFoto'])) {
		extract($_GET);
		echo "
		<h1>¿Quieres modificar la foto?</h1>
			<form action='editarContacto.php' method='get'>
				<input type='hidden' name='cod_contacto' value='$cod_contacto'>
				<input type='hidden' name='opcion' value='$opcion'>
				<input type='hidden' name='nombre' value='$nombre'>
				<input type='hidden' name='apellidos' value='$apellidos'>
				<input type='hidden' name='mail' value='$mail'>
				<input type='hidden' name='telefono' value='$telefono'>
				<input type='hidden' name='observaciones' value='$observaciones'>
				<label>Si</label><input type='radio' name='preguntar' value='si'>
				<label>No</label><input type='radio' name='preguntar' value='no'>
				<input type='submit' name='enviar'>
			</form>
				";


	}else{
		if ($_GET['preguntar']=="si") {
			extract($_GET);
		echo "
		<h1>¿Quieres modificar la foto?</h1>
			<form action='actualizarDatos.php' method='get' enctype='multipart/form-data'>
				<input type='hidden' name='cod_contacto' value='$cod_contacto'>
				<input type='hidden' name='comprobarFoto' value='full'>
				<input type='hidden' name='opcion' value='$opcion'>
				<input type='file' name='foto>
				<label>nombre:</label><input type='text' name='nombre' value='$nombre'>
				<label>apellidos:</label><input type='text' name='apellidos' value='$apellidos'>
				<label>mail:</label><input type='mail' name='mail' value='$mail'>
				<label>teléfono:</label><input type='number' name='telefono' value='$telefono'>
				<label>observaciones:</label><input type='text' name='observaciones' value='$observaciones'>
				<input type='submit' name='enviar'>
			</form>
		<button><a href='mostraContacto.php'>volver</a></button>";

		}else{
		extract($_GET);
		echo "
		<h1>¿Quieres modificar la foto?</h1>
			<form action='actualizarDatos.php' method='get'>
				<input type='hidden' name='cod_contacto' value='$cod_contacto'>
				<input type='hidden' name='opcion' value='$opcion'>
				<input type='hidden' name='comprobarFoto' value='none'>
				<label>nombre:</label><input type='text' name='nombre' value='$nombre'>
				<label>apellidos:</label><input type='text' name='apellidos' value='$apellidos'>
				<label>mail:</label><input type='mail' name='mail' value='$mail'>
				<label>teléfono:</label><input type='number' name='telefono' value='$telefono'>
				<label>observaciones:</label><input type='text' name='observaciones' value='$observaciones'>
				<input type='submit' name='enviar'>
			</form>
		<button><a href='mostraContacto.php'>volver</a></button>";

		}
		
	}


	//extract($_GET);
	//formulario para cambiar los datos
	


	/*
	echo "
	<form action='actualizarDatos.php' method='get'>
		<input type='hidden' name='cod_contacto' value='$cod_contacto'>
		<input type='hidden' name='opcion' value='$opcion'>
		<label>nombre:</label><input type='text' name='nombre' value='$nombre'>
		<label>apellidos:</label><input type='text' name='apellidos' value='$apellidos'>
		<label>mail:</label><input type='mail' name='mail' value='$mail'>
		<label>teléfono:</label><input type='number' name='telefono' value='$telefono'>
		<label>observaciones:</label><input type='text' name='observaciones' value='$observaciones'>
		<input type='submit' name='enviar'>
	</form>
	<a href='mostar_contacto_eugenie.php'><button>volver</button></a>
	";
	*/





	?>

	
</body>
</html>
