<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
img{
	margin-right: 1%;
	vertical-align: middle;
	width: 7%;
	border-radius: 50%;
}

a{

	text-decoration: 
}
.normal{
	width: 50%
}
#contenedor{
	margin:0 auto;
	width: 90%;
}

.info-par,.info-impar{
background: #FFB5A5;
margin-bottom: 1em;
width: 60%;
}

.info-par:hover,.info-impar:hover{
	background: #DADADA;
}

.info-impar{
background: #DDFFA5;
}
.icono{

	width: 3%;
}


</style>

</head>
<body>
	<script src="https://kit.fontawesome.com/11b44fb461.js" crossorigin="anonymous"></script>
	
	<?php 
	//mostrar contacto
	/*
	Desactivar cualquier notificacion
	error_reporting(0);
	
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE)
	
	Muestar todos excetp E_NOTICE

	error_reporting(e_ALL ^ E_NOTICE);

	Muestar todos

	error_reporting(e_ALL);

	*/
	//error_reporting(0);
	try {
		require('conexion.php');
	} catch (Throwable $t) {

		echo "<p>----------------</p>";
		echo "<p>Mensaje: ".$t->getMessage()."</p>";
		echo "<p>----------------</p>";
		exit();
	}

	try {
		//1.-conexion
		$conexion=mysqli_connect($servidor,$usuario,$password,$bbdd);
		mysqli_query($conexion,"SET NAMES 'UTF8'");
		if (mysqli_select_db($conexion,$bbdd)) {
			//3.- Definimo
			$consulta="SELECT * FROM contactos ORDER BY nombre,apellidos";
			//4.-Ejecutar la query
			$resultado=mysqli_query($conexion,$consulta);

			//5.-Pintamos
			$contador=0;
			while($fila=mysqli_fetch_array($resultado)){
				$contador++;
				
				if ($contador%2==0) {
					echo "<section class='info-par'>";

				}else{
					echo "<section class='info-impar'>";

				} 

				$ruta="media/".$fila['foto'];
				$ruta_error="media/nd.png";
				if (file_exists($ruta)) {
					echo "<img class='fotoPerfil' src='$ruta'></img>";
				}else if(file_exists($ruta_error)){
					echo "<img class='fotoPerfil' src='$ruta_error'></img>";
				}else{
					echo "<h2>ha habido un error al cargar</h2>";
				}
				//editar
				echo "<a href='editarContacto.php?opcion=update&cod_contacto=$fila[cod_contacto]&nombre=$fila[nombre]&apellidos=$fila[apellidos]&mail=$fila[mail]&telefono=$fila[telefono]&observaciones=$fila[observaciones]&foto=$fila[foto]&agregarFoto' title='ver ficha'><img class='icono' src='media/icono/edit-2.svg'><img><a>";
				//borrar
				echo "<a href='actualizarDatos.php?opcion=delete&cod_contacto=$fila[cod_contacto]&nombre=$fila[nombre]&apellidos=$fila[apellidos]'><img class='icono' src='media/icono/trash.svg'><img><a>";

				//mostrar
				echo "<a href='mostrar_ficha.php?cod_contacto=$fila[cod_contacto]&nombre=$fila[nombre]&apellidos=$fila[apellidos]&mail=$fila[mail]&telefono=$fila[telefono]&observaciones=$fila[observaciones]&foto=$fila[foto]' title='ver ficha'>$fila[nombre]</a>";

				echo "</section>";





			}
			//insertar contacto
			echo "<a href='subirFoto.php?opcion=insert'><img class='icono' src='media/icono/plus-circle.svg'><img><a>";

		}
	
	

	} catch (mysqli_sql_exception $mse) {
		echo "<p>Nº del error: ".$mse->getCode()."</p>";
		echo "<p>mesaje del error: ".$mse->getMessage()."</p>";

	}


	


	?>


</body>
</html>