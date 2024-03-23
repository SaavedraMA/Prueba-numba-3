<?php 
	if(!isset($_SESSION)){
		session_start();
	}
 
	$auth = $_SESSION['login'] ?? false;

	if(!isset($inicio)){
		$inicio = false;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<title class="titulo"> Bienes Raices</title>
	<link rel="stylesheet"  href="/build/css/app.css">
</head>
<body>

	<header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
		<div class="contenedor contenido-header">
			<div class="barra">
				<a href="/admin">
					<img src="/build/img/logo.svg" class="logotipo" alt="Logotipo de Bienes Raices">
				</a>

				<div class="mobile-menu">
					<img src="/build/img/barras.svg" alt="icono menu responsive">
				</div>

				<div class="derecha">	
					<img class="dark-mode-boton" src="/build/img/dark-mode.svg">
					<nav class="navegacion">
						<a href="/nosotros">Nosotros</a>
						<a href="/propiedades">Anuncios </a>
						<a href="/blog">Blog</a>
						<a href="/contacto">Contactos</a>
						<?php if($auth): ?>
							<a href="/logout">Cerrar Sesion</a>
						<?php endif; ?>	
						<?php if(!$auth): ?>
							<a href="/login">Iniciar Sesion</a>
						<?php endif; ?>	

				 	</nav>
					
				</div>

			</div>
			
			<?php if($inicio){ ?>

				<h1> Ventas de Casas y Departamentos Exclusivos de Lujo</h1>

			<?php } ?>	
		</div>
	</header>
<!------------------PHP para la pagina maestra ------------>	

<?php echo $contenido; ?>
<!------------------Aqui termina el header e inicia el footer ------------>


<footer class="footer seccion">
			<div class="contenedor contenedor-footer">
				<nav class="navegacion">
						<a href="/nosotros">Nosotros</a>
						<a href="/propiedades">Anuncios </a>
						<a href="/blog">Blog</a>
						<a href="/contacto">Contactos</a>
				</nav>
			</div>

			<p class="copyright"> Todos los derechos Reservados <?php echo date('Y'); ?> &copy;</p>
		</footer>
		<script src="build/js/bundle.min.js"></script>
	</body>
</html>