<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {


	//public function costruct
    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('url', 'form', 'array', 'html'));
        $this->load->model(array('UsuariosModel', '',''));
    }
    //
	public function index()
	{
		$this->load->view('');
	}
    
    public function listarUsuarios()
    {
        $roles = $this->UsuariosModel->listar();
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($roles);
    }

    function cerrarSesion() {
        session_start();
        unset($_SESSION ['usuario']);
        session_destroy();
        $this->load->view('login');
    }


}
