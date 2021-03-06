<!--Carlos Garcia Oliva 2019-->
<?php
include_once './recursos/bd/funcionesBD.php';
session_name("ses_hacienda"); //Creamos una sesion nueva y la iniciamos
session_start();
$mes = date('m');
$dia = date('d');
$anio = date('Y');
$hoy = $anio . '-' . $mes . '-' . $dia;

try {
    if (!isset($DATOS["operadores"])) {
        $operadores = obtener("operadores");
        $DATOS ["operadores"] = $operadores; //volcamos el nombre de los operadores (esto lo realizara la primera vez que carge la pagina)
    }
    if (!isset($DATOS['correos'])) {
        $correos = obtener("lista_correos");
        $DATOS ['correos'] = $correos;
    }
    if (!isset($DATOS['grupo_resolutor'])) {
        $gr = obtener("grupo_resolutor");
        $DATOS ['grupo_resolutor'] = $gr;
    }
    if (!isset($DATOS['llamadas'])) {
        $llamadas = obtener("llamadas");
        $DATOS ['llamadas'] = $llamadas;
    }
    if (!isset($DATOS['operativas'])) {
        $operativas = obtener("operativas");
        $DATOS ['operativas'] = $operativas;
    }
    if (!isset($DATOS['serviciosBI'])) {
        $servicio = obtener("servicioBI");
        $DATOS ['serviciosBI'] = $servicio;
    }
    if (!isset($DATOS['grupoEscalado'])) {
        $grupo_escalado = obtener("grupo_escalado");
        $DATOS ['grupoEscalado'] = $grupo_escalado;
    }
    if (!isset($DATOS['metodoEntrada'])) {
        $m_entrada = obtener("metodo_entrada");
        $DATOS ['metodoEntrada'] = $m_entrada;
    }
    if (!isset($DATOS['tecnicos'])) {
        $nombre_tec = obtener("tecnicos");
        $DATOS ['tecnicos'] = $nombre_tec;
    }
    if (!isset($DATOS['finalizacion_operativa'])) {
        $final_oper = obtener("finalizacion_operativa");
        $DATOS ['finalizacion_operativa'] = $final_oper;
    }
    if (!isset($DATOS["cambio_turno"])) {
        $ct = obtener("cambio_turno");
        $DATOS ["cambio_turno"] = $ct;
    }
    unset($_SESSION["no_volver"]);
} catch (PDOException $e) {
    echo "Error: <br>";
    echo $consulta . "<br>" . $e->getMessage();
}
//print_r ($_SESSION["correos"]);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Pagina Bitacora</title>
        <link rel="stylesheet" type="text/css" href="./recursos/estilos/estilo_comun.css"/>

         <!-- <script type="text/javascript" src=""/> -->
        <script src="recursos/js/validaciones.js"></script>
    </head>
    <body>
        <noscript>Error. El navegador no soporta JavaScript o está deshabilitada la opción</noscript>
        <div id="menu">
            <p><a href="#" class="menu_opc_seleccionada" title="Inicio">Añadir a bitacora</a> <a href="" title="Generador de Informes">Informes (en pruebas)</a> <a  href="revisarBitacora.php" onclick="formulario_ok = true;" title="Revisar la Bitácora"> Revisar Bitacora </a><a href="cambioturno.php " onclick="formulario_ok = true;" title="Cambio de Turno"> Cambio Turno</a></p>
        </div>
        <div id="contenedor">
            <div id="cambio_de_turno">
                <?php
                foreach ($DATOS ["cambio_turno"] as $txt) {
                    print "<p><img class=\"img_iconos\" src=\"./recursos/imagenes/$txt[2].png\"/><textarea class=\"textarea_c_t\"disabled=\"true\" id=" . $txt[0] . ">" . $txt[1] . "</textarea></p>";
                }
                ?>
            </div>
            <form action="guardaBitacora.php" method="POST">
                <!--<form onsubmit=compruebaForm() action="guardaBitacora.php" method="POST">-->
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

                    </tr>
                    <tr>
                        <td class="oper">
                            <select name="nombre_oper">
                                <?php
                                foreach ($DATOS ["operadores"] as $op) {
                                    print "<option value=" . $op[1] . ">$op[1]</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td class="dia">
                            <input id="fecha_completa" name="dia" value="<?php echo $hoy; ?>"  type="date">
                        </td>
                        <td class="metodo_entrada">
                            <select name="metodo_entrada">
                                <?php
                                foreach ($DATOS ["metodoEntrada"] as $m_entr) {
                                    print "<option >$m_entr[1]</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td class="h_aparicion">
                            <input id="num_dia" type="time" name="hora_aparicion" required="true">
                        </td>
                        <td class="h_desaparicion">
                            <input type="time" name="hora_desaparicion">
                            <input type="date" name="fecha_desaparicion">
                        </td>
                        <td id="aplicar_op" name="patata">
                        <!-- <input name="tiempo_op" type="radio" checked> -->
                            <input id="no_oper" name="tiempo_op" type="time" value="00:10"><br/>
                            <label for="tiempo_op"><input id="no_oper" name="tiempo_op" id="txt_tiempo_op" value="No se aplica operativa" type="radio">No se realiza operativa</label>

                        </td>
                        <td>
                            <select name="llamadas_">

                                <?php
                                foreach ($DATOS ["llamadas"] as $num_tlf) {
                                    print "<option >$num_tlf[1]</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="grupo_res">
                                <?php
                                foreach ($DATOS ["grupo_resolutor"] as $g_res) {
                                    print "<option >$g_res[1]</option>";
                                }
                                ?> 
                            </select>
                        </td>
                        <td>
                            <select name="tecnicos_">

                                <?php
                                foreach ($DATOS ["tecnicos"] as $n_tec) {
                                    print "<option >$n_tec[1]</option>";
                                }
                                ?>
                            </select>
                        <td>
                            <select name="correo_">
                                <?php
                                foreach ($DATOS ["correos"] as $correo) {
                                    print "<option>$correo[1]</option>";
                                }
                                ?>
                            </select>
                        </td>
                        </td>
                </table><br/>
                <table border="1px solid black">
                    <tr>
                        <th>HOST</th>
                        <th>SERVICIO</th>
                        <th>Alarma</th>
                        <th>OP-GUAXXX</th>
                        <th>Operativa Realizada	Opertiva </th>  
                        <th>OK o KO</th>
                        <th>Servicio en BI</th>
                        <th>Grupo de escalado en pandora Nivel2	</th>
                        <th>ID Pandora</th>
                    </tr>
                    <tr>

                        <td>
                            <textarea placeholder="Host" name="txt_host"required="true"></textarea>
                        </td>
                        <td>
                            <textarea placeholder="Servicio" name="txt_servicio"required="true"></textarea>
                        </td>
                        <td>
                            <textarea placeholder="Alarma" name="txt_alarma"required="true"></textarea>
                        </td>
                        <td>
                            <select name="oper_real">
                                <?php
                                foreach ($DATOS ["operativas"] as $operativa) {
                                    print "<option>$operativa[1]</option>";
                                }
                                ?>

                            </select>
                        </td>
                        <td>
                            <textarea name="accion_realizada" placeholder="Operativa Realizada" required="true"></textarea>
                        </td>
                        <td>
                            <select name="oper_ok">
                                <?php
                                foreach ($DATOS ["finalizacion_operativa"] as $operativa_ok) {
                                    print "<option>$operativa_ok[1]</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="serv_bi">

                                <?php
                                foreach ($DATOS ["serviciosBI"] as $serv_bi) {
                                    print "<option>$serv_bi[1]</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="escalado_">
                                <?php
                                foreach ($DATOS ["grupoEscalado"] as $gr_esc) {
                                    print "<option>$gr_esc[1]</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input name="id_pandora" placeholder="ID Pandora" type="number" default=0" size="3px">
                        </td>
                </table>
                <br/>
                <table border="1px solid black">
                    <tr>
                        <th>Acciónes realizadas	</th>
                        <th>Respuesta de cierre de incidencia o petición en Pandora</th>
                    </tr>
                    <td>
                        <textarea name="comentarios_pandora" placeholder="Respuesta de cierre de incidencia o petición en Pandora"></textarea>
                    </td><td>
                        <textarea name="acciones_realizadas" placeholder="Acciones Realizadas"></textarea>
                    </td>
                    </tr>
                </table>
                <p><input type="submit" id="btn_guarda_bitacora" value="Guardar Bitacora" onclick="formulario_ok = true;
                        aplicarOper()"/>
                    <input type="reset" onclick="return borrar_formulario()" value="BORRAR"/>
                    <!--<input type="button" value="Prueba" onclick="defineFecha()"/>-->
                    <input type="button" value="Salir" onclick="sessionStorage.clear();"/></p>
            </form>
            <div id="caja1"onclick="borrar_alertas">
                <?php
                if (isset($_SESSION["txt_alerta"])) {
                    $alerta = recoge("ok_bd");
                    if ($alerta != "" || !empty($alerta)) {
                        print '<h2 id="aviso">' . $alerta . '<a onclick="borrar_alertas"><img src="./recursos/imagenes/error.svg" onclick="borrar_alertas()" alt="Cerrar mensaje" title="Quitar mensaje"/></a></h2>';
                        unset($_SESSION["txt_alerta"]);
                    }
                }//header_remove("aviso");
                ?>
            </div>

        </div>
    </body>
</html>