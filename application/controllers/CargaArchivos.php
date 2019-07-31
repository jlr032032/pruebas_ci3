<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CargaArchivos extends CI_Controller {

	public function index()
	{
		$this->load->view('carga-archivos');
	}
	
	public function cargar()
	{
		$respuesta = new stdClass();
		$respuesta->files = $_FILES;
		$respuesta->post = $_POST;
		$this->output->set_content_type('application/json')->set_output(
			json_encode($respuesta)
		);
		/*$uploaddir = "uploads/";
		$uploadfile = $uploaddir . basename( $_FILES['file1']['name']);
		
		if(move_uploaded_file($_FILES['file1']['tmp_name'], $uploadfile)) {
			$this->output->set_content_type('application/json')->set_output(
				json_encode('{error: {$_FILES["file1"]["error"]}')
			);
		}
		else {
			$this->output->set_content_type('application/json')->set_output(
				json_encode('{error: {$_FILES["file1"]["error"]}')
			);
		}*/
	}
	
	public function cargar_()
	{
		$config['upload_path']   = './uploads/';
		$config['allowed_types'] = '*';
		$config['max_size']      = 1000;
		$config['max_width']     = 10240;
		$config['max_height']    = 7680;

		log_message('INFO','hola');

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('file1')) {
			$error = array('error' => $this->upload->display_errors());
			$this->output->set_content_type('application/json')->set_output(
				json_encode('{message: error}')
			);
			/*$this->load->view('upload_form', $error);*/
		}
		else {
			$data = array('upload_data' => $this->upload->data());
			$this->output->set_content_type('application/json')->set_output(
				json_encode($data)
			);
			/*$this->load->view('upload_success', $data);*/
		}
	}
}
