<main class="contenedor seccion contenido-centrado"> 
		<h1>Iniciar Sesion</h1>

		<?php foreach ($errores as $error): ?>
			<div class="alerta error">

				<?php echo $error;?>

			 </div>

		<?php endforeach; ?>



		<form  class="formulario" method="POST" action="/login" >

		<fieldset>
				 <legend>E-mail y Password</legend>

				 <label for="email">E-Mail: </label>
				 <input type="email" name="email" id="email" placeholder="Tu email"
				 >

				 <label for="password">Password: </label>
				 <input type="password" name="password" id="email" placeholder="Tu pasword" >

		</fieldset> 

		<input type="submit" value="Inicia Session" class="boto boton-verde" name="">
        <!-------<pre></pre> ---------->
		</form>
	</main>
