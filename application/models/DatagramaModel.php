<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DatagramaModel extends CI_MODEL {

    function __construct() {
        parent::__construct();
    }

    //obtiene consecutivo
    function consec_datagrama() {
        return $this->db->count_all('usuarios');
    }

//obtiene todos las nacionalidades por id de llegada
    function count_datagramabyID($id) {
        $sql = "
          SELECT
          COUNT(idusuario)
          FROM usuarios
          WHERE idusuario=?;";
        //$sql = $this->db->query($sql, array($id));
        
        //return $sql->simple_query(); //->total_cortes;
    }
    
    function existeDatagrama($usuario, $contrasenia) {
        $sql = "
          SELECT
          COUNT(idusuario) AS existe
          FROM usuarios U
          WHERE flestado=1
          AND U.usuario=?
          AND U.contrasenia=?;";
          //$sql = $this->db->query($sql);
          $sql = $this->db->query($sql, array($usuario,$contrasenia));
       
        return $sql->row_array(); //->total_cortes;
    }

    function datosDatagrama($usuario, $contrasenia) {
        $data = array();
        try {
            $stmt = $this->db->conn_id->prepare("call listar_datos_usuario(?,?)");
            $stmt->bind_param('ss', $usuario, $contrasenia);
            $stmt->execute();
            $stmt->bind_result(
                    $idusuario,
                    $nombre1, 
                    $nombre2, 
                    $apellido1, 
                    $apellido2, 
                    $identificacion, 
                    $celular, 
                    $nameusuario, 
                    $rol, 
                    $ver,
                    $crear,
                    $editar,
                    $eliminar
                    );
            
            if ($stmt->fetch()) {
                $data = array(
                    'idusuario' => $idusuario,
                    'nombre1' => $nombre1, 
                    'nombre2' => $nombre2, 
                    'apellido1' => $apellido1, 
                    'apellido2' => $apellido2, 
                    'identificacion' => $identificacion, 
                    'celular' => $celular, 
                    'usuario' => $nameusuario,
                    'rol' => $rol, 
                    'ver' => $ver,
                    'crear' => $crear,
                    'editar' => $editar,
                    'eliminar' => $eliminar,
                        );
            } else {
                $data = array('msg' => 'No Se Encontro regsitro', 'tipo' => 'error');
            }

            $stmt->close();
        } catch (Exception $ex) {
            print $ex;
        }
        return $data;
    }

    function listar() {
        try {
            $sql = "SELECT * FROM datagrama;";
            $sql = $this->db->query($sql);
            if ($sql->num_rows() > 0) {
                return $sql->result_array();
            }
        } catch (Exception $ex) {
            print $ex;
        }
    }

    function insertar2($nombre1, $nombre2, $apellido1, $apellido2, $identificacion, $celular, $usuario, $contrasenia, $rol) {
        $mensaje = array();

        try {
            $consec = $this->consec_usuario();
            //$consec+=1;
            $stmt = $this->db->conn_id->prepare("INSERT INTO datagrama VALUES (NULL,?,?,?,?,?,?,?,?,?,1)");
            $stmt->bind_param("issssiiss", $consec, $nombre1, $nombre2, $apellido1, $apellido2, $identificacion, $celular, $usuario, $contrasenia);
            $ins = $stmt->execute();
            $ultid = $stmt->insert_id;
            $stmt->close();
            //insert en tabla de relacion
            $stmt = $this->db->conn_id->prepare("INSERT INTO usuario_has_roles VALUES (?,?)");
            $stmt->bind_param("ii", $ultid, $rol);
            $ins = $stmt->execute();
            $stmt->close();
            if ($ins) {
                $mensaje = array('msg' => 'Se guardaron correctamente', 'tipo' => 'success');
            } else {
                $mensaje = array('msg' => 'Error al guarda', 'tipo' => 'error');
            }
            if ($this->db->conn_id->error) {
                throw new Exception("MySQL error <br>" . $this->db->conn_id->error, $this->db->conn_id->errno);
            }
        } catch (Exception $ex) {
            $mensaje = array('msg' => $ex->getMessage(), 'tipo' => 'error');
        }
        return $mensaje;
    }

    function insertar($datosdata,$datosOriginal) {
        //print_r($datosOriginal);
        $this->db->insert('datagrama',$datosdata);
        $ins =$this->db->insert('permisos_usua ',$datosOriginal);
            if ($ins) {
                $mensaje = array('msg' => 'Se guardaron correctamente', 'tipo' => 'success');
            } else {
                $mensaje = array('msg' => 'Error al guarda', 'tipo' => 'error');
            }
            if ($this->db->conn_id->error) {
                throw new Exception("MySQL error <br>" . $this->db->conn_id->error, $this->db->conn_id->errno);
            }
        return $mensaje;
    }

    function insertarMSJ($datosOriginal,$fecha) {
        $data = array(
            'usuario' => $datosOriginal['usuario'],
            'mensaje' => $datosOriginal['mensaje'],
            'checksum' => $datosOriginal['checksum'],
            'Fecha_cre' => $fecha,
            'ip_envio' => $datosOriginal['ip_envio'],
            'estado_msj' => 1,
            );

            $ins =$this->db->insert('mensaje',$data);

            if ($ins) {
                $mensaje = array('msg' => 'Se guardaro correctamente', 'tipo' => 'success');
            } else {
                $mensaje = array('msg' => 'Error al guarda', 'tipo' => 'error');
            }
            if ($this->db->conn_id->error) {
                throw new Exception("MySQL error <br>" . $this->db->conn_id->error, $this->db->conn_id->errno);
            }
        return $mensaje;
    }

    function insertarREL() {
        $this->db->select_max('id_data');
        $query = $this->db->get('datagrama')->row();

        $this->db->select_max('id_mensaje');
        $query2 = $this->db->get('mensaje')->row();  

        $data = array(
            'id_datagrama ' => $query->id_data,
            'id_msj' => $query2->id_mensaje,
            );

           $this->db->insert('datagrama_has_msj',$data);            
    }

    function traerMSJ($user) {
        try {
            $sql = "
              SELECT *              
              FROM mensaje
              WHERE usuario = ".$user." ORDER BY Fecha_cre";
            $sql=$this->db->query($sql);
            //var_dump($total->num_rows());
            if($sql->num_rows()>0){
                return $sql->result_array();//->total_cortes;
            }
        } catch (Exception $ex) {
          print $ex;
        }
            
    }

    function traerMSJsinCodificar($user) {
        try {
            $sql = "
            SELECT PU.*, M.mensaje, MAX(Fecha_cre)
            FROM mensaje M
            INNER JOIN permisos_usua PU ON PU.usuario=M.usuario
            WHERE M.usuario = ".$user." AND M.mensaje = PU.mensaje ORDER BY Fecha_cre ASC";
            $sql=$this->db->query($sql);
            
            if($sql->num_rows()>0){
                return $sql->result_array();//->total_cortes;
            }
        } catch (Exception $ex) {
          print $ex;
        }
            
    }

    function traerMSJCodificado($user) {
        try {
            $sql = "
            SELECT DG.*, MAX(Fecha_cre)
            FROM mensaje M
            INNER JOIN permisos_usua PU ON PU.usuario=M.usuario
            INNER JOIN datagrama_has_msj DM ON DM.id_msj=M.id_mensaje
            INNER JOIN datagrama DG ON DG.id_data=DM.id_datagrama
            WHERE M.usuario = ".$user." AND M.mensaje = PU.mensaje ORDER BY Fecha_cre ASC";
            $sql=$this->db->query($sql);
            
            if($sql->num_rows()>0){
                return $sql->result_array();//->total_cortes;
            }
        } catch (Exception $ex) {
          print $ex;
        }
            
    }

}
