<?php  
namespace Controllers;
use MVC\Router;  
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManager as Image; 



class PropiedadController{
	public static function index (Router $router){

		$propiedades = Propiedad::all();

		$vendedores = Vendedor::all();



		// muestra mensaje condicional
		$resultado = $_GET['resultado'] ?? null;

		$router->render('propiedades/admin',[ 
			'propiedades' => $propiedades,
			'resultado' => $resultado,
			'vendedores' => $vendedores
		]);
	}

	public static function crear (Router $router){

		$propiedad = new Propiedad; 
		$vendedores = Vendedor::all();
		//Arreglo para el manejo de errores
		$errores=Propiedad::getErrores();

		if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
			//** Crea una nueva instacia
			$propiedad = new Propiedad($_POST['propiedad']);

			//Crear nombre aleatorio y unico

			$nombreImagen = md5(uniqid(rand(),true)).".jpg";

			//Realiza un resize a la imagen con intervetion 
			if($_FILES['propiedad']['tmp_name']['imagen']){
				$image = Image::gd()->read($_FILES['propiedad']['tmp_name']['imagen']);
				$image->resize(800,600);
			
				$propiedad->setImagen($nombreImagen);
			}
		
			//Validar 
			$errores = $propiedad->validar();

		
			if(empty($errores)){

				//Crear la carpeta para subir imagenes
				if (!is_dir(CARPETA_IMAGENES)){
					mkdir(CARPETA_IMAGENES);
				}

				// Guarda la imagen en el server
				$image->save(CARPETA_IMAGENES .$nombreImagen); 
			
				$propiedad->guardar();
			}	

		}
		

		$router->render('propiedades/crear', [
			'propiedad' => $propiedad,
			'vendedores' => $vendedores,
			'errores' => $errores
		]);
	}

	public static function actualizar (Router $router){

		$id = validarORedireccionar('/admin');
		$propiedad = Propiedad::find($id);
		$vendedores = Vendedor::all();
		$errores = Propiedad::getErrores();

		if ($_SERVER['REQUEST_METHOD'] === 'POST'){

		$args = $_POST['propiedad'];

		$propiedad->sincronizar($args);

		
		//Validaciones de las entradas 

		$errores = $propiedad->validar();

		//Nombre de la imagen
		$nombreImagen = md5(uniqid(rand(),true));

		
		//subida de archivos 

		if($_FILES['propiedad']['tmp_name']['imagen']){

			$image = Image::gd()->read($_FILES['propiedad']['tmp_name']['imagen']);
			$image->resize(800,600);
			
			$propiedad->setImagen($nombreImagen);

		}

		if(empty($errores)){

			//Almacenar la imagen
			if($_FILES['propiedad']['tmp_name']['imagen']){
				$image->save(CARPETA_IMAGENES .$nombreImagen);
			}
			
			$propiedad ->guardar();
		}

	} 

		$router->render('/propiedades/actualizar', [
			'propiedad' => $propiedad,
			'errores' => $errores,
			'vendedores' => $vendedores
		]);
	}

	public static function eliminar (){
		if ($_SERVER['REQUEST_METHOD'] === 'POST'){

			//Validar id 

			$id = $_POST['id'];
			$id = filter_var($id, FILTER_VALIDATE_INT);

			if($id){
				$tipo = $_POST['tipo'];
				if(validarTipoContenido($tipo)){
					$propiedad = Propiedad::find($id);
					$propiedad->eliminar();
				}
			}	
		}
	}
}