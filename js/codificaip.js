/**
 * Created by Alex on 11/03/2017.
 */
var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+ "/"; // lineas servidor local
var img=baseUrl+'img/x.png';

$(document).ready(function() {
    var num = 10;
    var res = String.fromCharCode(65);
    var letras=[];

if (typeof(codificado) === "undefined") {
    console.log("codificado no está definido.");
}else{
    codificar();
    enviarDatos();
}
//alert( num.toString(2) ); // "1111101"
//alert( String.fromCharCode(65) ); // "1111101"

var cadenaAnalizar = 'Al ex C'; // 
 for (var i = 0; i< cadenaAnalizar.length; i++) {
         var caracter = cadenaAnalizar.charAt(i);
         //caracter.charCodeAt(i)
          //console.log(caracter.charCodeAt());
          letras.push(caracter.charCodeAt());
    }
    //console.log(letras);

})

function volver() {
    location.href=baseUrl+"Administracion";
}

//para llamar vista
function viewcodificarIP() {
    location.href=baseUrl+'viewcodificarIp';
}

//para llamar vista
function viewDatagrama() {
    location.href=baseUrl+'Redes';
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

function volver1() {
    location.href=baseUrl+"Redes";
}


function enviarDatos() {
    var dato1 = $("#ip").val();
    var dato2 = $("#msj1").val();
    var dato3 = $("#ip2").val();
    $("#codificado2").append('<div class="row">'+
    '<div class="col s12 m6 l3">'+
    '<div class="card-panel teal lighten-1">'+ dato1 +'</div>'+
    '</div><div class="col s12 m6 l3">'+
    '<div class="card-panel red darken-1">'+ dato2 +'</div>'+
    '</div><div class="col s12 m6 l3">'+
    '<div class="card-panel purple lighten-1">'+ dato3 +'</div>'+
    '</div>'+
    '</div>');
    $("#codificado2").append('<div class="row">'+
    '<button class="btn waves-effect waves-light" type="button" name="action" onclick="volver1()">Volver'+
    '<i class="material-icons right">send</i>'+
    '</button></div>');
}

