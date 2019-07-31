<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CargaArchivos extends CI_Controller {

	public function index() {
		$this->load->view('carga-archivos');
	}

	public function cargar() {
		$uploaddir = "uploads/";
		$uploadfile1 = $uploaddir.basename($_FILES['file1']['name']);
		$uploadfile2 = $uploaddir.basename($_FILES['file2']['name']);
		$resultado = new stdClass();
		$resultado->movimientoArchivo1 = move_uploaded_file($_FILES['file1']['tmp_name'], $uploadfile1);
		$resultado->movimientoArchivo2 = move_uploaded_file($_FILES['file2']['tmp_name'], $uploadfile2);
		$this->output->set_content_type('application/json')->set_output(
			json_encode($resultado)
		);
	}

}
