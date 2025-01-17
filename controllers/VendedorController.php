<?php 

namespace Controllers;
use MVC\Router;  
use Model\Propiedad;
use Model\Vendedor;


class VendedorController {

	public static function crear (Router $router){

		$errores=Vendedor::getErrores();

		$vendedor = new Vendedor; 
		//Arreglo para el manejo de errores

		if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
			//Crear una nueva instancia 	
			$vendedor = new Vendedor($_POST['vendedor']);

			// Validar que no haya campos vacios
			$errores = $vendedor->validar();

			// No hay errores 

			if(empty($errores)){
				$vendedor->guardar();
			}

		}
		

		$router->render('vendedores/crear', [
			'errores' => $errores,
			'vendedor' => $vendedor

		]);
	}

	public static function actualizar (Router $router){

		$errores = Vendedor::getErrores();
		$id = validarORedireccionar('/admin');

		// obtenemos los datos del vendedor 
		$vendedor = Vendedor::find($id);



		if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    		//Asignar los valores

    		$args = $_POST['vendedor'];

    		// Sincronizar el objeto en memoria con lo que el usuario ingrese
    		$vendedor->sincronizar($args);
    		// Validar las entradas 
    		$errores = $vendedor->validar();

    		// No hay errores 

    		if(empty($errores)){
        		$vendedor->guardar();
    		}

		}	


		$router->render('/vendedores/actualizar', [
			'errores' => $errores,
			'vendedor' => $vendedor
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
					$vendedor = Vendedor::find($id);
					$vendedor->eliminar();
				}
			}	
		}
	}
}