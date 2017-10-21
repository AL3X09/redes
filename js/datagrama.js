/**
 * Created by Alex y Lorena on 19/10/2017.
 */
var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+ "/"; // lineas servidor local
var img=baseUrl+'img/x.png';
var re = /\s*,\s*/;
var checksum=0;

$(document).ready(function() {
    var num = 10;
    var res = String.fromCharCode(65);
    var letras=[];

if (typeof(codificado) === "undefined") {
    console.log("codificado no está definido.");
}else{
    //codificar();// jlaristizabal
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
    //en esta linea recivo el valor del campo version,combierto a binario y se lo envio
    //a la funcion llenar checksum
    $('#version').change(function() {
        var val1=$('#version').val();
        var resbinario=ConvertBase(val1).from(10).to(2); //esta es una variable global que tranforma a binario
        //res = parseInt(res, 10);
        var res = resbinario.split("");
        //alert( res2 );    
        //var names =res2;
        llenarchecksum(res);
        
      });
    //cabecera
     $('#cabecera').change(function() {
        var val2=$('#cabecera').val();
        var resbinario=ConvertBase(val2).from(10).to(2); //esta es una variable global que tranforma a binario
        //res = parseInt(res, 10);
        var res = resbinario.split("");
        //alert( res2 );    
        //var names =res2;
        llenarchecksum(res);
        
      });
     //tipoServicio
      $('#tipoServicio').change(function() {
        var val3=$('#tipoServicio').val();
        var resbinario=ConvertBase(val3).from(10).to(2); //esta es una variable global que tranforma a binario
        //res = parseInt(res, 10);
        var res = resbinario.split("");
        //alert( res2 );    
        //var names =res2;
        llenarchecksum(res);
        
      });
      //longitudT
       $('#longitudT').change(function() {
        var val4=$('#longitudT').val();
        var resbinario=ConvertBase(val4).from(10).to(2); //esta es una variable global que tranforma a binario
        //res = parseInt(res, 10);
        var res = resbinario.split("");
        //alert( res2 );    
        //var names =res2;
        llenarchecksum(res);
        //
      });
       //identificacion
       $('#identificacion').change(function() {
        var val5=$('#identificacion').val();
        var resbinario=ConvertBase(val5).from(10).to(2); //esta es una variable global que tranforma a binario
        //res = parseInt(res, 10);
        var res = resbinario.split("");
        //alert( res2 );    
        //var names =res2;
        llenarchecksum(res);
        
      });
      //flag
      $('#flag').change(function() {
        var val6=$('#flag').val();
        var resbinario=ConvertBase(val6).from(10).to(2); //esta es una variable global que tranforma a binario
        //res = parseInt(res, 10);
        var res = resbinario.split("");
        //alert( res2 );    
        //var names =res2;
        llenarchecksum(res);
        
      });
      //offset
      $('#offset').change(function() {
        var val7=$('#offset').val();
        var resbinario=ConvertBase(val7).from(10).to(2); //esta es una variable global que tranforma a binario
        //res = parseInt(res, 10);
        var res = resbinario.split("");
        //alert( res2 );    
        //var names =res2;
        llenarchecksum(res);
        
      });
      //ttl
      $('#ttl').change(function() {
        var val8=$('#ttl').val();
        var resbinario=ConvertBase(val8).from(10).to(2); //esta es una variable global que tranforma a binario
        //res = parseInt(res, 10);
        var res = resbinario.split("");
        //alert( res2 );    
        //var names =res2;
        llenarchecksum(res);
        
      });
       //protocolo
      $('#protocolo').change(function() {
        var val9=$('#protocolo').val();
        var resbinario=ConvertBase(val9).from(10).to(2); //esta es una variable global que tranforma a binario
        //res = parseInt(res, 10);
        var res = resbinario.split("");
        //alert( res2 );    
        //var names =res2;
        llenarchecksum(res);
        
      });


})

function volver() {
    location.href=baseUrl+"Administracion";
}

//para llamar vista
function viewcodificarIP() {
    location.href=baseUrl+'viewcodificarIp';
}

function llenarchecksum(valor){
    //debugger;
    valor.forEach(function(element) {
        
        if (element==="1") {
            checksum++;
        }
    });
//aqui coloca el val para que automaticamente lleve el valor al input
    //console.log(checksum);
   var val10=$('#checksum').val(checksum);
} 

function enviar() {
    $.ajax({
        url: baseUrl + 'Redes/leerDatagrama',
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

var ConvertBase = function (num) {
    return {
        from : function (baseFrom) {
            return {
                to : function (baseTo) {
                    return parseInt(num, baseFrom).toString(baseTo);
                }
            };
        }
    };
};

