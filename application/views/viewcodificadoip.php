<!DOCTYPE html>
<html lang="es">
<head>
<!-- CSS  -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="<?php echo base_url(); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
<title> MENSAJE CODIFICADO </title>
</head>

<body class="" >
<?php
//echo $dato0;
//var_dump($datos);
echo '<input id="ip" type="hidden" disabled value="'.$ip1.'">';
echo '<input id="msj1" type="hidden" disabled value="'.$mensaj.'">';
echo '<input id="ip2" type="hidden" disabled value="'.$ip2.'">';
?>
<nav class="blue darken-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo" onclick="volver()"><img src="<?php echo base_url(); ?>img/logo.svg" width="100" height="80"></a>
    </div>
</nav>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h4 class="header center orange-text">MODULO RECEPCIÓN MENSAJE</h4>

    </div>
</div>
<div class="container">

    <div id="codificado">
    <h6 class="header center orange-text"> MENSAJE CODIFICADO BINARIO</h6>

    <div class="row">
        
        <?php
       
            foreach ($ip1res as $k1 => $value) {
                //echo $dato."0";
                echo '<div class="col s12 m6 l3">';
                //echo '<input id="ip" type="text" value="'.$value.'">';
                echo '<div class="card-panel teal lighten-'.$k1.'">'.$value.'</div>';
                echo '</div>';
            };
            
        ?>

    </div>


    <div class="row">

    <?php echo
    '<script type="text/javascript">;
    alert(letras);
</script>'; ?>
        
        <?php
       
            foreach ($msjres as $k1 => $value) {
                //echo $dato."0";
                echo '<div class="col s12 m6 l3">';
                //echo '<input id="ip" type="text" value="'.$value.'">';
                echo '<div class="card-panel red darken-'.$k1.'">'.$value.'</div>';
                echo '</div>';
            };
            
        ?>

    </div>

    <div class="row">
        
        <?php
       
            foreach ($ip2res as $k1 => $value) {
                //echo $dato."0";
                echo '<div class="col s12 m6 l3">';
                //echo '<input id="ip" type="text" value="'.$value.'">';
                echo '<div class="card-panel purple darken-'.$k1.'">'.$value.'</div>';
                echo '</div>';
            };
            
        ?>

   </div>
</div>

    <div id="codificado2">  
        <h6 class="header center orange-text"> MENSAJE DECODIFICADO</h6>
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
<script src="<?php echo base_url(); ?>js/redes.js"></script>
</body>
</html>