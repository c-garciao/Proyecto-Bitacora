//Carlos Garcia Oliva 2019
/**
 * 
 * Listener que continuamente comprueba si el el usuario desea refrescar la página. En caso afirmativo, muestra un mensaje de advertencia al usuario (no es compatible en todos los navegadores el mensaje personalizado)
 */
/*Si se completan todos los campos solicitados, no se le preguntara al usuario antes de enviar el formulario (por eso asignamos el valor TRUE a la hora de pulsar el boton del formulario en el index.php)*/
var formulario_ok = false;
window.addEventListener("beforeunload", function (event) {
    if (!formulario_ok) {
        event.returnValue = "Se perderan los datos, ¿quieres continuar?.";
        var b_div = document.getElementById('caja1');
        b_div.style.display = "none";
    }
});

function defineFecha() {//Funcion OBSOLETA. Se realiza desde PHP debido a multitud de problemas (no hay ninunga regla acerca de como ha de tratar HTML las fechas (no es posible especificarle  si DD/MM/YYYY, MM/DD/YYYY, etc.))
    var fecha = new Date;
    alert("La fecha de hoy es " + fecha.getDate() + "-" + (fecha.getMonth() + 1) + "-" + fecha.getFullYear());
    dia = document.getElementById('num_dia');
    var dia_ = fecha.getDate();
    var mes_ = fecha.getMonth() + 1;
    var anio_ = fecha.getFullYear();
    if (dia_ < 10) {
        dia_ = '0' + dia_;
    }
    if (mes_ < 10) {
        mes_ = '0' + mes_;
    }
    fechaActual = anio_ + '/' + mes_ + '/' + dia_;
    alert("Fecha act vale: " + fechaActual);
    document.getElementById("num_dia").valueAsDate = new Date();
}
/*Funcion que solicita confirmacion por parte del usuario antes de borrar los datos del formulario (vease la llamada a la funcion desde el formulario)*/
function borrar_formulario() {
    document.getElementById('aviso').style.display = "none";
    return confirm("¿De verdad que quieres borrar los datos?. \nTendrás que volver a escribirlos de nuevo");
}
function borrar_alertas() {
    var b_div = document.getElementById('caja1');
    b_div.style.display = "none"
}
/*Funcion para cambiar el valor de la columna "Tiempo en realizar la operativa"*/
function aplicarOper() {
    var valor;
    var cambiaValor = document.getElementById('aplicar_op');
    if (document.getElementById('no_oper').checked === true) { //Comprobamos si está seleccionado el valor "No se aplica operativa"
        valor = document.getElementById('txt_tiempo_op');//De ser así, obtenemos su valor y lo cambiamos al valor de la etiqueta <td>
    } else {
        valor = document.getElementById('tiempo_operativa'); //De lo contrario (significa que no está seleccionado), recogemos el valor (ha de ser numerico, debido a que se ha restringido desde el propio formulario)
    }
    cambiaValor.value = valor;
}