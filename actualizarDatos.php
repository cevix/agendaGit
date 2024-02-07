<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <?php 

if (!empty($_POST['enviar'])) {
			
			//extract($_FILES);
			foreach($_FILES['archivo'] as $propiedad => $valor) {
				echo "<p>Propiedad: $propiedad --- Valor:$valor</p>";
			}
			if (!file_exists("media/")) {
				mkdir("media/",0777);
			}
			$nombreFoto=$_FILES['archivo']['name'];
			$archivo=$_FILES['archivo']['tmp_name'];
			$tipo=$_FILES['archivo']['type'];
			$size=$_FILES['archivo']['size'];
			$destino="media/".$nombreFoto;
				//solo permitimos imagenes de hasta 5mb
			if (($tipo=="image/jpeg" && $size< 1024*1024*5)|| ($tipo=="application/pdf" || $tipo=="application/vnd.openxmlformats-officedocument.wordprocessingml.document" && $size< 1024*1024*2) || ($tipo=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" && $size< 1024*1024) ||($tipo=="text/plain" && $size< 1024*1024)) {
				if (!file_exists($destino)) {
					//No existe --> lo subimos
					// Es un archivo permitido
						if (move_uploaded_file($archivo,$destino)) {
							echo "Ok";
						}else{
							echo "Error...";
						}
				}else{
					echo "<p>Ya existe un archivo con ese nombre</p>";
					echo "<a href='subirFoto.php'>volver a subir foto<a>";
					//echo "<buton onclick='cancelar()'>Elija otro archivo</button>";
				}

				
			}else{
				echo "solo se permite subir archivos hata 5 MB";
			}

		}else{
			$nombreFoto="nd";
		}



//actualizarDatos.php
if (isset($_GET)) {
	extract($_GET);
}else{
	extract($_POST);
}

//realizar la conexion
try {
	require('conexion.php');
		//1.-conexion
		$conexion=mysqli_connect($servidor,$usuario,$password,$bbdd);
		mysqli_query($conexion,"SET NAMES 'UTF8'");
		if (mysqli_select_db($conexion,$bbdd)) {
			//3.- Definimos
			//aqui es donde compruebo que tipo de consulta realizare
			if ($opcion=="update") {
				if ($comprobarFoto=="none") {
					$consulta="UPDATE contactos SET nombre='$nombre',apellidos='$apellidos',mail='$mail',telefono='$telefono',observaciones='$observaciones' WHERE cod_contacto=$cod_contacto";
				}else{
					$consulta="UPDATE contactos SET nombre='$nombre',apellidos='$apellidos',mail='$mail',telefono='$telefono',observaciones='$observaciones',foto='$nombreFoto' WHERE cod_contacto=$cod_contacto";
				}
				
			}else if($opcion=="insert"){
				$consulta="INSERT INTO contactos(nombre, apellidos, mail, telefono, observaciones, foto) VALUES ('$nombre','$apellidos','$mail','$telefono','$observaciones','$nombreFoto')";

			}else if($opcion=="delete"){
				$consulta="DELETE FROM contactos WHERE cod_contacto='$cod_contacto' AND nombre='$nombre'";
			}
			
			//4.-Ejecutar la query
			$resultado=mysqli_query($conexion,$consulta);
			//compruebo que la query no tenga fallo
			if ($resultado) {
				echo "<h2>Se ha actualizado el Contacto correctamente</h2>";
			}else{
				echo "<h2>ha habido un error al actualizar el contacto</h2>";
			}
		}

	} catch (mysqli_sql_exception $mse) {
		echo "<p>Nº del error: ".$mse->getCode()."</p>";
		echo "<p>mesaje del error: ".$mse->getMessage()."</p>";

	}

//realizo el update

?>	

<button><a href="mostraContacto.php">Volver a contactos</a></button>

</body>
</html>


