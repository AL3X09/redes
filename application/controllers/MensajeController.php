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
        $versionres1= null;
        $cabecerares1=  null;
        $tipoServiciores1=  null;
        $longitudTres1=  null;
        $identificacionres1= null;
        $flagres1=  null;
        $offsetres1=  null;
        $ttlres1=  null;
        $protocolores1= null;
        $checksumres1= null;
        $ip1res1=null;
        $msjres1=null;
        $usuariod=null;

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
            $versionres1.=str_pad($deco, 4, "0", STR_PAD_LEFT)."-";
        }

        foreach ($cabeceraarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 4, "0", STR_PAD_LEFT);//no funcional
            array_push($cabecerares, str_pad($deco, 4, "0", STR_PAD_LEFT));
            $cabecerares1.=str_pad($deco, 4, "0", STR_PAD_LEFT)."-";
        }

        foreach ($tipoServicioarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 8, "0", STR_PAD_LEFT);//no funcional
            array_push($tipoServiciores, str_pad($deco, 8, "0", STR_PAD_LEFT));
            $tipoServiciores1.= str_pad($deco, 8, "0", STR_PAD_LEFT)."-";
        }

        foreach ($longitudTarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 16, "0", STR_PAD_LEFT);//no funcional
            array_push($longitudTres, str_pad($deco, 16, "0", STR_PAD_LEFT));
            $longitudTres1.= str_pad($deco, 16, "0", STR_PAD_LEFT)."-";
        }

        foreach ($identificacionarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 16, "0", STR_PAD_LEFT);//no funcional
            array_push($identificacionres, str_pad($deco, 16, "0", STR_PAD_LEFT));
            $identificacionres1.= str_pad($deco, 16, "0", STR_PAD_LEFT)."-";
        }
        foreach ($flagarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 3, "0", STR_PAD_LEFT);//no funcional
            array_push($flagres, str_pad($deco, 3, "0", STR_PAD_LEFT));
            $flagres1.= str_pad($deco, 3, "0", STR_PAD_LEFT)."-";
        }
        foreach ($offsetarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 13, "0", STR_PAD_LEFT);//no funcional
            array_push($offsetres, str_pad($deco, 13, "0", STR_PAD_LEFT));
            $offsetres1.= str_pad($deco, 13, "0", STR_PAD_LEFT)."-";
        }
        foreach ($ttlarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 8, "0", STR_PAD_LEFT);//no funcional
            array_push($ttlres, str_pad($deco, 8, "0", STR_PAD_LEFT));
            $ttlres1.= str_pad($deco, 8, "0", STR_PAD_LEFT)."-";
        }
        foreach ($protocoloarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 8, "0", STR_PAD_LEFT);//no funcional
            array_push($protocolores, str_pad($deco, 8, "0", STR_PAD_LEFT));
            $protocolores1.= str_pad($deco, 8, "0", STR_PAD_LEFT)."-";
        }
        foreach ($checksumarray as $k => $value) {
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 16, "0", STR_PAD_LEFT);//no funcional
            array_push($checksumres, str_pad($deco, 16, "0", STR_PAD_LEFT));
            $checksumres1.= str_pad($deco, 16, "0", STR_PAD_LEFT)."-";
        }

        foreach ($arrayip1 as $k => $value) {
            //echo "string".$value;
            $deco = base_convert($value, 10, 2);
            $datos['dato'.$k] = str_pad($deco, 8, "0", STR_PAD_LEFT);//no funcional
            array_push($ip1res, str_pad($deco, 8, "0", STR_PAD_LEFT));
            $ip1res1.= str_pad($deco, 8, "0", STR_PAD_LEFT)."-";
            
        }
        foreach ($arraymsj as $k2 => $value) {
            //echo "string".$value;
            //echo "<br/>";
            $deco = base_convert($value, 10, 2);
            //print_r($deco);
            //$datos['msj'.$k2] = str_pad($deco, 8, "0", STR_PAD_LEFT);// no funcional
            array_push($msjres, str_pad($deco, 8, "0", STR_PAD_LEFT));
            $msjres1.= str_pad($deco, 8, "0", STR_PAD_LEFT)."-";
        }
        foreach ($arrayip2 as $k3 => $value) {
            //echo "string".$value;
            $deco = base_convert($value, 10, 2);
            $datos['ip2'.$k3] = str_pad($deco, 8, "0", STR_PAD_LEFT);// no funcional
            array_push($ip2res, str_pad($deco, 8, "0", STR_PAD_LEFT));
            $usuariod.= str_pad($deco, 8, "0", STR_PAD_LEFT)."-";
        } 
         
        $versionres1=  substr($versionres1,0,-1);//para eliminar la ultima coma (de tu post anterior)
        $cabecerares1=  substr($cabecerares1,0,-1);
        $tipoServiciores1=  substr($tipoServiciores1,0,-1);
        $longitudTres1=  substr($longitudTres1,0,-1);
        $identificacionres1= substr($identificacionres1,0,-1);
        $flagres1=  substr($flagres1,0,-1);
        $offsetres1=  substr($offsetres1,0,-1);
        $ttlres1=  substr($ttlres1,0,-1);
        $protocolores1=  substr($protocolores1,0,-1);
        $checksumres1= substr($checksumres1,0,-1);
        $ip1res1=substr($ip1res1,0,-1);
        $msjres1=substr($msjres1,0,-1);
        $usuariod=substr($usuariod,0,-1);

         $datosdata['version']=  $versionres1;
         $datosdata['cabecera']=  $cabecerares1;
         $datosdata['tipo_servicio']=  $tipoServiciores1;
         $datosdata['longitud']=  $longitudTres1;
         $datosdata['identificacion']= $identificacionres1;
         $datosdata['flag']=  $flagres1;
         $datosdata['offset']=  $offsetres1;
         $datosdata['ttl']=  $ttlres1;
         $datosdata['protocolo']=  $protocolores1;
         $datosdata['checksum']= $checksumres1;
         $datosdata['ip_envio ']=$ip1res1;
         $datosdata['mensaje']=$msjres1;
         $datosdata['usuario']=$_POST['destinario'];
         $datosdata['usu_datagrama']=$usuariod;
         

        //inserto en otro array valore sin codificar
         $datosOriginal['version']=  $_POST['version'] ;
         $datosOriginal['cabecera']=  $_POST['cabecera'] ;
         $datosOriginal['tipo_servicio']=  $_POST['tipoServicio'] ;
         $datosOriginal['longitud']=  $_POST['longitudT'] ;
         $datosOriginal['identificacion']=  $_POST['identificacion'] ;
         $datosOriginal['flag']=  $_POST['flag'] ;
         $datosOriginal['offset']=  $_POST['offset'] ;
         $datosOriginal['ttl']=  $_POST['ttl'] ;
         $datosOriginal['protocolo']=  $_POST['protocolo'] ;
         $datosOriginal['checksum']=  $_POST['checksum'] ;
         $datosOriginal['ip_envio']=$_POST['ip1'];
         $datosOriginal['mensaje']=$_POST['msj'];
         $datosOriginal['usuario']=$_POST['destinario'];
        
        //print_r($datosdata);
        //envio al modelo los datos para la diferente insercion
        $lista = $this->DatagramaModel->insertar($datosdata,$datosOriginal);
        //envio mensaje
        $fecha=date("Y-m-d H:i:s");
        $insmsj = $this->DatagramaModel->insertarMSJ($datosOriginal,$fecha);
        $insmsj = $this->DatagramaModel->insertarREL();
        print_r($insmsj);
        $this->load->view('viewdatamensaje');
    }
   
    //
    
    public function listarMensaje()
    {
        $valor=$_POST['valor'];
        $roles = $this->DatagramaModel->traerMSJ($valor);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($roles);
    }

    public function traerMSJsinCodificar()
    {
        $valor=$_POST['valor'];
        $roles = $this->DatagramaModel->traerMSJsinCodificar($valor);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($roles);
    }

    public function traerMSJCodificado()
    {
        $valor=$_POST['valor'];
        $roles = $this->DatagramaModel->traerMSJCodificado($valor);
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
