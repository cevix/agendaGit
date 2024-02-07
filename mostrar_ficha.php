<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		*{
			margin: 0 auto;
		}
		main{
			background: #8BDAFF;
			border-radius:2rem;

		}
		section{
			margin:1.5rem;
			display: flex;
			flex-direction: column;
			justify-content: center;
		}
		img,p{
			margin-bottom: 1rem;

		}

	</style>
</head>
<body>

	<section id="contenedor">
		<header>
			
			<nav>
				
			</nav>

		</header>
		<main>
			<section>
			<?php
			//mostrar_ficha.php

			if (isset($_GET['cod_contacto'])) {
			 	extract($_GET);

			 	echo "<section id='ficha'>";
			 		$ruta="media/".$foto;
					$ruta_error="media/nd.png";
					if (file_exists($ruta)) {
						echo "<img src='$ruta'></img>";
					}else if(file_exists($ruta_error)){
						echo "<img src='$ruta_error'></img>";
					}else{
						echo "<ha habido un error al cargar>";
					}

			 		echo "<div>";
			 		echo "<p>Nombre:$nombre</p>";
			 		echo "<p>Apellidos: $apellidos</p>";
			 		echo "<p>telefono: $telefono</p>";
			 		echo "<p>Mail: $mail</p>";
			 		echo "<p>Observaciones: $observaciones</p>";
			 		echo "<button ><a href='mostraContacto.php'>Volver curso</a></button>";
			 		echo "<div>";
					echo "</section>";	
			 } 

			

			?>
			
			
				
			</section>

		</main>

		<footer>
			
		</footer>
		

	</section>

</body>
</html>