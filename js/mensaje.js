/**
 * Created by Alex y Lorena on 19/10/2017.
 */
var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+ "/"; // lineas servidor local

$(document).ready(function() {

//llamo una funcion y cargo los uisarios de la tabla
callUsuarios();

//llamo funcion inicializar select
initSelect();
//llamo funcion cargar los mensajes
traerMensajes();
//llamo funcion cargar el ultimo mensajes codificado
traerDatagramaCodificado()

var modalButtonOnly = new tingle.modal({
    closeMethods: [],
    footer: true,
    stickyFooter: true
});
var btn5 = document.querySelector('.tingle_addon');
console.l
btn5.addEventListener('click', function(){
    modalButtonOnly.open();
});

 modalButtonOnly.setContent(document.querySelector('#contdatagrama').innerHTML);

 modalButtonOnly.addFooterBtn('Cerrar', 'waves-effect waves-light btn red tingle-btn--pull-right', function(){
    //aqui logica para cancelar
    modalButtonOnly.close();
});

 
var modalButtonOnly2 = new tingle.modal({
    closeMethods: [],
    footer: true,
    stickyFooter: true
});
var btn6 = document.querySelector('.tingle_addon_2');
btn6.addEventListener('click', function(){
    modalButtonOnly2.open();
    
   
});

 modalButtonOnly2.setContent(document.querySelector('.tingle_addon_window_2').innerHTML);

 modalButtonOnly2.addFooterBtn('Cerrar', 'waves-effect waves-light btn red tingle-btn--pull-right', function(){
    //aqui logica para cancelar
    modalButtonOnly2.close();
});



 

}) 


function volver1() {
    location.href=baseUrl+"Redes";
}

function traerMensajes() {
    
    $("#contmensaje").append('<div class="row">'+
            '<div class="input-field col s3 m3">'+
                    '<div class="card-panel red lighten-1" id="ipenvio">Versión:</div>'+
                '</div>'+
                '<div class="input-field col s7 m7">'+
                     '<div class="card-panel teal lighten-2" id="mensaje">Mensaje:<br/>$value</div>'+
                '</div>'+
                '<div class="input-field col s2 m2">'+
                    '<div class="card-panel blue lighten-1" id="chksum">Versión:</div>'+
             '</div>'+
          '</div>');
}

function traerDatagramaSinCodificar() {
    var dato1 = $("#ip").val();
    var dato2 = $("#msj1").val();
    var dato3 = $("#ip2").val();	
    
  
}

function traerDatagramaCodificado() {
  var value=1;

    $("#codificado").append('<h6 class="header center orange-text">ULTIMO DATAGRAMA CODIFICADO EN BINARIO</h6>'+
      '<div class="row">'+
            // Version
                 '<div class="col s12 m3 l3">'+
                 '<div class="card-panel blue-grey lighten-1" id="versiónbinario" >Versión:</br>'+value+'</div>'+
                 '</div>'+
            // Longitud Cabecera
                 '<div class="col s12 m3 l3">'+
                 '<div class="card-panel blue-grey lighten-2">Cabecera:</br>'+value+'</div>'+
                 '</div>'+
            //Tipo Servicio
                 '<div class="col s12 m3 l3">'+
                 '<div class="card-panel blue-grey lighten-3">Tipo de servico:</br>'+value+'</div>'+
                 '</div>'+

             //Longitud Total
                 '<div class="col s12 m3 l3">'+
                 '<div class="card-panel blue-grey lighten-4">Logintud Total:</br>'+value+'</div>'+
                 '</div>'+
    '</div>'+
    '<div class="row">'+
            //Identificacion
                 '<div class="col s12 m5 l5">'+
                 '<div class="card-panel deep-orange darken-5">Identificación:</br>'+value+'</div>'+
                 '</div>'+
             //flag
                 '<div class="col s12 m3 l3">'+
                 '<div class="card-panel deep-orange darken-3">Flag:</br>'+value+'</div>'+
                 '</div>'+
              //offset
                 '<div class="col s12 m4 l4">'+
                 '<div class="card-panel deep-orange darken-3">Offset:</br>'+value+'</div>'+
                 '</div>'+
     '</div>'+
    '<div class="row">'+
             //TTL
                 '<div class="col s12 m4 l4">'+
                 '<div class="card-panel yellow darken-3">TTL:</br>'+value+'</div>'+
                 '</div>'+
             //Protocolo
                 '<div class="col s12 m4 l4">'+
                 '<div class="card-panel yellow darken-3">Protocolo:</br>'+value+'</div>'+
                 '</div>'+
             //Checksum
                 '<div class="col s12 m4 l4">'+
                 '<div class="card-panel yellow darken-3">Checksum:</br>'+value+'</div>'+
                 '</div>'+
     '</div>'+
    '<div class="row">'+
        
                 '<div class="col s12 m12 l12">'+
                 '<div class="card-panel teal lighten-3">Ip Envio:</br>'+value+'</div>'+
                 '</div>'+
    '</div>'+
    '<div class="row">'+
                 '<div class="col s12 m12 l12">'+
                 '<div class="card-panel red darken-3">Mensaje:</br>'+value+'</div>'+
                 '</div>'+
     '</div>'+
    '<div class="row">'+
                 '<div class="col s12 m12 l12">'+
                 '<div class="card-panel purple darken-3">Ip Recive:</br>'+value+'</div>'+
                 '</div>'+

    '</div>'+
    '</div>');
    
}


 function callUsuarios() {

    $.ajax({
        url: baseUrl + 'Usuarios/listarUsuarios',
        method: 'GET',
        success: function (data) {
            var option = $('<option></option>').attr("value", "").text("Seleccione...");
            $.each(data, function (k, v) {
                option = $('<option></option>').attr("value", v.idusuaro).text(v.nombre1 +' '+v.nombre2+' '+v.apellido1+' '+v.apellido2);
                $("#destinario").append(option);

            });
            $("#destinario").material_select();
        }
        
    });
}

function initSelect() {
    $('#tipoServicio').material_select();
    $('#protocolo').material_select();
    $('#destinario').material_select();
  }
