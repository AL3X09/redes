<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MensajeController extends CI_Controller {


	//public function costruct
    public function __construct() {
        parent:: __construct();
        $this->load->helper(array('url', 'form', 'array', 'html'));
        $this->load->model(array('DatagramaModel', '',''));
    }
    //
	public function index()
	{
		$this->load->view('viewdatamensaje');
	}
   
    //llamo vista de formulirio para el mensaje
    public function viewMensajeCodificado()
    {
        $this->load->view('viewdatamensajecodificado');
    }
    
    //llamo fucion de formulirio para enviar datagrama a la base de datos
    public function ernviarDatagrama()
    {
        
        $versionarray = explode('.', $_POST['version']);
        $cabeceraarray = explode('.', $_POST['cabecera']);
        $tipoServicioarray = explode('.', $_POST['tipoServicio']);
        $longitudTarray = explode('.', $_POST['longitudT']);
        $identificacionarray = explode('.', $_POST['identificacion']);
        $flagarray = explode('.', $_POST['flag']);
        $offsetarray = explode('.', $_POST['offset']);
        $ttlarray = explode('.', $_POST['ttl']);
        $protocoloarray = explode('.', $_POST['protocolo']);
        $checksumarray = explode('.', $_POST['checksum']);
        $arrayip1 = explode('.', $_POST['ip1']);
        $arraymsj = explode(',', $_POST['msj2']);
        $arrayip2 = explode('.', $_POST['destinario']);
        $versionres = array();
        $cabecerares = array();
        $tipoServiciores = array();
        $longitudTres = array();
        $identificacionres = array();
        $flagres = array();
        $offsetres = array();
        $ttlres = array();
        $protocolores = array();
        $checksumres = array();
        $ip1res = array();
        $msjres = array();        
        $ip2res = array();

        foreach ($versionarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 4, "0", STR_PAD_LEFT);//no funcional
            array_push($versionres, str_pad($deco, 4, "0", STR_PAD_LEFT));
        }

        foreach ($cabeceraarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 4, "0", STR_PAD_LEFT);//no funcional
            array_push($cabecerares, str_pad($deco, 4, "0", STR_PAD_LEFT));
        }

        foreach ($tipoServicioarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 8, "0", STR_PAD_LEFT);//no funcional
            array_push($tipoServiciores, str_pad($deco, 8, "0", STR_PAD_LEFT));
        }

        foreach ($longitudTarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 16, "0", STR_PAD_LEFT);//no funcional
            array_push($longitudTres, str_pad($deco, 16, "0", STR_PAD_LEFT));
        }

        foreach ($identificacionarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 16, "0", STR_PAD_LEFT);//no funcional
            array_push($identificacionres, str_pad($deco, 16, "0", STR_PAD_LEFT));
        }
        foreach ($flagarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 3, "0", STR_PAD_LEFT);//no funcional
            array_push($flagres, str_pad($deco, 3, "0", STR_PAD_LEFT));
        }
        foreach ($offsetarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 13, "0", STR_PAD_LEFT);//no funcional
            array_push($offsetres, str_pad($deco, 13, "0", STR_PAD_LEFT));
        }
        foreach ($ttlarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 8, "0", STR_PAD_LEFT);//no funcional
            array_push($ttlres, str_pad($deco, 8, "0", STR_PAD_LEFT));
        }
        foreach ($protocoloarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 8, "0", STR_PAD_LEFT);//no funcional
            array_push($protocolores, str_pad($deco, 8, "0", STR_PAD_LEFT));
        }
        foreach ($checksumarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 16, "0", STR_PAD_LEFT);//no funcional
            array_push($checksumres, str_pad($deco, 16, "0", STR_PAD_LEFT));
        }

        foreach ($arrayip1 as $k => $value) {
            //echo "string".$value;
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 8, "0", STR_PAD_LEFT);//no funcional
            array_push($ip1res, str_pad($deco, 8, "0", STR_PAD_LEFT));
            
        }
        foreach ($arraymsj as $k2 => $value) {
            //echo "string".$value;
            //echo "<br/>";
            $deco = base_convert($value, 10, 2);
            //print_r($deco);
            //$datos['msj'.$k2] = str_pad($deco, 8, "0", STR_PAD_LEFT);// no funcional
            array_push($msjres, str_pad($deco, 8, "0", STR_PAD_LEFT));
        }
        foreach ($arrayip2 as $k3 => $value) {
            //echo "string".$value;
            $deco = base_convert($value, 10, 2);
            $datos['ip2'.$k3] = str_pad($deco, 8, "0", STR_PAD_LEFT);// no funcional
            array_push($ip2res, str_pad($deco, 8, "0", STR_PAD_LEFT));
        }

         $datos['versionres']=  $versionres ;
         $datos['cabecerares']=  $cabecerares ;
         $datos['tipoServiciores']=  $tipoServiciores ;
         $datos['longitudTres']=  $longitudTres ;
         $datos['identificacionres']=  $identificacionres ;
         $datos['flagres']=  $flagres ;
         $datos['offsetres']=  $offsetres ;
         $datos['ttlres']=  $ttlres ;
         $datos['protocolores']=  $protocolores ;
         $datos['checksumres']=  $checksumres ;
         $datos['ip1res']=$ip1res;
         $datos['msjres']=$msjres;
         $datos['destinario']=$ip2res;

        //inserto en otro array valore sin codificar
         $datosOriginal['versionres']=  $_POST['version'] ;
         $datosOriginal['cabecerares']=  $_POST['cabecera'] ;
         $datosOriginal['tipoServiciores']=  $_POST['tipoServicio'] ;
         $datosOriginal['longitudTres']=  $_POST['longitudT'] ;
         $datosOriginal['identificacionres']=  $_POST['identificacion'] ;
         $datosOriginal['flagres']=  $_POST['flag'] ;
         $datosOriginal['offsetres']=  $_POST['offset'] ;
         $datosOriginal['ttlres']=  $_POST['ttl'] ;
         $datosOriginal['protocolores']=  $_POST['protocolo'] ;
         $datosOriginal['checksumres']=  $_POST['checksum'] ;
         $datosOriginal['ip1res']=$_POST['ip1'];
         $datosOriginal['msj']=$_POST['msj'];
         $datosOriginal['ip2res']=$_POST['ip2'];
        
        print_r($datosOriginal);
        //envio al modelo los datos para la diferente insercion
        //$lista = $this->PermisosModel->listar($datos,$datosOriginal);
        $this->load->view('viewdatagramacodificado');
    }
   
    //
    
    public function listarMensaje()
    {
        $roles = $this->PermisosModel->listarRoles();
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
