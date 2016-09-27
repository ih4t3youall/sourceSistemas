<?php

defined('BASEPATH') OR exit('No direct script access allowed');

	require APPPATH . '/libraries/REST_Controller.php';

class Snipplet_Webservice extends REST_Controller {

	function guardar_archivo_get()
	{

	}


	function guardar_archivo_post()
	{


		$data = file_get_contents("php://input");
		$respuesta = json_decode($data);
		$nombreCarpeta = $respuesta->username;

		$existeCarpeta = file_exists("snipplets/".$nombreCarpeta);

		if($existeCarpeta){


		}else{
			mkdir ("snipplets/".$respuesta->username, 0777);

		}

		$file = fopen("snipplets/".$respuesta->username."/".$respuesta->categoriaDTO->nombre, "w");
		fwrite($file, json_encode($respuesta->categoriaDTO));
		fclose($file);


		$this->response("Upload successful.", 200);


	}



	function download_post()
	{


		$data = file_get_contents("php://input");
		$respuesta = json_decode($data);
		$nombre = $respuesta->username;
		$file = fopen("snipplets/".$respuesta->username."/".$respuesta->categoriaDTO->nombre, "r");
		$aux="";
		while(!feof($file)) {
			$aux = fgets($file);
		}


		fclose($file);
		// 		$this->response($nombre, 200);
		$this->response(json_decode($aux), 200);


	}


	function eliminar_archivo_post(){
		$data = file_get_contents("php://input");
		$request = json_decode($data);

		$nombre = $request->categoriaDTO->nombre;
		$this->response($nombre, 200);
	}

	function source_sistemas_post(){


		$data = file_get_contents("php://input");
		$respuesta = json_decode($data);

		$file = fopen("snipplets/".$respuesta->username."/consultas", "r");
		$array = array();


		while(!feof($file)) {
			$aux = fgets($file);
			if($aux != ""){
				$nose = json_decode($aux);
// 				echo '</br>';
// 				echo $nose->nombre;
// 				echo '</br>';
// 				echo $nose->mail;
// 				echo '</br>';
// 				echo $nose->asunto;
// 				echo '</br>';
// 				echo $nose->texto;
// 				echo '</br>';
// 				echo $nose->leido;
// 				echo '</br>';
			array_push($array,$nose);
			}


		}

		fclose($file);
		unlink ("snipplets/".$respuesta->username."/consultas");
		$filecreado =fopen("snipplets/".$respuesta->username."/consultas","a");
		fclose($filecreado);





		$this->response($array, 200);

	}
function listar_archivos_post()
{

	$data = file_get_contents("php://input");
	$respuesta = json_decode($data);


	$directorio = opendir("snipplets/".$respuesta->username); //ruta actual
	$devolver="";
	$array = array();

	while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
	{
		if (is_dir($archivo))//verificamos si es o no un directorio
		{
			$devolver.= "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes

		}
		else
		{
			$archivo . "<br />";
			array_push($array,$archivo);
		}
	}

	$this->response($array, 200);


}

}

?>
