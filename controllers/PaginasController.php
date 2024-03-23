<?php 

namespace Controllers;
use MVC\Router;  
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController {

	public static function index (Router $router){

		$propiedades = Propiedad::get(3);
		$inicio = true;

		$router ->render('paginas/index',[
			'propiedades' => $propiedades,
			'inicio' => $inicio
		]);
	}


	public static function nosotros (Router $router){
		$propiedades = Propiedad::get(3);
	
		$router ->render('paginas/nosotros',[
			
		]);
	}

	public static function propiedades (Router $router){
		$propiedades = Propiedad::get(3);


		$router ->render('paginas/propiedades',[
			'propiedades' => $propiedades,
		]);
	}

	
	public static function propiedad (Router $router){

		$id = validarORedireccionar('/propiedades');

		$propiedad = Propiedad::find($id);

		$router ->render('paginas/propiedad',[
			'propiedad' => $propiedad
		]);
	}
	
	public static function blog (Router $router){

		$router ->render('paginas/blog',[
			
		]);
	}
	
	public static function entrada (Router $router){
	
		$router ->render('paginas/entrada',[
			
		]);
	}
	
	public static function contacto (Router $router){

		$mensaje = null;

		if($_SERVER['REQUEST_METHOD'] === 'POST'){
		
			$respuestas=$_POST['contacto'];

			// Crear una instancia de phpmailer 
			$mail = new PHPMailer();

			// Configurar MTP
			$mail->isSMTP();
			$mail->Host = 'sandbox.smtp.mailtrap.io';
			$mail->SMTPAuth = true;
			$mail->Port = 2525;
			$mail->Username = 'fd6caaaa6b4018';
			$mail->Password = '97dec33351daf1';
			$mail->SMTPSecure = 'tls';


			//configurar el contenido del email 

			$mail->setFrom('admin@bienesraices.com');
			$mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
			$mail->Subject = 'Tienes un nuevo mensaje';

			//Habilitar HTML

			$mail->isHTML(true);
			$mail->CharSet= 'UTF-8';

			//Definir el contenido

			$contenido = '<html>'; 
			$contenido.=  '<p>Tienes un nuevo mensaje</p>';
			$contenido.=  '<p>Nombre: '. $respuestas['nombre'] .'</p>';

			// Enviar de forma condicional algunos campos de email o telefono

			if($respuestas['contacto'] === 'telefono'){
				$contenido.=  '<p>Eligio ser contactado por Telefeno: ';
				$contenido.=  '<p>Telefono: '. $respuestas['telefono'] .'</p>';
				$contenido.=  '<p>Fecha contacto: '. $respuestas['fecha'] .'</p>';
				$contenido.=  '<p>Hora: '. $respuestas['hora'] .'</p>';
			}else{
				$contenido.=  '<p>Eligio ser contactado por Email: ';
				$contenido.=  '<p>email: '. $respuestas['email'] .'</p>';

			}

			
			$contenido.=  '<p>Mensaje: '. $respuestas['mensaje'] .'</p>';
			$contenido.=  '<p>Vende o Compra: '. $respuestas['tipo'] .'</p>';
			$contenido.=  '<p>Precio o Presuspuesto: $'. $respuestas['precio'] .'</p>';
			$contenido.=  '<p>Contacto: '. $respuestas['contacto'] .'</p>';
			
			$contenido.=  '</html>';	

			$mail->Body = $contenido;
			$mail->AltBody = 'Esto es texto alternativo sin HTML';


			//Enviar el email

			if($mail->send()){
				$mensaje = "Mensaje enviado";
			}else{
				$mensaje = "El mensaje no se pudo enviar";
			}



		}
	
		$router ->render('paginas/contacto',[
			'mensaje' => $mensaje
		]);
	}
	
}	
