/**
 * Created by Alex on 11/03/2017.
 */
var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+ "/"; // lineas servidor local
var img=baseUrl+'img/x.png';
var letras=[];


$(document).ready(function() {
    var num = 10;
    var res = String.fromCharCode(65);

    var cadenaAnalizar = 'hola'; // 
    for (var i = 0; i< cadenaAnalizar.length; i++) {
            var caracter = cadenaAnalizar.charAt(i);
            //caracter.charCodeAt(i)
             //console.log(caracter.charCodeAt());
             //letras.push(caracter.charCodeAt());
       }
       //console.log(letras);
   

if (typeof(codificado) === "undefined") {
    console.log("codificado no está definido.");
}else{
    codificar();
    enviarDatos();
}

})

function volver() {
    location.href=baseUrl+"Administracion";
}

function volver1() {
    location.href=baseUrl+"Redes";
}

//para llamar vista
function viewcodificarIP() {
    location.href=baseUrl+'Redes/viewcodificarIp';
}

//para llamar vista
function viewDatagrama() {
    location.href=baseUrl+'Redes/viewDatagrama';
}

function enviar() {
    $.ajax({
        url: baseUrl + 'Redes/leerMensaje',
        method: 'POST',
        data: $("#formusuario").serialize(),
        success: function (data) {
            //console.log(data);
            var $toastContent = $('<span>'+data.msg+'</span>');
            Materialize.toast($toastContent, 10000);
            location.href=baseUrl+'Redes/leerMensaje';

        }
    });
}


function enviarDatos() {
    var dato1 = $("#ip").val();
    var dato2 = $("#msj1").val();
    var dato3 = $("#ip2").val();
    $("#codificado2").append('<div class="row">'+
    '<div class="col s12 m6 l3">'+
    '<div class="card-panel teal lighten-1">'+ dato1 +'</div>'+
    '</div><div class="col s12 m6 l3">'+
    '<div class="card-panel red darken-1" >'+ dato2 +'</div>'+
    '<input placeholder="ingrese números" id="mensajejq" type="hidden" value="'+ dato2 +'" >'+
    '</div><div class="col s12 m6 l3">'+
    '<div class="card-panel purple lighten-1">'+ dato3 +'</div>'+
    '</div>'+
    '</div>');
    $("#codificado2").append('<div class="row">'+
    '<button class="btn waves-effect waves-light" type="button" name="action" onclick="volver1()">Volver'+
    '<i class="material-icons right">send</i>'+
    '</button></div>');
}

function codificar2() {
   
    var datores = $("#mensaje").val();

    for (var i = 0; i< datores.length; i++) {
            var caracter = datores.charAt(i);
            //caracter.charCodeAt(i)
             //console.log(caracter.charCodeAt());
             letras.push(caracter.charCodeAt());
       }
       console.log(letras);
       $("#msj2").val(letras);
      
   
}

