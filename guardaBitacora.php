<?php
include_once './funcionesBD.php';
session_name("ses_hacienda"); //Creamos una sesion nueva y la iniciamos
session_start();
/*if (!isset($_SESSION["no_volver"])){
    echo '<h1>Error. Esta página ha expirado</h1>';
    echo '<a href="./index.php">Introducir nuevo registro</>';
    exit();
}*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Pagina Bitacora</title>
        <link rel="stylesheet" type="text/css" href="recursos/estilos/estilo_comun.css"/>

         <!-- <script type="text/javascript" src=""/> -->

    </head>
    <body>
        <div id="menu">
            <p><a href="index.php">Añadir a bitacora</a> <a href="#" class="menu_opc_seleccionada">Revisar Bitacora</a> <a href="">Informes (en pruebas)</a></p>
        </div>
        <?php
        //unset($_SESSION["registros"]);
        $operador = recoge('nombre_oper');
        $fecha = recoge('dia');
        //$fecha = date_create_from_format('Y-m-d', recoge('dia'));
        //$fecha = date_parse($fecha);
        //$fecha = strtotime('Y/m/d',$fecha);
        //$fecha = strtotime('d/m/Y',$fecha);
        $metodo_entrada = recoge('metodo_entrada');
        $hora_aparicion = recoge('hora_aparicion');
        $hora_desaparicion = recoge('hora_desaparicion');
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

        /*echo 'Operador: ' . $operador . '<br/>';
        //echo 'fecha_completa:' . $fecha . '<br/>';
        echo 'Metodo Entrada: ' . $metodo_entrada . '<br/>';
        echo 'Hora Aparicion: ' . $hora_aparicion . '<br/>';
        echo 'Hora Desaparicion: ' . $hora_desaparicion . '<br/>';
        echo 'Aplicar operativa: ' . $aplicar_op . '<br/>';
        echo 'Llamada: ' . $llamada . '<br/>';
        echo 'Grupo Resolutor: ' . $grupo_res . '<br/>';
        echo 'Técnico: ' . $tecnicos_ . '<br/>';
        echo 'Correo: ' . $correo_ . '<br/>';
        echo 'Host: ' . $txt_host . '<br/>';
        echo 'Servicio: ' . $txt_servicio . '<br/>';
        echo 'Alarma: ' . $txt_alarma . '<br/>';

        echo 'oper_real: ' . $oper_real . '<br/>';
        echo 'accion_realizada: ' . $accion_realizada . '<br/>';
        echo 'oper_ok: ' . $oper_ok . '<br/>';
        echo 'serv_bi: ' . $serv_bi . '<br/>';

        echo 'Grupo escalado: ' . $grupo_esc . '<br/>';
        echo 'id_pandora: ' . $id_pandora . '<br/>';
        echo 'comentarios_pandora: ' . $comentarios_pandora . '<br/>';
        echo 'acciones_realizadas: ' . $acciones_realizadas . '<br/>';

       /* $_SESSION["registros"][] = $metodo_entrada;
        $_SESSION["registros"][] = $operador;
        $_SESSION["registros"][] = $fecha;
        $_SESSION["registros"][] = $hora_aparicion;
        $_SESSION["registros"][] = $hora_desaparicion;
        $_SESSION["registros"][] = $tiempo_oper;
        $_SESSION["registros"][] = $llamada;
        $_SESSION["registros"][] = $grupo_res;
        $_SESSION["registros"][] = $tecnicos_;
        $_SESSION["registros"][] = $correo_;
        $_SESSION["registros"][] = $txt_host;
        $_SESSION["registros"][] = $txt_servicio;
        $_SESSION["registros"][] = $txt_alarma;
        $_SESSION["registros"][] = $oper_real;
        $_SESSION["registros"][] = $accion_realizada;
        $_SESSION["registros"][] = $oper_ok;
        $_SESSION["registros"][] = $serv_bi;
        $_SESSION["registros"][] = $grupo_esc;
        $_SESSION["registros"][] = $id_pandora;
        $_SESSION["registros"][] = $comentarios_pandora;
        $_SESSION["registros"][] = $acciones_realizadas;
        for($i = 0;
        $i<sizeof($_SESSION["registros"]);
        $i++){
        print '<p>' . $_SESSION["registros"][$i] . '</p>';
        }*/
        //$patata = date_format($fecha, 'd/m/Y');
        //echo 'Fecha Actual: ' . $patata;
        //$_SESSION["no_volver"] = TRUE;
        guardar_registro($metodo_entrada, $operador, $fecha, $hora_aparicion, $hora_desaparicion, $tiempo_oper, $llamada, $grupo_res, $tecnicos_, $correo_, $txt_host, $txt_servicio, $txt_alarma, $oper_real, $accion_realizada, $oper_ok, $serv_bi, $grupo_esc, $id_pandora, $comentarios_pandora, $comentarios_pandora, $acciones_realizadas);

        //g_registro();
        //unset($_SESSION["registros"]);
?>
    </body>
</html>