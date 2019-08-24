<?php

include_once '../bd/funcionesBD.php';
session_name("ses_hacienda"); //Creamos una sesion nueva y la iniciamos
session_start();
//$texto = date('d-m-Y H:i:s');

$texto = (date('d-m-Y H:i:s') . "\n" . recoge('txt_cambio_turno'));

echo "Texto vale " . $texto;
guardarCambioTurno($texto, recoge('tipo_aviso'));
