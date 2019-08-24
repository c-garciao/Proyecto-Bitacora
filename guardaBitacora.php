<?php

include_once './recursos/bd/funcionesBD.php';
session_name("ses_hacienda"); //Creamos una sesion nueva y la iniciamos
session_start();

$operador = recoge('nombre_oper');
$fecha = recoge('dia');
$metodo_entrada = recoge('metodo_entrada');
$hora_aparicion = recoge('hora_aparicion');
$hora_desaparicion = recoge('hora_desaparicion');
$fecha_desaparicion = recoge('fecha_desaparicion');
$hora_desaparicion .= $fecha_desaparicion;
$tiempo_oper = recoge('tiempo_oper');
$llamada = recoge('llamadas_');
$grupo_res = recoge('grupo_res');
$correo_ = recoge('correo_');
$grupo_esc = recoge('escalado_');
$id_pandora = recoge('id_pandora');
/**/
$txt_alarma = preg_replace('/\r|\n/', " ", recoge('txt_alarma')); //remplazamos los saltos de línea por espacios en blanco (limpiamos los datos antes de insertalos en la base de datos)
$txt_servicio = preg_replace('/\r|\n/', " ", recoge('txt_servicio'));
$txt_host = preg_replace('/\r|\n/', " ", recoge('txt_host'));
$tecnicos_ = recoge('tecnicos_');
$oper_real = recoge('oper_real');
$accion_realizada = recoge('accion_realizada');
$oper_ok = recoge('oper_ok');
$serv_bi = recoge('serv_bi');
$comentarios_pandora = preg_replace('/\r|\n/', "", recoge('comentarios_pandora'));
$acciones_realizadas = recoge('acciones_realizadas');
$aplicar_op = recoge('tiempo_op');
guardar_registro($metodo_entrada, $operador, $fecha, $hora_aparicion, $hora_desaparicion, $tiempo_oper, $llamada, $grupo_res, $tecnicos_, $correo_, $txt_host, $txt_servicio, $txt_alarma, $oper_real, $accion_realizada, $oper_ok, $serv_bi, $grupo_esc, $id_pandora, $comentarios_pandora, $comentarios_pandora, $acciones_realizadas);



