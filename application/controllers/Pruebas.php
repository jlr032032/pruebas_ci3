<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pruebas extends CI_Controller {

	public function index()
	{
		$this->load->view('home');
	}

	public function cargaArchivosView()
	{
		$this->load->view('carga-archivos');
	}
}
