function validarTexto(campo) {
    var texto = document.getElementById(campo).value;
    if (texto === "") {
        alert("Error. No puede dejar el campo vacío");
        return false;
    } else if (texto === " ") {
        alert("Error. Debe completarlo con texto");
        return false;
    } else {
        return true;
    }
}
function cuentaPalabras() {
    var x = document.getElementById("txtarea_ct").value;
    var y = x.length;
    document.getElementById("demo").innerHTML = (400 - y) + " palabras restantes";
}
function confirmaBorrado(nombre) {
    var seleccionados = document.getElementsByName(nombre);
    contador = 0;
    for (var i = 0; i < seleccionados.length; i++) {
        if (seleccionados[i].checked === true) {
            contador++;
        }
    }
    switch (contador) {
        case 0:
            alert("Error. No ha seleccionado ningún registro para borrar");
            return false;
            //break;
        default :
            return confirm("¿De verdad que quieres borrar los datos?. \n\tEsto es IRREVERSIBLE");
    }
}
function ocultaElemento(boton) {
    var btn = boton.id;
    var chk = document.getElementsByName('id_registos_bitacora[]');
    var chk_radio = document.getElementsByName('id_actu_bitacora[]');
    switch (btn) {
        case 'btn_elim':
            document.getElementById('submit_elimina').style.display = "block";
            document.getElementById('submit_modifica').style.display = "none";
            document.getElementById('submit_busqueda').style.display = "none";
            document.getElementById('cuadro_busqueda').style.display = "none";
            //document.getElementById('radio_btn_bitacora').style.display = "none";
            for (var i = 0; i < chk.length; i++) {
                chk[i].style.display = "block";
                for (var j = 0; j < chk_radio.length; j++) {
                    chk_radio[j].style.display = "none";
                }
            }
            break;
        case 'btn_actu':
            document.getElementById('submit_modifica').style.display = "block";
            document.getElementById('submit_busqueda').style.display = "none";
            document.getElementById('submit_elimina').style.display = "none";
            document.getElementById('cuadro_busqueda').style.display = "none";
            for (var i = 0; i < chk.length; i++) {
                chk[i].style.display = "none";
                for (var j = 0; j < chk_radio.length; j++) {
                    chk_radio[j].style.display = "block";
                }
            }

            break;
        case 'btn_busq':
            document.getElementById('submit_busqueda').style.display = "block";
            document.getElementById('cuadro_busqueda').style.display = "block";
            document.getElementById('submit_modifica').style.display = "none";
            document.getElementById('submit_elimina').style.display = "none";
            for (var j = 0; j < chk_radio.length; j++) {
                chk_radio[j].style.display = "none";
            }
            //document.getElementById('radio_btn_bitacora').style.display = "none";
            break;
    }
}
function cuentaDatos(nombre) {
    var seleccionados = document.getElementsByName(nombre);
    contador = 0;
    for (var i = 0; i < seleccionados.length; i++) {
        if (seleccionados[i].checked === true) {
            contador++;
        }
    }
    if (contador === 0) {
        document.getElementById("numero_elementos").innerHTML = "";
    } else {
        document.getElementById("numero_elementos").innerHTML = "Borrar " + contador + " elementos";
    }

}