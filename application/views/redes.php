<!DOCTYPE html>
<html lang="es">
<head>
<!-- CSS  -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
<title> LABORATORIO DE REDES </title>
</head>
<!-- BODY  -->
<body class="" >
<?php
if (!isset($_SESSION["usuario"])) {
    //echo "error1";
    session_start();
//header("location: ". base_url()."Administracion/cerrarSesion");
}
$aspirante = unserialize($_SESSION['usuario']);

echo '<input type="hidden" value="'.$aspirante->idusuario.'" id="idusuario"/>';

ob_end_flush();
?>
<nav class="blue darken-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"><img src="<?php echo base_url(); ?>img/logo.svg" width="100" height="80"></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href=""><?php echo $aspirante->usuario ?></a></li>
            <li><a href="<?php echo base_url(); ?>Administracion/cerrarSesion">Cerrar Sesion</a></li>
        </ul>
    </div>
</nav>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">

        <h4 class="header center orange-text">LABORATORIO DE REDES</h4>

    </div>
</div>
<div class="container" id="administracion">
    <div class="row">
        
        <div class="col l3 s12">
            <div id="divBotoncrear">  
                <a class="btn-floating btn-large waves-effect waves-light blue tooltipped" data-position="bottom" data-delay="50" data-tooltip="Envio IP" onclick="viewcodificarIP()"><i class="material-icons">router</i></a>
            </div>
        </div>
        <div class="col l3 s12">
            <div id="divBotoncrear">  
                <a class="btn-floating btn-large waves-effect waves-light blue tooltipped" data-position="bottom" data-delay="50" data-tooltip="Datagrama" onclick="viewDatagrama()"><i class="material-icons">dashboard</i></a>
            </div>
        </div>
        <div class="col l3 s12">
            <div id="divBotoncrear">  
                <a class="btn-floating btn-large waves-effect waves-light blue tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enviar Mensaje" onclick="viewDatagramaMensaje()"><i class="material-icons">rate_review</i></a>
            </div>
        </div>
         <div class="col l3 s12">
            <div id="divBotoncrear">  
                <a class="btn-floating btn-large waves-effect waves-light blue tooltipped" data-position="bottom" data-delay="50" data-tooltip="Ver Tus Mensajes" onclick="viewMensaje()"><i class="material-icons">announcement</i></a>
            </div>
        </div>
    </div>
</div>


<div class="container">
 
</div>


<div class="section"></div>
<div class="section"></div>

<footer class="page-footer blue darken-4">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">ALEXANDER CIFUENTES SÁNCHEZ</h5>
            </div>
            <div class="col l6 s12">
                <h5 class="white-text">LORENA ARISTIZABAL ANGEL</h5>
                <ul>
                    <li><a class="white-text" href="#!"></a></li>
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
<script src="<?php echo base_url(); ?>js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url(); ?>js/materialize.js"></script>
<script src="<?php echo base_url(); ?>js/redes.js"></script>
</body>
</html>
