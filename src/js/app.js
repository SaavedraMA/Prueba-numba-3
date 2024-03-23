document.addEventListener('DOMContentLoaded',  function(){

	eventListeners();

	darkMode();
});
	

	function darkMode(){

		const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)'); 


		if(prefiereDarkMode){
			document.body.classList.add('dark-mode');
		}else {
			document.body.classList.remove('dark-mode');
		}

		prefiereDarkMode.addEventListener('change', function(){
			
			if(prefiereDarkMode){

			document.body.classList.add('dark-mode');

			}else {

			document.body.classList.remove('dark-mode');

			}
		});

		 const botonDarkMode = document.querySelector('.dark-mode-boton');

		 botonDarkMode.addEventListener('click', function(){

		 	document.body.classList.toggle('dark-mode');

		 });
	}

function eventListeners(){
	const mobileMenu = document.querySelector('.mobile-menu');

	mobileMenu.addEventListener('click', navegacionResponsive);

	// Muestar campos condicionales

	const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');

	metodoContacto.forEach(input=> input.addEventListener('click', mostrarMetodosContacto));

}

function mostrarMetodosContacto(e){
	const contactoDiv = document.querySelector('#contacto');

	if(e.target.value === 'telefono'){
		contactoDiv.innerHTML = `

		<label for="telefono">Telefono: </label>
		<input type="tel" id="telefono" name ="contacto[telefono]" placeholder="Tu telefono">

		<p>Elija la fecha y la hora para la llamada</p>

			<label for="fecha"> Fecha </label>
			<input type="date" name ="contacto[fecha]" required>

			<label for="hora"> Hora </label>
			<input type="time" id="hora" name="contacto[hora]" min="09:00" max="18:00" required> 


		`;
	} else{
		contactoDiv.innerHTML = `
		
		 	<label for="email">E-Mail: </label>
			<input type="email" id="email" name ="contacto[email]" placeholder="Tu email" >

		`;
	}

}

	

function navegacionResponsive (){
	const navegacion = document.querySelector('.navegacion');
   		navegacion.classList.toggle('mostrar')
}


