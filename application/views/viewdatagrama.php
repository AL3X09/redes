<!DOCTYPE html>
<html lang="es">
<head>
<!-- CSS  -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
<title> CREAR DATAGRAMA </title>
</head>

<body class="" >
<?php
/*if (!isset($_SESSION["usuario"])) {
    //echo "error1";
    header("location: ". base_url()."Administracion/cerrarSesion");
}
$aspirante = unserialize($_SESSION['usuario']);
echo '<input type="hidden" value="'.$aspirante->idusuario.'" id="idusuario"/>';


ob_end_flush();*/
?>
<nav class="blue darken-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo" onclick="volver()"><img src="<?php echo base_url(); ?>img/logo.svg" width="100" height="80"></a>
    </div>
</nav>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h4 class="header center orange-text">MODULO DATAGRAMA</h4>

    </div>
</div>
<div class="container">

    <div class="row">
        <form class="col s12" id="formdatagrama" method="post" action="<?php echo base_url(); ?>Redes/leerDatagrama">
          <!-- primera fila  -->
            <div class="row">
                <div class="input-field col s3">
                    <input placeholder="ingrese version" id="version" name="version" type="text" class="validate" >
                    <label for="first_name">Versión</label>
                </div>
                <div class="input-field col s3">
                    <input placeholder="ingrese texto" id="cabecera" name="cabecera" type="text" class="validate" >
                    <label for="first_name">Cabecera</label>
                    <input placeholder="ingrese texto" id="" name="" type="hidden" class="validate" >
                </div>
                <div class="input-field col s3">
                    <input placeholder="ingrese números" id="tipoServicio" name="tipoServicio" type="text" class="validate" >
                    <label for="first_name">Tipo de servico</label>
                </div>
                <div class="input-field col s3">
                    <input placeholder="ingrese números" id="longitudT" name="longitudT" type="text" class="validate" >
                    <label for="first_name">Logintud Total</label>
                </div>
                
            </div>
            <!-- segunda fila  -->
            <div class="row">
                <div class="input-field col s5">
                    <input placeholder="ingrese version" id="identificacion" name="identificacion" type="text" class="validate" >
                    <label for="first_name">Identificación</label>
                </div>
                <div class="input-field col s3">
                    <input placeholder="ingrese texto" id="flag" name="flag" type="text" class="validate" >
                    <label for="first_name">Flag</label>
                    <input placeholder="ingrese texto" id="" name="" type="hidden" class="validate" >
                </div>
                <div class="input-field col s4">
                    <input placeholder="ingrese números" id="offset" name="offset" type="text" class="validate" >
                    <label for="first_name">Offset</label>
                </div>
               
            </div>
            <!-- tercera fila  -->
            <div class="row">
                <div class="input-field col s3">
                    <input placeholder="ingrese version" id="ttl" name="ttl" type="text" class="validate" >
                    <label for="first_name">TTL</label>
                </div>
                <div class="input-field col s3">
                    <input placeholder="ingrese texto" id="protocolo" name="protocolo" type="text" class="validate" >
                    <label for="first_name">Protocolo</label>
                    <input placeholder="ingrese texto" id="" name="" type="hidden" class="validate" >
                </div>
                <div class="input-field col s5">
                    <input placeholder="ingrese números" id="checksum" name="checksum" type="text" class="validate" >
                    <label for="first_name">Checksum</label>
                </div>
               
            </div>
            <!-- cuarta fila  -->
             <div class="row">
                <div class="input-field col s12">
                    <input placeholder="ingrese números" id="ip1" name="ip1" type="text" class="validate" >
                    <label for="first_name">Ip Envio</label>
                </div>
                
            </div>
             <div class="row">
               
                <div class="input-field col s12">
                    <input placeholder="ingrese mensaje" id="msj" name="msj" type="text" class="validate" onclick="">
                    <label for="first_name">Mensaje</label>
                    <input placeholder="ingrese mensaje" id="msj2" name="msj2" type="hidden" class="validate" >
                </div>
                
            </div>
            <!-- quinta fila  -->
            <div class="row">
               
                <div class="input-field col s12">
                    <input placeholder="ingrese números" id="ip2" name="ip2" type="text" class="validate" onclick="codificar2()">
                    <label for="first_name">Ip Destino</label>
                </div>
                
            </div>
            <!-- separador fila  -->
            <div class="row">
                <div class="section"></div>
            </div>
            <div class="row">
                    <button class="btn waves-effect waves-light" type="submit" name="action" onclick="">Enviar
                        <i class="material-icons right">send</i>
                    </button>
            </div>
        </form>
    </div>

</div>

<footer class="page-footer blue darken-4">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">DATAGRAMA</h5>
            </div>
            <div class="col l6 s12">
                <h5 class="white-text">Trabajado por</h5>
                <ul>
                    <li><a class="white-text" href="#!">ALEXANDER CIFUENTES SÁNCHEZ</a></li>
                    <li><a class="white-text" href="#!">LORENA ARISTIZABAL</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Power full by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
        </div>
    </div>
</footer>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url(); ?>js/materialize.js"></script>
<script src="<?php echo base_url(); ?>js/datagrama.js"></script>
</body>
</html>