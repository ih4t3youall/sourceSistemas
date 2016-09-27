<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('inicio');
	}
	
	
	public function principal(){
		
		
		$this->load->view('presentacion');
	}
	
	public function contacto(){
		
		$data = array(
				'nombre' => $_POST['name'],
				'mail' => $_POST['email'],
				'asunto'=> $_POST['subject'],
				'texto'=> $_POST['message'],
				'leido'=> 'false'
		);
		
	

		$file = fopen("snipplets/sourcesistemas/consultas", "a+");
		
		fwrite($file, json_encode($data) . PHP_EOL);
		
		
		fclose($file);
		
		$this->load->view('consultaExito');
		
		
		
		
		
	}
	
	public function leer(){
		
		
		$file = fopen("snipplets/sourcesistemas/consultas", "r");
		
		while(!feof($file)) {
			$aux = fgets($file);
		if($aux != ""){
			$nose = json_decode($aux);
			echo '</br>';
			echo $nose->nombre;
			echo '</br>';
			echo $nose->mail;
			echo '</br>';
			echo $nose->asunto;
			echo '</br>';
			echo $nose->texto;
			echo '</br>';
			echo $nose->leido;
			echo '</br>';
		}
			
				
		
		}
		
		fclose($file);
		
		
		
		
	}
	
	
}
