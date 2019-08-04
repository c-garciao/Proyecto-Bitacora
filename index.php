<!--Carlos Garcia Oliva 2019-->
<?php
include_once './funcionesBD.php';
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
        <link rel="stylesheet" type="text/css" href="./estilo_comun.css"/>

         <!-- <script type="text/javascript" src=""/> -->
        <script src="validaciones.js"></script>
    </head>
    <body>
        <div id="menu">
            <p><a href="#" class="menu_opc_seleccionada">Añadir a bitacora</a> <a href="#">Revisar Bitacora</a> <a href="">Informes (en pruebas)</a></p>
        </div>
        <div id="contenedor">
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
                            <input type="time" name="hora_desaparicion" required="true">
                        </td>
                        <td id="aplicar_op" name="patata">
                        <!-- <input name="tiempo_op" type="radio" checked> -->
                            <input id="tiempo_operativa" name="tiempo_op" type="time" value="00:10"><br/>
                            <label for="txt_tiempo_op">
                                <input id="no_oper" name="tiempo_op" id="txt_tiempo_op" value="No se aplica operativa" type="radio">No se realiza operativa
                            </label>
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
                            <input name="id_pandora" placeholder="ID Pandora" type="number" size="3px">
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
                <p><input type="submit" id="btn_guarda_bitacora" value="Guardar Bitacora" onclick="formulario_ok = true; aplicarOper()"/>
                    <input type="reset" onclick="return borrar_formulario()" value="BORRAR"/>
                    <!--<input type="button" value="Prueba" onclick="defineFecha()"/>-->
                    <input type="button" value="Salir" onclick="sessionStorage.clear();"/></p>
            </form>

        </div>
    </body>
</html>