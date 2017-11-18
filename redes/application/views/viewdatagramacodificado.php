<!DOCTYPE html>
<html lang="es">
<head>
<!-- CSS  -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
<title> DATAGRAMA CODIFICADO </title>
</head>

<body class="" >
<?php
//echo $dato0;
//var_dump($datos);
//echo '<input id="ip" type="hidden" disabled value="'.$ip1.'">';
//echo '<input id="msj1" type="hidden" disabled value="'.$mensaj.'">';
//echo '<input id="ip2" type="hidden" disabled value="'.$ip2.'">';
?>
<nav class="blue darken-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo" onclick="volver()"><img src="<?php echo base_url(); ?>img/logo.svg" width="100" height="80"></a>
    </div>
</nav>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h4 class="header center orange-text">MODULO RECEPCIÓN DATAGRAMA</h4>

    </div>
</div>
<div class="container">

    <div id="codificado">
    <h6 class="header center orange-text"> DATAGRAMA CODIFICADO BINARIO</h6>

     <div class="row">
        
        <?php
            // Version
            foreach ($versionres as $k1 => $value) {
                //echo $dato."0";
                echo '<div class="col s12 m3 l3">';
                //echo '<input id="ip" type="text" value="'.$value.'">';
                echo '<div class="card-panel blue-grey lighten-'.$k1.'">Versión:</br>'.$value.'</div>';
                echo '</div>';
            };
            // Longitud Cabecera
             foreach ($cabecerares as $k2 => $value) {
                //echo $dato."0";
                echo '<div class="col s12 m3 l3">';
                //echo '<input id="ip" type="text" value="'.$value.'">';
                echo '<div class="card-panel blue-grey lighten-'.$k2.'">Cabecera:</br>'.$value.'</div>';
                echo '</div>';
            };
            //Tipo Servicio
             foreach ($tipoServiciores as $k3 => $value) {
                //echo $dato."0";
                echo '<div class="col s12 m3 l3">';
                //echo '<input id="ip" type="text" value="'.$value.'">';
                echo '<div class="card-panel blue-grey lighten-'.$k3.'">Tipo de servico:</br>'.$value.'</div>';
                echo '</div>';
            };

             //Longitud Total
             foreach ($longitudTres as $k4 => $value) {
                //echo $dato."0";
                echo '<div class="col s12 m3 l3">';
                //echo '<input id="ip" type="text" value="'.$value.'">';
                echo '<div class="card-panel blue-grey lighten-'.$k4.'">Logintud Total:</br>'.$value.'</div>';
                echo '</div>';
            };
        ?>

    </div>

    <div class="row">
        
        <?php
            //Identificacion
             foreach ($identificacionres as $k5 => $value) {
                //echo $dato."0";
                echo '<div class="col s12 m5 l5">';
                //echo '<input id="ip" type="text" value="'.$value.'">';
                echo '<div class="card-panel deep-orange darken-'.$k5.'">Identificación:</br>'.$value.'</div>';
                echo '</div>';
            };
             //flag
             foreach ($flagres as $k6 => $value) {
                //echo $dato."0";
                echo '<div class="col s12 m3 l3">';
                //echo '<input id="ip" type="text" value="'.$value.'">';
                echo '<div class="card-panel deep-orange darken-'.$k6.'">Flag:</br>'.$value.'</div>';
                echo '</div>';
            };
              //offset
             foreach ($offsetres as $k7 => $value) {
                //echo $dato."0";
                echo '<div class="col s12 m4 l4">';
                //echo '<input id="ip" type="text" value="'.$value.'">';
                echo '<div class="card-panel deep-orange darken-'.$k7.'">Offset:</br>'.$value.'</div>';
                echo '</div>';
            };

         ?>

    </div>

    <div class="row">
        
        <?php
             //TTL
             foreach ($ttlres as $k8 => $value) {
                //echo $dato."0";
                echo '<div class="col s12 m4 l4">';
                //echo '<input id="ip" type="text" value="'.$value.'">';
                echo '<div class="card-panel yellow darken-'.$k8.'">TTL:</br>'.$value.'</div>';
                echo '</div>';
            };
             //Protocolo
             foreach ($protocolores as $k9 => $value) {
                //echo $dato."0";
                echo '<div class="col s12 m4 l4">';
                //echo '<input id="ip" type="text" value="'.$value.'">';
                echo '<div class="card-panel yellow darken-'.$k9.'">Protocolo:</br>'.$value.'</div>';
                echo '</div>';
            };
             //Checksum
             foreach ($checksumres as $k10 => $value) {
                //echo $dato."0";
                echo '<div class="col s12 m4 l4">';
                //echo '<input id="ip" type="text" value="'.$value.'">';
                echo '<div class="card-panel yellow darken-'.$k10.'">Checksum:</br>'.$value.'</div>';
                echo '</div>';
            };
           
            
        ?>

    </div>

    <div class="row">
        
        <?php
       
            foreach ($ip1res as $k11 => $value) {
                //echo $dato."0";
                echo '<div class="col s12 m3 l3">';
                //echo '<input id="ip" type="text" value="'.$value.'">';
                echo '<div class="card-panel teal lighten-'.$k11.'">Ip Envio:</br>'.$value.'</div>';
                echo '</div>';
            };
            
        ?>

    </div>

    <div class="row">
        
        <?php
       
            foreach ($msjres as $k12 => $value) {
                //echo $dato."0";
                echo '<div class="col s12 m3 l3">';
                //echo '<input id="ip" type="text" value="'.$value.'">';
                echo '<div class="card-panel red darken-'.$k12.'">Mensaje:</br>'.$value.'</div>';
                echo '</div>';
            };
            
        ?>

    </div>

    <div class="row">
        
        <?php
       
            foreach ($ip2res as $k13 => $value) {
                //echo $dato."0";
                echo '<div class="col s12 m3 l3">';
                //echo '<input id="ip" type="text" value="'.$value.'">';
                echo '<div class="card-panel purple darken-'.$k13.'">Ip Recive:</br>'.$value.'</div>';
                echo '</div>';
            };
            
        ?>

   </div>
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