<?php
include_once './recursos/bd/funcionesBD.php';
session_name("ses_hacienda"); //Creamos una sesion nueva y la iniciamos
session_start();

if (!isset($DATOS['obtener_bitacora'])) {
    $obt_bit = obtener_bitacora();
    $DATOS ['obtener_bitacora'] = $obt_bit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Revisar Bitacora</title>
        <link rel="stylesheet" type="text/css" href="./recursos/estilos/estilo_comun.css"/>
        <link rel="stylesheet" type="text/css" href="./recursos/estilos/estilo_bitacora.css"/>
        <script src="./recursos/js/validaciones_2.js"></script>

         <!-- <script type="text/javascript" src=""/> -->
        <!--<script src="recursos/js/validaciones.js"></script>-->
    </head>
    <body>
        <div id="menu">
            <p><a href="index.php" title="Inicio">Añadir a bitacora</a> <a href="" title="Generador de Informes">Informes (en pruebas)</a> <a  href="" class="menu_opc_seleccionada" title="Revisar la Bitácora"> Revisar Bitacora</a><a href="cambioturno.php" title="Cambio de Turno"> Cambio Turno</a></p></div>
        <div id="contenedor_bitacora">
            <!--<span class="leyenda"></span>-->
            <form action="./recursos/recursos_intermedios/modificarBitacora.php" id="formulario_muestra_bitacora"  method="POST">    
                <p>
                    <input type="button" value="Eliminación" id="btn_elim" onclick="ocultaElemento(this);">
                    <input type="button" value="Actualización" id="btn_actu" onclick="ocultaElemento(this);">
                    <input type="button" value="Búsqueda" id="btn_busq" onclick="ocultaElemento(this);">
                </p>
                <p id="numero_elementos"></p>
                <p id="botones_accion">
                    <input type="submit" name="accion" value="Modificar" id="submit_modifica">
                    <input type="submit" name="accion" value="Borrar" onclick="return confirmaBorrado('id_registos_bitacora[]');" id="submit_elimina">
                    <input type="search" required="true" id="cuadro_busqueda"><input type="submit" name="accion" value="Buscar" id="submit_busqueda">
                </p>
                <table border="1px solid black">
                    <tr>
                        <th class="oper">Operador</th>
                        <th class="dia">Día</th>
                        <th class="metodo_entrada">Metodo Entrada:</th>
                        <th class="h_aparicion">Hora aparicion</th>
                        <th class="h_desaparicion">Hora desaparicion</th>
                        <th class="tiempo_operativa">Tiempo en realizar operativa</th>
                        <th class="llamads_recibidas">Llamadas recibidas al 900</th>	
                        <th class="grupo_resolutor">Grupo Resolutor</th>	
                        <th class="nombre_tecnico">Técnico</th>	
                        <th class="env_correo">Envio de Correo</th>
                        <th>HOST</th>
                        <th>SERVICIO</th>
                        <th>Alarma</th>
                        <th>OP-GUAXXX</th>
                        <th>Operativa Realizada	Opertiva </th>  
                        <th>OK o KO</th>
                        <th>Servicio en BI</th>
                        <th>Grupo de escalado en pandora Nivel2	</th>
                        <th>ID Pandora</th>
                        <th>Acciónes realizadas	</th>
                        <th>Respuesta de cierre en Pandora</th>

                    </tr>

                    <?php
                    foreach ($DATOS ["obtener_bitacora"] as $entrada) {
                        print "<tr><td><input type=\"radio\" name=\"id_actu_bitacora[]\" id=\"radio_btn_bitacora\" value=\"$entrada[0]\"><input onchange=\"cuentaDatos('id_registos_bitacora[]');\" type=\"checkbox\" name=\"id_registos_bitacora[]\" id=\"chk_bitacora\" value=\"$entrada[0]\"> $entrada[1] </td>";
                        print "<td> $entrada[2] </td>";
                        print "<td> $entrada[3] </td>";
                        print "<td> $entrada[4] </td>";
                        print "<td> $entrada[5] </td>";
                        print "<td> $entrada[6] </td>";
                        print "<td> $entrada[7] </td>";
                        print "<td> $entrada[8] </td>";
                        print "<td> $entrada[9] </td>";
                        print "<td> $entrada[10] </td>";
                        print "<td> $entrada[11] </td>";
                        print "<td> $entrada[12] </td>";
                        print "<td> $entrada[13] </td>";
                        print "<td> $entrada[14] </td>";
                        print "<td> $entrada[15] </td>";
                        print "<td> $entrada[16] </td>";
                        print "<td> $entrada[17] </td>";
                        print "<td> $entrada[18] </td>";
                        print "<td> $entrada[19] </td>";
                        print "<td> $entrada[20] </td>";
                        print "<td> $entrada[21] </td><tr/>";
                        unset($DATOS['obtener_bitacora']);
                    }
                    ?>
                </table>
            </form>
            <br/>         
        </div>
        <div id="contenedor">
        </div>
    </body>
</html>