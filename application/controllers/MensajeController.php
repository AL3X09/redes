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
            $versionres1=str_pad($deco, 4, "0", STR_PAD_LEFT);
        }

        foreach ($cabeceraarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 4, "0", STR_PAD_LEFT);//no funcional
            array_push($cabecerares, str_pad($deco, 4, "0", STR_PAD_LEFT));
            $cabecerares1=str_pad($deco, 4, "0", STR_PAD_LEFT);
        }

        foreach ($tipoServicioarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 8, "0", STR_PAD_LEFT);//no funcional
            array_push($tipoServiciores, str_pad($deco, 8, "0", STR_PAD_LEFT));
            $tipoServiciores1= str_pad($deco, 8, "0", STR_PAD_LEFT);
        }

        foreach ($longitudTarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 16, "0", STR_PAD_LEFT);//no funcional
            array_push($longitudTres, str_pad($deco, 16, "0", STR_PAD_LEFT));
            $longitudTres1= str_pad($deco, 16, "0", STR_PAD_LEFT);
        }

        foreach ($identificacionarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 16, "0", STR_PAD_LEFT);//no funcional
            array_push($identificacionres, str_pad($deco, 16, "0", STR_PAD_LEFT));
            $identificacionres1= str_pad($deco, 16, "0", STR_PAD_LEFT);
        }
        foreach ($flagarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 3, "0", STR_PAD_LEFT);//no funcional
            array_push($flagres, str_pad($deco, 3, "0", STR_PAD_LEFT));
            $flagres1= str_pad($deco, 3, "0", STR_PAD_LEFT);
        }
        foreach ($offsetarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 13, "0", STR_PAD_LEFT);//no funcional
            array_push($offsetres, str_pad($deco, 13, "0", STR_PAD_LEFT));
            $offsetres1= str_pad($deco, 13, "0", STR_PAD_LEFT);
        }
        foreach ($ttlarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 8, "0", STR_PAD_LEFT);//no funcional
            array_push($ttlres, str_pad($deco, 8, "0", STR_PAD_LEFT));
            $ttlres1= str_pad($deco, 8, "0", STR_PAD_LEFT);
        }
        foreach ($protocoloarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 8, "0", STR_PAD_LEFT);//no funcional
            array_push($protocolores, str_pad($deco, 8, "0", STR_PAD_LEFT));
            $protocolores1= str_pad($deco, 8, "0", STR_PAD_LEFT);
        }
        foreach ($checksumarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 16, "0", STR_PAD_LEFT);//no funcional
            array_push($checksumres, str_pad($deco, 16, "0", STR_PAD_LEFT));
            $checksumres1= str_pad($deco, 16, "0", STR_PAD_LEFT);
        }

        foreach ($arrayip1 as $k => $value) {
            //echo "string".$value;
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 8, "0", STR_PAD_LEFT);//no funcional
            array_push($ip1res, str_pad($deco, 8, "0", STR_PAD_LEFT));
            $ip1res1= str_pad($deco, 8, "0", STR_PAD_LEFT);
            
        }
        foreach ($arraymsj as $k2 => $value) {
            //echo "string".$value;
            //echo "<br/>";
            $deco = base_convert($value, 10, 2);
            //print_r($deco);
            //$datos['msj'.$k2] = str_pad($deco, 8, "0", STR_PAD_LEFT);// no funcional
            array_push($msjres, str_pad($deco, 8, "0", STR_PAD_LEFT));
            $msjres1= str_pad($deco, 8, "0", STR_PAD_LEFT);
        }
        foreach ($arrayip2 as $k3 => $value) {
            //echo "string".$value;
            $deco = base_convert($value, 10, 2);
            $datos['ip2'.$k3] = str_pad($deco, 8, "0", STR_PAD_LEFT);// no funcional
            array_push($ip2res, str_pad($deco, 8, "0", STR_PAD_LEFT));
            $usuario= str_pad($deco, 8, "0", STR_PAD_LEFT);
        }

         $datores['version']=  $versionres1 ;
         $datores['cabecera']=  $cabecerares1 ;
         $datores['tipo_servicio']=  $tipoServiciores1;
         $datores['longitud']=  $longitudTres1 ;
         $datores['identificacion']=  $identificacionres1 ;
         $datores['flag']=  $flagres1 ;
         $datores['offset']=  $offsetres1 ;
         $datores['ttl']=  $ttlres1 ;
         $datores['protocolo']=  $protocolores1 ;
         $datores['checksum']=  $checksumres1 ;
         $datores['ip_envio ']=$ip1res1;
         $datores['mensaje']=$msjres1;
         $datores['usuario']=$usuario;

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
         $datosOriginal['destinario']=$_POST['destinario'];
        
        //print_r($datosOriginal);
        //envio al modelo los datos para la diferente insercion
        $lista = $this->DatagramaModel->insertar($datores,$datosOriginal);
        
        $this->load->view('viewdatamensaje');
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
