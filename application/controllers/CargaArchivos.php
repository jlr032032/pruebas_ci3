<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CargaArchivos extends CI_Controller {

	public function index() {
		$this->load->view('carga-archivos');
	}

	public function cargarConPHP() {
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

	public function cargarConCI3() {
		$resultado = new stdClass();
		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'gif|jpg|png|txt';
		$config['max_size'] = 2000;
		$config['max_width'] = 300;
		$config['max_height'] = 300;
		$this->load->library('upload', $config);
		$resultado->movimientoArchivo1 = new stdClass();
		$resultado->movimientoArchivo2 = new stdClass();
		$this->upload->do_upload('file1');
		$resultado->movimientoArchivo1->error = $this->upload->display_errors();
		$resultado->movimientoArchivo1->data = $this->upload->data();
		$this->upload->do_upload('file2');
		$resultado->movimientoArchivo2->error = $this->upload->display_errors();
		$resultado->movimientoArchivo2->data = $this->upload->data();
		$this->output->set_content_type('application/json')->set_output(
			json_encode($resultado)
		);
	}

}
