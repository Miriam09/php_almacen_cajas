//function addLoadEvent(func) {
//  var oldonload = window.onload;
//  if (typeof window.onload != 'function') {
//    window.onload = func;
//  } else {
//    window.onload = function() {
//      oldonload();
//      func();
//    };
//  }
//}
// 
//function prepareInputsForHints() {
//  var inputs = document.getElementsByTagName("input");
//  for (var i=0; i<inputs.length; i++){
//    if (inputs[i].parentNode.getElementsByTagName("span")[0]) {
//      inputs[i].onfocus = function () {
//        this.parentNode.getElementsByTagName("span")[0].style.display = "inline";
//      }
//      inputs[i].onblur = function () {
//        this.parentNode.getElementsByTagName("span")[0].style.display = "none";
//      }
//    }
//  }
//  var selects = document.getElementsByTagName("select");
//  for (var k=0; k<selects.length; k++){
//    if (selects[k].parentNode.getElementsByTagName("span")[0]) {
//      selects[k].onfocus = function () {
//        this.parentNode.getElementsByTagName("span")[0].style.display = "inline";
//      }
//      selects[k].onblur = function () {
//        this.parentNode.getElementsByTagName("span")[0].style.display = "none";
//      }
//    }
//  }
//}
//addLoadEvent(prepareInputsForHints);
//







function irA(){
    window.location="../VISTA/FormularioSacarCaja.php";
}
function menu(){
    window.location="../VISTA/Menu.php";
}
//Metodo que controla los atributos especiales de cada tipo de caja para mostrarlos u ocultarlos en el formulario
function atributosEspeciales(_cajaSelected) {

    switch (_cajaSelected) {
        case "CajaSorpresa":
            //Mostramos la caja contenido
            document.getElementById("cajaContenido").style.display = "inline";
             var division = document.getElementById("div3");
             var colorCajaID = document.getElementById("colorCaja");
            division.removeChild(colorCajaID);
            var colorcaja = document.createElement('input');
            division.appendChild(colorcaja);
            colorcaja.setAttribute("type", "color");
            colorcaja.setAttribute("name", "colorCaja");
            colorcaja.setAttribute("id", "colorCaja");

            //Ocultamos placa y clave
            document.getElementById("cajaPlaca").style.display = "none";
            document.getElementById("cajaClave").style.display = "none";

            break;
        case "CajaNegra":
            //mostramos la caja placa
            document.getElementById("cajaPlaca").style.display = "inline";     
            
            var division = document.getElementById("div3");
            var colorCajaID = document.getElementById("colorCaja");
            division.removeChild(colorCajaID);
            var colorcaja = document.createElement('input');
            division.appendChild(colorcaja);
            colorcaja.setAttribute("type", "color");
            colorcaja.setAttribute("name", "colorCaja");
            colorcaja.setAttribute("id", "colorCaja");
            colorcaja.setAttribute("value", "#ff8000");
            colorcaja.setAttribute("disabled", "");
            //ocultamos contenido y clave
            document.getElementById("cajaContenido").style.display = "none";
            document.getElementById("cajaClave").style.display = "none";

            break;
        case "CajaFuerte":
            //mostramos la caja clave
            document.getElementById("cajaClave").style.display = "inline";
            //#ff8000
            var division = document.getElementById("div3");
            var colorCajaID = document.getElementById("colorCaja");
            division.removeChild(colorCajaID);
            var colorcaja = document.createElement('input');
            division.appendChild(colorcaja);
            colorcaja.setAttribute("type", "color");
            colorcaja.setAttribute("name", "colorCaja");
            colorcaja.setAttribute("id", "colorCaja");

            
            //ocultamos placa y contenido
            document.getElementById("cajaPlaca").style.display = "none";
            document.getElementById("cajaContenido").style.display = "none";

            break;
    }
}


//Mostraba el total de lejas libres que habia en una estanteria dependiendo de cual seleccionemos
function muestraLibres(_valor){
  
    var xmlhttp;
    if (_valor == ""){
        document.getElementById("lejaDisponible").innerHTML="";
    }
    if (window.XMLHttpRequest){ //coidgo para IE7+, Firefox, chrome, opera, safari
        xmlhttp=new XMLHttpRequest();
    }
    else {  //codigo para IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status ==200){
            document.getElementById("lejaDisponible").innerHTML=xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET","../js/AjaxLejasLibres.php?estanteriaDisponible=" + _valor,true);
    xmlhttp.send();
   
}


//Muestra los numeros de cada leja libre dependiendo de la estanteria que seleccionemos
function muestraLejasLibres(_valor){
  
    var xmlhttp;
    if (_valor == ""){
        document.getElementById("lejasDisponibles").innerHTML="";
        return;
    }
    if (window.XMLHttpRequest){ //coidgo para IE7+, Firefox, chrome, opera, safari
        xmlhttp=new XMLHttpRequest();
    }
    else {  //codigo para IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status ==200){
            document.getElementById("lejasDisponibles").innerHTML=xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET","../js/AjaxLejasLibres.php?estanteriaDisponible=" + _valor,true);
    xmlhttp.send();
   
}



//function muestraCajasBorrar(_valor){
//  
//    var xmlhttp;
//    if (_valor == ""){
//        document.getElementById("codigoCaja").innerHTML="";
//        return;
//    }
//    if (window.XMLHttpRequest){ //coidgo para IE7+, Firefox, chrome, opera, safari
//        xmlhttp=new XMLHttpRequest();
//    }
//    else {  //codigo para IE6, IE5
//        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//    }
//    xmlhttp.onreadystatechange=function(){
//        if(xmlhttp.readyState == 4 && xmlhttp.status ==200){
//            document.getElementById("codigoCaja").innerHTML=xmlhttp.responseText;
//        }
//    };
//    xmlhttp.open("GET","../js/AjaxCajasBorrar.php?tipoCajaBorrar=" + _valor,true);
//    xmlhttp.send();
//   
//}




//Select de la gestion almacen->listado cajas. Dependiendo de cual seleccionemos muestr
// un tipo de caja concreto o todos.
function ocultarCajas(){
  var _valor = document.getElementById("seleccionCaja").value;
    switch(_valor){
        case "--select--":
            document.getElementById("CajaSorpresa").style.display = "none";
            document.getElementById("CajaNegra").style.display = "none";
            document.getElementById("CajaFuerte").style.display = "none";
        break;
        case "Todas":
            document.getElementById("CajaSorpresa").style.display = "inline";
            document.getElementById("CajaNegra").style.display = "inline";
            document.getElementById("CajaFuerte").style.display = "inline";
            break;
        case "CAJA_SORPRESA":
            document.getElementById("CajaSorpresa").style.display = "inline";
            document.getElementById("CajaNegra").style.display = "none";
            document.getElementById("CajaFuerte").style.display = "none";
            break;
        case "CAJA_NEGRA":
            document.getElementById("CajaSorpresa").style.display = "none";
            document.getElementById("CajaNegra").style.display = "inline";
            document.getElementById("CajaFuerte").style.display = "none";
            break;
        case "CAJA_FUERTE":
            document.getElementById("CajaSorpresa").style.display = "none";
            document.getElementById("CajaNegra").style.display = "none";
            document.getElementById("CajaFuerte").style.display = "inline";
            break;
    }
   
}

//funcion para comprobar que en el formulario de cajas se introducen numeros enteros 
//AUN ESTA POR TERMINAR
function comprobarEnteros(_valor){
    var entero = parseInt(_valor);
    if(isNaN(entero)){
        return false;
        
    }
    else if(entero<=0){
        return false;
    }
    else{
        return true;
    }
}
function comprobarMaterial(){
     var todoBien = true;
     var material = document.getElementById("material");
     if (comprobarString(material.value)===false){
        material.style.background="#FF9E9E";
        todoBien = false;
    } else {
         material.style.background="white";
        todoBien = false;
    }
}
function comprobarLejas(){
    var todoBien= true;
     var lejas = document.getElementById("numLejas");
     if (comprobarEnteros(lejas.value)===false){
        lejas.style.background="#FF9E9E";
        todoBien=false;
    }
    else {
         lejas.style.background="white";
        todoBien = false;
    }
}

function comprobarPasillo(){
     var todoBien= true;
      var pasillo = document.getElementById("pasillo");
    if (comprobarString(pasillo.value)===false){
        pasillo.style.background="#FF9E9E";
        todoBien=false;
    }
    else{
        if (pasillo.lenght>1){
            pasillo.style.background="#FF9E9E";
            todoBien=false;
        }
         else {
         pasillo.style.background="white";
        todoBien = false;
    }
    }
}

function comprobarEstanteria() {
     var todoBien= true;
       var estanteria = document.getElementById("numEstanteria");
        if (comprobarEnteros(estanteria.value)===false){
        estanteria.style.background="#FF9E9E";
        todoBien=false;
    }
     else {
         estanteria.style.background="white";
        todoBien = false;
    }
}
function comprobarEstanterias(){
    var todoBien= true;
    var material = document.getElementById("material");
    var lejas = document.getElementById("numLejas");
    var pasillo = document.getElementById("pasillo");
    var estanteria = document.getElementById("numEstanteria");
    
    if (comprobarString(material.value)===false){
        material.style.background="#FF9E9E";
        todoBien=false;
    }
    if (comprobarEnteros(lejas.value)===false){
        lejas.style.background="#FF9E9E";
        todoBien=false;
    }
    if (comprobarString(pasillo.value)===false){
        pasillo.style.background="#FF9E9E";
        todoBien=false;
    }
    else{
        if (pasillo.lenght>1){
            pasillo.style.background="#FF9E9E";
            todoBien=false;
        }
    }
    if (comprobarEnteros(estanteria.value)===false){
        estanteria.style.background="#FF9E9E";
        todoBien=false;
    }
    if (todoBien===true){
        window.location="../CONTROLADOR/ControladorEstanteria.php";
    }
}
function muestraCajasDevol(_valor){
  
    var xmlhttp;
    if (_valor == ""){
        document.getElementById("codigoCajaDevol").innerHTML="";
        return;
    }
    if (window.XMLHttpRequest){ //coidgo para IE7+, Firefox, chrome, opera, safari
        xmlhttp=new XMLHttpRequest();
    }
    else {  //codigo para IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status ==200){
            document.getElementById("codigoCajaDevol").innerHTML=xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET","../js/AjaxCajasElegirDevolucion.php?tipoCajaDevol=" + _valor,true);
    xmlhttp.send();
   
}

//funcion para comprobar que en el formulario de cajas se introduce un string 
//AUN ESTA POR TERMINAR
function comprobarString(_valor){
    if(isNaN(_valor)){
        return true;
    }
    else{
        return false;
    }
}

//function CajasDevolucion(tipo){
//    var valor = document.getElementById("type");
//    switch (tipo){
//        case "CajaSorpresa":
//             document.getElementById("cajaContenido").style.display = "inline";
//             document.getElementById("cajaPlaca").style.display = "none";
//            document.getElementById("cajaClave").style.display = "none";
//            break;
//        case "CajaNegra":
//            document.getElementById("cajaPlaca").style.display = "inline";  
//             document.getElementById("cajaContenido").style.display = "none";
//            document.getElementById("cajaClave").style.display = "none";
//            break;
//        case "CajaFuerte":
//            document.getElementById("cajaClave").style.display = "inline";
//            document.getElementById("cajaPlaca").style.display = "none";
//            document.getElementById("cajaContenido").style.display = "none";
//            break;
//    }
//}

function comprobarUsuarios(validacion){
    if(validacion==false){
   document.getElementById("error").className =
   document.getElementById("error").className.replace
      ( /(?:^|\s)oculto(?!\S)/g , '' );
      
       document.getElementById("error").className ="error";
    }
    
}

