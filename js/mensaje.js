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
traerDatagramaCodificado();

var modalButtonOnly = new tingle.modal({
    closeMethods: [],
    footer: true,
    stickyFooter: true
});
var btn5 = document.querySelector('.tingle_addon');
console.l
btn5.addEventListener('click', function(){
    modalButtonOnly.open();
    //llamo funcion cargar el ultimo mensajes codificado
    traerDatagramaSinCodificar()
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

function volver() {
    location.href=baseUrl+"Administracion";
}

function traerMensajes() {

    var dato1 = $("#idusuario").val();

    $.ajax({
        url: baseUrl + 'MensajeController/listarMensaje',
        method: 'POST',
        data: {'valor':dato1},
        success: function (data) {
            //console.log(data);
            $.each(data, function (k, v) {
            
                $("#contmensaje").append('<div class="row">'+
                '<div class="input-field col s3 m3">'+
                        '<div class="card-panel red lighten-1" id="ipenvio">'+v.ip_envio+'</div>'+
                    '</div>'+
                    '<div class="input-field col s7 m7">'+
                         '<div class="card-panel teal lighten-1" id="mensaje">Mensaje:<br/>'+v.mensaje+'</div>'+
                    '</div>'+
                    '<div class="input-field col s2 m2">'+
                        '<div class="card-panel blue lighten-1" id="chksum">'+v.checksum+'</div>'+
                 '</div>'+
              '</div>');

            });
            
        }
        
    });
    
   
}

function traerDatagramaSinCodificar() {
    
    var dato1 = $("#idusuario").val();
    
        $.ajax({
            url: baseUrl + 'MensajeController/traerMSJsinCodificar',
            method: 'POST',
            data: {'valor':dato1},
            success: function (data) {
                //console.log(data);
                $.each(data, function (k, v) {
                    $("#version").val(v.version);
                    $("#cabecera").val(v.cabecera);
                    $("#tipoServicio").val(v.tipoServicio);
                    $("#longitudT").val(v.longitud);
                    $("#identificacion").val(v.identificacion);
                    $("#flag").val(v.flag);
                    $("#offset").val(v.offset);
                    $("#ttl").val(v.ttl);
                    $("#protocolo").val(v.protocolo);
                    $("#checksum").val(v.checksum);
                    $("#ip1").val(v.ip_envio);
                    $("#msj").val(v.mensaje);
                    $("#destinario").val(v.usuario);
                });
                
            }
            
        });	
  
}

function traerDatagramaCodificado() {

    var dato1 = $("#idusuario").val();
    
        $.ajax({
            url: baseUrl + 'MensajeController/traerMSJCodificado',
            method: 'POST',
            data: {'valor':dato1},
            async: false,
            success: function (data) {
                
                //$.each(data, function (k, v) {
                    //console.log(data);
                    $("#codificado").append('<h6 class="header center orange-text">ULTIMO DATAGRAMA CODIFICADO EN BINARIO</h6>'+
                    '<div class="row">'+
                          // Version
                               '<div class="col s12 m3 l3">'+
                               '<div class="card-panel blue-grey lighten-1" id="versiónbinario" >Versión:</br>'+data[0].version+'</div>'+
                               '</div>'+
                          // Longitud Cabecera
                               '<div class="col s12 m3 l3">'+
                               '<div class="card-panel blue-grey lighten-2">Cabecera:</br>'+data[0].cabecera+'</div>'+
                               '</div>'+
                          //Tipo Servicio
                               '<div class="col s12 m3 l3">'+
                               '<div class="card-panel blue-grey lighten-3">Tipo de servico:</br>'+data[0].tipo_servicio+'</div>'+
                               '</div>'+
              
                           //Longitud Total
                               '<div class="col s12 m3 l3">'+
                               '<div class="card-panel blue-grey lighten-4">Logintud Total:</br>'+data[0].longitud+'</div>'+
                               '</div>'+
                  '</div>'+
                  '<div class="row">'+
                          //Identificacion
                               '<div class="col s12 m5 l5">'+
                               '<div class="card-panel deep-orange darken-5">Identificación:</br>'+data[0].identificación+'</div>'+
                               '</div>'+
                           //flag
                               '<div class="col s12 m3 l3">'+
                               '<div class="card-panel deep-orange darken-3">Flag:</br>'+data[0].flag+'</div>'+
                               '</div>'+
                            //offset
                               '<div class="col s12 m4 l4">'+
                               '<div class="card-panel deep-orange darken-3">Offset:</br>'+data[0].offset+'</div>'+
                               '</div>'+
                   '</div>'+
                  '<div class="row">'+
                           //TTL
                               '<div class="col s12 m4 l4">'+
                               '<div class="card-panel yellow darken-3">TTL:</br>'+data[0].ttl+'</div>'+
                               '</div>'+
                           //Protocolo
                               '<div class="col s12 m4 l4">'+
                               '<div class="card-panel yellow darken-3">Protocolo:</br>'+data[0].protocolo+'</div>'+
                               '</div>'+
                           //Checksum
                               '<div class="col s12 m4 l4">'+
                               '<div class="card-panel yellow darken-3">Checksum:</br>'+data[0].checksum+'</div>'+
                               '</div>'+
                   '</div>'+
                  '<div class="row">'+
                      
                               '<div class="col s12 m12 l12">'+
                               '<div class="card-panel teal lighten-3">Ip Envio:</br>'+data[0].ip_envio+'</div>'+
                               '</div>'+
                  '</div>'+
                  '<div class="row">'+
                               '<div class="col s12 m12 l12">'+
                               '<div class="card-panel red darken-3">Mensaje:</br>'+data[0].mensaje+'</div>'+
                               '</div>'+
                   '</div>'+
                  '<div class="row">'+
                               '<div class="col s12 m12 l12">'+
                               '<div class="card-panel purple darken-3">Usuario Recive:</br>'+data[0].usu_datagrama+'</div>'+
                               '</div>'+
              
                  '</div>'+
                  '</div>');                  
                   
                //});//("#codificado").append
                
            }
            
        });	

    
    
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
