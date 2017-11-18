<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends CI_Controller {


	//public function costruct
    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('url', 'form', 'array', 'html'));
        $this->load->model(array('PermisosModel', '',''));
    }
    //
	public function index()
	{
		$this->load->view('redes');
	}
	
    //
    public function listarPermisos()
    {
        $lista = $this->PermisosModel->listar();
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($lista);
    }
    //
    public function nuevoRol()
    {
        $nombre = $_POST['nombre'];
        $insert = $this->PermisosModel->insertar($nombre,$_POST['permisos']);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($insert);
    }
    //
    public function listarRoles()
    {
        $roles = $this->PermisosModel->listarRoles();
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($roles);
    }

    //
    public function listarUsuarios()
    {
        $usuarios = $this->PermisosModel->listarUsuarios();
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($usuarios);
    }
    public function listarPermisosUsuario()
    {
        $idusuario = $_POST['idusuario'];
        $datosP = $this->PermisosModel->listarPermisosUsuarios($idusuario);
        //print_r($datosUP);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($datosP);
    }
public function eliminarUsuario()
    {
        $idusuario = $_POST['iduser'];
        $datosP = $this->PermisosModel->cambiarEstadoUsuarios($idusuario);
        //print_r($datosP);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($datosP);
    }

    public function acceder()
    {
        $usuario = $_POST['user'];
        $contrasenia = $_POST['password'];
        $datos= $this->PermisosModel->verificarUsuario($usuario,$contrasenia);
        if($datos){
            $S_usuario= $this->PermisosModel->datosUsuario($usuario,$contrasenia);
            session_start();
            $_SESSION ['usuario'] = serialize($S_usuario);
            $this->index();
        }else{
            $mensaje = array('msg' => 'Usuario o Contraseña Incorrectos', 'tipo' => 'error');
            $this->load->view('login',$mensaje);
        }
    }

    function cerrarSesion() {
        session_start();
        unset($_SESSION ['usuario']);
        session_destroy();
        $this->load->view('login');
    }


}
