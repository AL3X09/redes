<!DOCTYPE html>
<html lang="es">
<head>
<!-- CSS  -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
<title> CREAR MENSAJE </title>
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
        <h4 class="header center orange-text">MODULO ENVIO MENSAJE</h4>

    </div>
</div>
<div class="container">

    <div class="row">
        <form class="col s12" id="formusuario" method="post" action="<?php echo base_url(); ?>Redes/leerMensaje">
            <div class="row">
                <div class="input-field col s3">
                    <input placeholder="ingrese números" id="first_name" name="ip1" type="text" class="validate" >
                    <label for="first_name">Ip Envio</label>
                </div>
                <div class="input-field col s3">
                    <input placeholder="ingrese texto" id="mensaje" name="msj" type="text" class="validate" >
                    <label for="first_name">Mensaje</label>
                    <input placeholder="ingrese texto" id="msj2" name="msj2" type="hidden" class="validate" >
                </div>
                <div class="input-field col s3">
                    <input placeholder="ingrese números" id="first_name" name="ip2" type="text" class="validate" onclick="codificar2()">
                    <label for="first_name">Ip Llegada</label>
                </div>
                
            </div>
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
                <h5 class="white-text">LENGUAJES DE INTERNET</h5>
            </div>
            <div class="col l6 s12">
                <h5 class="white-text">Trabajado por</h5>
                <ul>
                    <li><a class="white-text" href="#!">ALEXANDER CIFUENTES SÁNCHEZ</a></li>
                    <li><a class="white-text" href="#!">LORENA ARIZTIZABAL</a></li>
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
<script src="<?php echo base_url(); ?>js/redes.js"></script>
</body>
</html>