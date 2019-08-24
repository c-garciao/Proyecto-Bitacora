<?php
include_once './recursos/bd/funcionesBD.php';
session_name("ses_hacienda"); //Creamos una sesion nueva y la iniciamos
session_start();
if (!isset($DATOS["cambio_turno"])) {
    $ct = obtener("cambio_turno");
    $DATOS ["cambio_turno"] = $ct; //volcamos el nombre de los operadores (esto lo realizara la primera vez que carge la pagina)
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cambio de turno</title>
        <link rel="stylesheet" type="text/css" href="./recursos/estilos/estilo_comun.css"/>
        <link rel="stylesheet" type="text/css" href="./recursos/estilos/estilo_turnos.css"/>
        <script src="./recursos/js/validaciones_2.js"></script>
    </head>
    <body>
        <div id="menu">
            <p><a href="index.php" title="Inicio">Añadir a bitacora</a> <a href=""title="Generador de Informes">Informes (en pruebas)</a> <a href="revisarBitacora.php" title="Revisar la Bitácora">Revisar Bitacora</a><a href="" class="menu_opc_seleccionada" title="Cambio de Turno">Cambio Turno</a></p>
        </div>
        <div id="contenedor" class="c_t_txt">
        <h4>Añadir comentarios</h4>
        <form method="POST" action="recursos/recursos_intermedios/guardarcambioturno.php" onsubmit="return validarTexto('txtarea_ct');" id="formulario_c_t">
            <textarea id="txtarea_ct" autofocus maxlength="400" name="txt_cambio_turno" placeholder="Escriba el texto que desea guardar (máximo 400 caracteres)" form="formulario_c_t" oninput="cuentaPalabras()"></textarea><br/>
            <p class="tipo_mensaje">Tipo de mensaje: <select name="tipo_aviso">
                <option>Advertencia</option>
                <option>Mensaje</option>
                <option>Error</option>
            </select></p>
            <p id="demo"></p>
            <input type="submit" value="Insertar"><br/>
        </form>
        <?php
        if (isset($_SESSION["alerta_c_t"])) {
            $alerta = recoge("alerta_c_t");
            if ($alerta != "" || !empty($alerta)) {
                echo "<h1>Ninguno seleccionado!</h1>";
                unset($_SESSION["alerta_c_t"]);
            }
        }
        ?><h4>Borrar comentarios</h4>
        <form method="post" action="./recursos/recursos_intermedios/borrarMensaje.php">
            <?php
            foreach ($DATOS ["cambio_turno"] as $txt) {
                print "<p class=\"texto_ct\"><input id=\"chkbox\" type=\"checkbox\" name=\"mensajes[]\" value=" . $txt[0] . "><label for=\"chkbox\"><textarea disabled=\"true\" id=" . $txt[0] . ">" . $txt[1] . "</textarea></label><img class=\"img_iconos\" src=\"./recursos/imagenes/$txt[2].png\"/></p>";
            }
            ?>  
            <input type="submit" value="Borrar seleccion" onclick="return confirmaBorrado('mensajes[]')">
        </form>
        </div>
        <?php
        /* if (isset($_SESSION["txt_c_t"])) {
          print "OK";
          } else {
          print "KO";
          }

          foreach ($DATOS ["cambio_turno"] as $txt) {
          print "<textarea id=". $txt[0] . ">" . $txt[1] . "</textarea>";
          } */
        ?>
    </body>
</html>
