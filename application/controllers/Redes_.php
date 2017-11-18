<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Redes extends CI_Controller {


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
    //llamo vista de formulirio para perfiles
    public function viewcodificarIp()
    {
        $this->load->view('viewcodificarip');
    }
    //llamo vista de formulirio para perfiles
    public function viewDatagrama()
    {
        $this->load->view('viewdatagrama');
    }
    //llamo vista de formulirio para el mensaje
    public function viewMensaje()
    {
        $this->load->view('viewdatamensaje');
    }
	//llamo vista de formulirio para perfiles
    public function leerMensaje()
    {
        //print_r($_POST);
        $datos['ip1'] = $_POST['ip1'];
        $datos['mensaj'] = $_POST['msj'];
        $datos['ip2'] = $_POST['ip2'];
        //$m = str_split($_POST['msj']);
        $array1 = explode('.', $_POST['ip1']);
        //print_r($_POST['msj2']);
        $array2 = explode(',', $_POST['msj2']);
        //$array2 = str_split($_POST['msj']);
        $array3 = explode('.', $_POST['ip2']);
        $ip1res = array();
        $msjres = array();
        $ip2res = array();
        //$datos['array2'] = explode('.', $_POST['ip2']);
        
        foreach ($array1 as $k => $value) {
            //echo "string".$value;
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 8, "0", STR_PAD_LEFT);//no funcional
            array_push($ip1res, str_pad($deco, 8, "0", STR_PAD_LEFT));
            
        }
        foreach ($array2 as $k2 => $value) {
            //echo "string".$value;
            //echo "<br/>";
            $deco = base_convert($value, 10, 2);
            //print_r($deco);
            //$datos['msj'.$k2] = str_pad($deco, 8, "0", STR_PAD_LEFT);// no funcional
            array_push($msjres, str_pad($deco, 8, "0", STR_PAD_LEFT));
        }
        foreach ($array3 as $k3 => $value) {
            //echo "string".$value;
            $deco = base_convert($value, 10, 2);
            $datos['ip2'.$k3] = str_pad($deco, 8, "0", STR_PAD_LEFT);// no funcional
            array_push($ip2res, str_pad($deco, 8, "0", STR_PAD_LEFT));
        }
        $datos['contador1'] = count($array1);
        $datos['contador2'] = count($array2);
        $datos['contador3'] = count($array3);
        $datos['ip1res']=$ip1res;
        $datos['msjres']=$msjres;
        $datos['ip2res']=$ip2res;
        //print_r($datos);
        $this->load->view('viewcodificadoip',$datos);
    }
    
    public function leerDatagrama()
    {
        //print_r($_POST);
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
        $arrayip2 = explode('.', $_POST['ip2']);
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
        //$datos['contador1'] = count($array1);
       // $datos['contador2'] = count($array2);
        //$datos['contador3'] = count($array3);
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
 $datos['ip2res']=$ip2res;
        //print_r($datos);
        $this->load->view('viewdatagramacodificado',$datos);
    }
   
    //
    
    public function listarRoles()
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
