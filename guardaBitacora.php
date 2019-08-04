<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Pagina Bitacora</title>
        <link rel="stylesheet" type="text/css" href="./estilo_comun.css"/>

         <!-- <script type="text/javascript" src=""/> -->
        
    </head>
    <body>
        <div id="menu">
            <p><a href="index.php">Añadir a bitacora</a> <a href="#" class="menu_opc_seleccionada">Revisar Bitacora</a> <a href="">Informes (en pruebas)</a></p>
        </div>
        <?php
        include_once './funcionesBD.php';
        session_name("ses_hacienda"); //Creamos una sesion nueva y la iniciamos
        session_start();
        $operador = recoge('nombre_oper');
        $fecha = recoge('dia');
        
        //$fecha = date_parse($fecha);
        //$fecha = strtotime('Y/m/d',$fecha);
        //$fecha = strtotime('d/m/Y',$fecha);
        $metodo_entrada = recoge('metodo_entrada');
        $hora_aparicion = recoge('hora_aparicion');
        $hora_desaparicion = recoge('hora_desaparicion');
        $tiempo_oper;
        $llamada=  recoge('llamadas_');
        $grupo_res=  recoge('grupo_res');
        $correo_=  recoge('correo_');
        $grupo_esc=  recoge('escalado_');
        $id_pandora=  recoge('id_pandora');
        /**/
        $txt_alarma=  recoge('txt_alarma');
        $txt_servicio=  recoge('txt_servicio');
        $txt_host=  recoge('txt_host');
        $tecnicos_=  recoge('tecnicos_');
        
        $oper_real=  recoge('oper_real');
        $accion_realizada=  recoge('accion_realizada');
        $oper_ok=  recoge('oper_ok');
        $serv_bi=  recoge('serv_bi');
        $comentarios_pandora=  recoge('comentarios_pandora');
        $acciones_realizadas=  recoge('acciones_realizadas');
        
        $aplicar_op=  recoge('tiempo_op');
        
        
        
        echo 'Operador: ' . $operador . '<br/>';
        //echo 'fecha_completa:' . $fecha . '<br/>';
        echo 'Metodo Entrada: ' . $metodo_entrada . '<br/>';
        echo 'Hora Aparicion: ' . $hora_aparicion . '<br/>';
        echo 'Hora Desaparicion: ' . $hora_desaparicion . '<br/>';
        echo 'Llamada: ' . $llamada . '<br/>';
        echo 'Grupo Resolutor: ' . $grupo_res . '<br/>';
        echo 'Correo: ' . $correo_ . '<br/>';
        echo 'Grupo escalado: ' . $grupo_esc . '<br/>';
        echo 'id_pandora: ' . $id_pandora. '<br/>';

        echo 'txt_alarma: ' . $txt_alarma. '<br/>';
        echo 'txt_servicio: ' . $txt_servicio. '<br/>';
        echo 'txt_host: ' . $txt_host. '<br/>';
        echo 'tecnicos_: ' . $tecnicos_. '<br/>';
        
        echo 'oper_real: ' . $oper_real. '<br/>';
        echo 'accion_realizada: ' . $accion_realizada. '<br/>';
        echo 'oper_ok: ' . $oper_ok. '<br/>';
        echo 'serv_bi: ' . $serv_bi. '<br/>';
        echo 'comentarios_pandora: ' . $comentarios_pandora. '<br/>';
        echo 'acciones_realizadas: ' . $acciones_realizadas. '<br/>';
        
        echo 'aplicar_op: ' . $aplicar_op. '<br/>';
        
        
        
        
        
        /*$fecha = date_create_from_format('Y-m-d', $fecha);
        echo date_format($fecha, 'd/m/Y');*/
        $fecha = date_create_from_format('Y-m-d', $fecha);
        //echo date_format($fecha, 'd/m/Y');
        $patata =  date_format($fecha, 'd/m/Y');
        echo 'Fecha Actual: ' . $patata;
        ?>
    </body>
</html>