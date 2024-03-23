	<main class="contenedor seccion"> 
		<h1> Mas sobre Nosotros</h1>
			<?php include 'iconos.php' ?>
	</main>

	<section class="seccion contenedor">
		
		<h2>Casas y Depas en Venta</h2>
        
 <!-- Arriba estan todos los anuncios -->
       
		<?php
		 include 'listado.php' 

		 ?>
<!-- Arriba estan todos los anuncios -->

		<div class="alinear-derecha">
			<a href="/propiedades" class="boton-verde" >Ver todas </a>
			
		</div>

	</section>

	<section class="imagen-contacto"> 
		<h2>Encuentra la casa de tu sueños</h2>
		<p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo</p>
		<a href="contacto.php" class="boton-amarillo">Contactános</a>

	</section>

	<!--- Trabajo del video 290, trabajando con el blog y los testimoniales -->

	<div class="contenedor seccion seccion-inferior">
		<section class="blog">
			<h3>Nuestro Blog</h3>

			<article class="entrada-blog">
				<div class="imagen">
					
					<picture>
						<source srcset="build/img/blog1.webp" type="image/webp">

						<source srcset="build/img/blog1.jpg" type="image/jpeg"
						>

						<img loading="lazy" src="build/img/blog1.jpg"
						alt="Texto Entrada Blog">

					</picture>
				</div>
				<div class="texto-entrada">
					<a href="entrada.php">
						<h4> Terraza en el techo de tu casa</h4>

						<p class="informacion-meta">Escrito el <span> 07/03/2024</span> por: <span> Admin</span></p>

						<p> 
							Consejos para cosntruir una terraza en el techo de tu casa, con los mejores materiales y ahorrando dinero.
						</p>
					</a>
				</div>
			</article>
<!-- Segundo articulo del blog -->


			<article class="entrada-blog">
				<div class="imagen">
					
					<picture>
						<source srcset="build/img/blog2.webp" type="image/webp">

						<source srcset="build/img/blog2.jpg" type="image/jpeg">

						<img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">

					</picture>
				</div>
				<div class="texto-entrada">
					<a href="entrada.php">
						<h4> Guia para la decoracion de tu hogar</h4>

						<p class="informacion-meta">Escrito el <span> 14/01/2024</span> por: <span> Juanito</span></p>

						<p> 
							Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
						</p>
					</a>
				</div>
			</article>
		</section>


<!-- Testimoniales, trabajo del video 290 -->

		<section class="testimoniales">
			<h3>Testimoniales</h3>

			<div class="testimonial"> 
				<blockquote> 
					El personal se comportó de una excelente forma, muy buena atencion y la casa que me ofrecieron cumple con todas mis expectativas.
				</blockquote>

				<p> - Juan De la Torre</p>

			</div>
		</section>		
	</div>