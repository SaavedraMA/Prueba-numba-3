<main class="contenedor seccion"> 
		<h1>Contacto</h1>

		<?php if($mensaje){ ?>

			<p class="alerta exito"> <?php echo $mensaje;  ?></p>

		<?php }?>

		<picture>
					<source srcset="build/img/destacada3.webp" type="image/webp">
					<source srcset="build/img/destacada3.jpg" type="image/jpeg">
					<img loading="lazy" src="build/img/destacada3.jpg" alt="Texto Entrada Blog">

		</picture>

		<h2>Llene el Formulario de contacto</h2>

		<form class="formulario" method="POST" action="/contacto">
			
			<fieldset>
				 <legend>Informacion Personal</legend>

				 <label for="nombre">Nombre: </label>
				 <input type="text" id="nombre" name ="contacto[nombre]" placeholder="Tu nombre" required>

				 <label for="mensaje">Mensaje:</label>
				 <textarea id="mensaje" name="contacto[mensaje]" required ></textarea>

			</fieldset>


			<fieldset>
				 <legend>Informacion sobre la propiedad</legend>

				 <label for="opciones">Vende o Compra: </label>
				 <select id="opciones" name="contacto[tipo]" required>

				 	<option value="" disabled selected>--Seleccione --</option>
				 	<option value="Compra">Compra</option>
				 	<option value="Vende">Vende</option>

				 </select>	

				 <label for="presupuesto">Presupuesto: </label>
				 <input type="number" id="tu precio o presupuesto" name ="contacto[precio]"placeholder="presupuesto" required >

			</fieldset>


			<fieldset>
				 <legend>Informacion sobre la propiedad</legend>

				 <p>¿Como desea ser contactado?</p>

				 <div class="forma-contacto">
				 	<label for="contactar-telefono"> Telefono</label>
				 	<input name="contacto[contacto]" type="radio" value="telefono" id="contactar-telefono" required >

				 	<label for="contactar-email">Email</label>
				 	<input name="contacto[contacto]" type="radio" value="email" id="contactar-email" required >
				 </div>	

				 <div id="contacto">  </div>

			</fieldset>


		<input type="submit" value="enviar" class="boton-verde">

		</form>

	</main>