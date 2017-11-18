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
        <h4 class="header center orange-text">MODULO ENVÍO MENSAJE</h4>

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
                    
                     <select id="tipoServicio" name="tipoServicio">
      <option value=""   disabled selected>Seleccione TOS</option>
      <option value="0"> Routine </option>
      <option value="1"> Priority</option>
      <option value="2"> Immediate</option>
	  <option value="3"> Flash</option>
	  <option value="4"> Flash Override</option>
	  <option value="5"> Critical</option>
	  <option value="6"> Internetwork Control</option>
	  <option value="7"> Network Control</option>
	  </select>          
					<label for="first_name">Tipo de servico(TOS)</label>
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
				
     <select id="protocolo" name="protocolo">
      <option value=""   disabled selected>Seleccione Opción</option>
      <option value="1"> ICMP (Internet Control Message Protocol)</option>
      <option value="2"> IGMP (Internet Group Management Protocol)</option>
      <option value="3"> GGP (Gateway-to-Gateway)</option>
	  <option value="4"> IP (IP in IP (encapsulation))</option>
	  <option value="5"> T (Stream)</option>
	  <option value="6"> CP (Transmission Control Protocol)</option>
      <option value="7"> BT (Core Based Trees)</option>
      <option value="8"> GP (Exterior Gateway Protocol)</option>
	  <option value="9"> GP (Interior Gateway Protocol)</option>
	  <option value="10">BBN-RCC-MON (BBN RCC Monitoring)</option>
	  <option value="17">UDP (User Datagram Protocol)</option>
      <option value="18">MUX (Multiplexing Protocool)</option>
      <option value="27">RDP (Reliable Data Protocol)</option>
	  <option value="28">IRTP (Internet Reliable Transaction Protocol)</option>
	  <option value="45">IDRP (Inter-Domain Routing Protocol)</option>
	  <option value="46">RSVP (Reservation Protocol)</option>
      <option value="47">GRE (Generic Routing Encapsulation)</option>
      <option value="48">MHRP (Mobile Host Routing Protocol)</option>
	  <option value="50">ESP (Encapsulating Security Payload)</option>
	  <option value="51">AH (Authentication Header)</option>
	  <option value="54">NARP (NBMA Address Resolution Protocol)</option>
      <option value="55">MOBILE (IP Mobility)</option>
      <option value="88">EIGRP (Enhanced Interior Gateway Routing Protocol)</option>
	  <option value="89">OSPF (Open Shortest Path First)</option>
	  <option value="94">IPIP (IP-within-IP Encapsulation Protocol)</option>
	  <option value="95">MICP (Mobile Internetworking Control Protocol)</option>
      <option value="97">ETHERIP (Ethernet-within-IP Encapsulation)</option>
      <option value="98">ENCAP (Encapsulation Header)</option>
	  <option value="103"> PIM (Protocol Independent Multicast)</option>
	  <option value="112"> VRRP (Virtual Router Redundancy Protocol)</option>
	  <option value="113"> PGM (PGM Reliable Transport Protocol)</option>
      <option value="115"> L2TP (Layer Two Tunneling Protocol)</option>
      <option value="118"> STP (Schedule Transfer Protocol)</option>
	  <option value="121"> SMP (Simple Message Protocol)</option>
	  <option value="131"> PIPE (Private IP Encapsulation within IP)</option>
	  <option value="132"> SCTP (Stream Control Transmission Protocol)</option>
      <option value="133"> FC (Fibre Channel)</option>
	  <option value="137"> MPLS-in-IP (Multiprotocol Label Switching in IP)</option>
      <option value="139"> HIP (Host Identity Protocol)</option>
    </select> 
                   
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
                    <input placeholder="ingrese mensaje" id="msj" name="msj" type="text" class="validate">
                    <label for="first_name">Mensaje</label>
                    <input id="msj2" name="msj2" type="hidden">
                </div>
                
            </div>
            <!-- quinta fila  -->
            <div class="row">
               
              <div class="input-field col s12">
                <select id="destinario" name="destinario" >
                <option value="" disabled selected>Seleccione...</option>
                </select>          
                <label for="first_name">Usuario Destino</label>
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