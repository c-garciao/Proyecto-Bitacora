<?php

include_once '../bd/funcionesBD.php';
session_name("ses_hacienda"); //Creamos una sesion nueva y la iniciamos
session_start();
$accion = recoge('accion');
switch ($accion) {
    case 'Borrar':
        //print("borrar");
        if (empty($_POST['id_registos_bitacora'])) {
            $_SESSION["alerta_c_t"] = TRUE;
            header("Location:../../revisarBitacora.php");
            die();
        } else if (!empty($_POST['id_registos_bitacora'])) {
            foreach ($_POST['id_registos_bitacora'] as $registros) {
                $DATOS['id_bit'][] = $registros; // . ",";
            }
            $borrar = implode(",",$DATOS['id_bit']);
            borraRegistro('bitacora', 'id_registro', $borrar);
        }
        
        print_r($DATOS['id_bit']);
        
        break;
    case 'Modificar':
        print("actualizar");

        break;
    case 'Buscar':
        print("buscar");

        break;
    default :
        print("error");
        break;
}


//print_r($DATOS['valores_c_t']);

/*if (empty($_POST['mensajes'])) {
    header("Location:../../revisarBitacora.php");
    die();
} else if (!empty($_POST['mensajes'])) {
    foreach ($_POST['mensajes'] as $check) {
        $DATOS['valores_c_t'][] = $check;// . ",";
    }
}*/