<?php

define("MYSQL_HOST", "mysql:host=localhost");
define("MYSQL_USUARIO", "root");
define("MYSQL_PASSWORD", "");
$dbHac = "operacionHacienda";

function recoge($var) {
    $tmp = (isset($_REQUEST[$var])) ? (htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8")) : "";
    return $tmp;
}

function conectaDb() {
    try {
        $tmp = new PDO(MYSQL_HOST, MYSQL_USUARIO, MYSQL_PASSWORD);
        $tmp->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
        $tmp->exec("set names 'utf8'");
        return($tmp);
    } catch (PDOException $e) {
        print "      <p>Error: No puede conectarse con la base de datos.</p>\n";
        print "\n";
        print "      <p>Error: " . $e->getMessage() . "</p>\n";
        print "\n";
        exit();
    }
}

function obtener($dato_consulta) {
    try {
        global $dbHac;
        $db = conectaDb();
        $conn = new PDO("mysql:host=localhost;dbname=$dbHac", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(*) FROM $dbHac.$dato_consulta";
        $conn = $db->query($consulta);
        if (!$conn) {
            print "<p>Error en la consulta.</p>\n";
        } elseif ($conn->fetchColumn() == 0) {
            print '<h1>No existen datos</h1>';
            exit();
        } else {
            $consulta = "SELECT * FROM $dbHac.$dato_consulta";
            $resultado = $db->query($consulta);
            return $resultado;
        }
    } catch (PDOException $e) {
        echo "Error: <br>";
        echo $consulta . "<br>" . $e->getMessage();
    }
    $db = null;
}

function guardar_registro($m_e, $op, $fe, $h_a, $h_d, $t_o, $ll, $g_r, $te, $co, $t_h, $t_s, $t_a, $o_r, $ac_r, $o_o, $s_b, $g_e, $i_p, $c_p, $a_r) {
    //print("sd");
    try {
        //$db = null;
        global $dbHac;
        $db = conectaDb();
        $conn = new PDO("mysql:host=localhost;dbname=$dbHac", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$consulta = "INSERT INTO $dbHac.bitacora (nombre_operador) VALUES ('Charly') ";
        //$conn->exec($consulta);

        $registro1 = "INSERT INTO $dbHac.bitacora (nombre_operador ,dia ,metodo_entrada ,hora_aparicion ,hora_desaparicion ,realizacion_operativa ,llamadas_recibidas ,grupo_resolutor ,tecnico ,envio_correo ,host ,servicio ,alarma ,operativa ,operativa_aplicada ,operativa_ok ,serbicio_bi ,grupo_escalado ,id_pandora ,acciones_realizadas ,respuesta_cierre)  VALUES ( '$op', '$fe','$m_e','$h_a','$h_d','$t_o','$ll','$g_r','$te','$co','$t_h','$t_s','$t_a','$o_r','$ac_r','$o_o','$s_b','$g_e','$i_p','$c_p','$a_r')";
        if ($conn->exec($registro1)) {
            echo "Se ha insertado el registro correctamente";
            unset($m_e, $op, $fe, $h_a, $h_d, $t_o, $ll, $g_r, $te, $co, $t_h, $t_s, $t_a, $o_r, $ac_r, $o_o, $s_b, $g_e, $i_p, $c_p, $a_r);
            $_SESSION["txt_alerta"] = TRUE;
            header("Location:index.php?ok_bd=Se han insertado correctamente los datos");
            die();
            exit();
        } else {
            echo "Error";
            $_SESSION["txt_alerta"] = TRUE;
            header("Location:index.php?error_bd=Error. No se ha insertado ningún registro");
            die();
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: <br>";
        //echo "An error has occurred: " . $conn->error();
        echo $e . "<br>" . $e->getMessage();
    }
    $db = null;
}

/*
function guardar_registro() {
    //print("sd");
    $metodo_entrada = $_SESSION["registros"][0];
    $operador = $_SESSION["registros"][1];
    //$fecha = $_SESSION["registros"][2];
    $fecha = "2dfs";

    $hora_aparicion = $_SESSION["registros"][3];
    $hora_desaparicion = $_SESSION["registros"][4];
    $tiempo_oper = $_SESSION["registros"][5];
    $llamada = $_SESSION["registros"][6];

    $grupo_res = $_SESSION["registros"][7];
    $tecnicos_ = $_SESSION["registros"][8];
    $correo_ = $_SESSION["registros"][9];
    $txt_host = $_SESSION["registros"][10];

    $txt_servicio = $_SESSION["registros"][11];
    $txt_alarma = $_SESSION["registros"][12];
    $oper_real = $_SESSION["registros"][13];
    $accion_realizada = $_SESSION["registros"][14];

    $oper_ok = $_SESSION["registros"][15];
    $serv_bi = $_SESSION["registros"][16];
    $grupo_esc = $_SESSION["registros"][17];
    $id_pandora = $_SESSION["registros"][18];

    $comentarios_pandora = $_SESSION["registros"][19];
    $acciones_realizadas = $_SESSION["registros"][20];

    try {
        $db = null;
        global $dbHac;
        $db = conectaDb();
        $conn = new PDO("mysql:host=localhost;dbname=$dbHac", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$consulta = "INSERT INTO $dbHac.bitacora (nombre_operador) VALUES ('Charly') ";
        //$conn->exec($consulta);

        $registro1 = $conn->prepare("INSERT INTO $dbHac.bitacora (id_registro ,nombre_operador ,dia ,metodo_entrada ,hora_aparicion ,hora_desaparicion ,realizacion_operativa ,llamadas_recibidas ,grupo_resolutor ,tecnico ,envio_correo ,host ,servicio ,alarma ,operativa ,operativa_aplicada ,operativa_ok ,serbicio_bi ,grupo_escalado ,id_pandora ,acciones_realizadas ,respuesta_cierre)  VALUES '$metodo_entrada', '$operador', '$fecha','$hora_aparicion','$hora_desaparicion','$tiempo_oper','$llamada','$grupo_res','$tecnicos_','$correo_','$txt_host','$txt_servicio','$txt_alarma','$oper_real','$accion_realizada','$oper_ok','$serv_bi','$grupo_esc','$id_pandora','$comentarios_pandora','$acciones_realizadas'");
        //$st->exec($registro1);
        
          $registro = "INSERT INTO $dbHac.bitacora (id_registro ,nombre_operador ,dia ,metodo_entrada ,hora_aparicion ,hora_desaparicion ,realizacion_operativa ,llamadas_recibidas ,grupo_resolutor ,tecnico ,envio_correo ,host ,servicio ,alarma ,operativa ,operativa_aplicada ,operativa_ok ,serbicio_bi ,grupo_escalado ,id_pandora ,acciones_realizadas ,respuesta_cierre) VALUES (:a, :b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p,:q,:r,:s,:t,:u)";
         

         $result = $db->prepare($registro); 
        $registro = $conn->prepare("INSERT INTO $dbHac.bitacora (id_registro ,nombre_operador ,dia ,metodo_entrada ,hora_aparicion ,hora_desaparicion ,realizacion_operativa ,llamadas_recibidas ,grupo_resolutor ,tecnico ,envio_correo ,host ,servicio ,alarma ,operativa ,operativa_aplicada ,operativa_ok ,serbicio_bi ,grupo_escalado ,id_pandora ,acciones_realizadas ,respuesta_cierre) VALUES (:a, :b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n,:o,:p,:q,:r,:s,:t,:u)");


        $registro->execute(array(":a" => $metodo_entrada, ":b" => $operador, ":c" => $fecha, ":d" => $hora_aparicion, ":e" => $hora_desaparicion, ":f" => $tiempo_oper, ":g" => $llamada, ":h" => $grupo_res, ":i" => $tecnicos_, ":j" => $correo_, ":k" => $txt_host, ":l" => $txt_servicio, ":m" => $txt_alarma, ":n" => $oper_real, ":o" => $accion_realizada, ":p" => $oper_ok, ":q" => $serv_bi, ":r" => $grupo_esc, ":s" => $id_pandora, ":t" => $comentarios_pandora, ":u" => $acciones_realizadas));
         $resultado = $db->query($consulta);
        if ($result->execute([":a" => $metodo_entrada,
          ":b" => $operador,
          ":c" => $fecha,
          ":d" => $hora_aparicion,
          ":e" => $hora_desaparicion,
          ":f" => $tiempo_oper,
          ":g" => $llamada,
          ":h" => $grupo_res,
          ":i" => $tecnicos_,
          ":j" => $correo_,
          ":k" => $txt_host,
          ":l" => $txt_servicio,
          ":m" => $txt_alarma,
          ":n" => $oper_real,
          ":o" => $accion_realizada,
          ":p" => $oper_ok,
          ":q" => $serv_bi,
          ":r" => $grupo_esc,
          ":s" => $id_pandora,
          ":t" => $comentarios_pandora,
          ":u" => $acciones_realizadas]));
          /*if ($conn->exec($registro)){
          print "<p>Registro creado correctamente.</p>\n";
          } else {
          print "KO";
          //echo "An error has occurred: " . $db->error();
          //echo $registro . "<br>" . getMessage();
          //echo "An error has occurred: " . $conn->error();
          } 
    } catch (PDOException $e) {
        echo "Error: <br>";
        echo "An error has occurred: " . $conn->error();
        echo $e . "<br>" . $e->getMessage();
    }
    $db = null;
}*/

/*
function obtener_operadores(){
    try {
        global $dbHac;

        $db = conectaDb();

        $conn = new PDO("mysql:host=localhost;
dbname=$dbHac", MYSQL_USUARIO, MYSQL_PASSWORD);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = "SELECT COUNT(*) FROM $dbHac.operadores";

        $conn = $db->query($consulta);

        if (!$conn) {
            print "<p>Error en la consulta.</p>\n";

        } elseif ($conn->fetchColumn() == 0) {
            print '<h1 style="font-family: title;
font-size: 60px;
color: #ff3385;
">No existen datos</h1>';

            exit();

        } else {
            $consulta = "SELECT * FROM $dbHac.operadores";

            $resultado = $db->query($consulta);

            return $resultado;

        }
    } catch (PDOException $e) {
        echo "Error: <br>";

        echo $consulta . "<br>" . $e->getMessage();

    }
    $db = null;

}
function obtener_llamadas(){
    try {
        global $dbHac;

        $db = conectaDb();

        $conn = new PDO("mysql:host=localhost;
dbname=$dbHac", MYSQL_USUARIO, MYSQL_PASSWORD);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = "SELECT COUNT(*) FROM $dbHac.llamadas";

        $conn = $db->query($consulta);

        if (!$conn) {
            print "<p>Error en la consulta.</p>\n";

        } elseif ($conn->fetchColumn() == 0) {
            print '<h1 style="font-family: title;
font-size: 60px;
color: #ff3385;
">No existen datos</h1>';

            exit();

        } else {
            $consulta = "SELECT * FROM $dbHac.llamadas";

            $resultado = $db->query($consulta);

            return $resultado;

        }
    } catch (PDOException $e) {
        echo "Error: <br>";

        echo $consulta . "<br>" . $e->getMessage();

    }
    $db = null;

}
function obtener_operativas(){
    try {
        global $dbHac;

        $db = conectaDb();

        $conn = new PDO("mysql:host=localhost;
dbname=$dbHac", MYSQL_USUARIO, MYSQL_PASSWORD);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = "SELECT COUNT(*) FROM $dbHac.llamadas";

        $conn = $db->query($consulta);

        if (!$conn) {
            print "<p>Error en la consulta.</p>\n";

        } elseif ($conn->fetchColumn() == 0) {
            print '<h1 style="font-family: title;
font-size: 60px;
color: #ff3385;
">No existen datos</h1>';

            exit();

        } else {
            $consulta = "SELECT * FROM $dbHac.operativas";

            $resultado = $db->query($consulta);

            return $resultado;

        }
    } catch (PDOException $e) {
        echo "Error: <br>";

        echo $consulta . "<br>" . $e->getMessage();

    }
    $db = null;

}
function obtener_servicio(){
    try {
        global $dbHac;

        $db = conectaDb();

        $conn = new PDO("mysql:host=localhost;
dbname=$dbHac", MYSQL_USUARIO, MYSQL_PASSWORD);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = "SELECT COUNT(*) FROM $dbHac.llamadas";

        $conn = $db->query($consulta);

        if (!$conn) {
            print "<p>Error en la consulta.</p>\n";

        } elseif ($conn->fetchColumn() == 0) {
            print '<h1 style="font-family: title;
font-size: 60px;
color: #ff3385;
">No existen datos</h1>';

            exit();

        } else {
            $consulta = "SELECT * FROM $dbHac.servicioBI";

            $resultado = $db->query($consulta);

            return $resultado;

        }
    } catch (PDOException $e) {
        echo "Error: <br>";

        echo $consulta . "<br>" . $e->getMessage();

    }
    $db = null;

}*/

/*
function obtener_operadores(){
    try {
        global $dbHac;

        $db = conectaDb();

        $conn = new PDO("mysql:host=localhost;
dbname=$dbHac", MYSQL_USUARIO, MYSQL_PASSWORD);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = "SELECT COUNT(*) FROM $dbHac.operadores";

        $conn = $db->query($consulta);

        if (!$conn) {
            print "<p>Error en la consulta.</p>\n";

        } elseif ($conn->fetchColumn() == 0) {
            print '<h1 style="font-family: title;
font-size: 60px;
color: #ff3385;
">No existen datos</h1>';

            exit();

        } else {
            $consulta = "SELECT * FROM $dbHac.operadores";

            $resultado = $db->query($consulta);

            return $resultado;

        }
    } catch (PDOException $e) {
        echo "Error: <br>";

        echo $consulta . "<br>" . $e->getMessage();

    }
    $db = null;

}
 *  

function obtener_correos(){
    try {
        global $dbHac;

        $db = conectaDb();

        $conn = new PDO("mysql:host=localhost;
dbname=$dbHac", MYSQL_USUARIO, MYSQL_PASSWORD);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = "SELECT COUNT(*) FROM $dbHac.operadores";

        $conn = $db->query($consulta);

        if (!$conn) {
            print "<p>Error en la consulta.</p>\n";

        } elseif ($conn->fetchColumn() == 0) {
            print '<h1 style="font-family: title;
font-size: 60px;
color: #ff3385;
">No existen datos</h1>';

            exit();

        } else {
            $consulta = "SELECT correo FROM $dbHac.metodo_entrada";

            $resultado = $db->query($consulta);

            return $resultado;

        }
    } catch (PDOException $e) {
        echo "Error: <br>";

        echo $consulta . "<br>" . $e->getMessage();

    }
    $db = null;

}
function obtener_gr(){
    try {
        global $dbHac;

        $db = conectaDb();

        $conn = new PDO("mysql:host=localhost;
dbname=$dbHac", MYSQL_USUARIO, MYSQL_PASSWORD);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = "SELECT COUNT(*) FROM $dbHac.operadores";

        $conn = $db->query($consulta);

        if (!$conn) {
            print "<p>Error en la consulta.</p>\n";

        } elseif ($conn->fetchColumn() == 0) {
            print '<h1 style="font-family: title;
font-size: 60px;
color: #ff3385;
">No existen datos</h1>';

            exit();

        } else {
            $consulta = "SELECT nombre_grupo FROM $dbHac.grupo_resolutor";

            $resultado = $db->query($consulta);

            return $resultado;

        }
    } catch (PDOException $e) {
        echo "Error: <br>";

        echo $consulta . "<br>" . $e->getMessage();

    }
    $db = null;

}


function inserta_tabla() {
    try {
        global $dbHac;

        $db = conectaDb();

        $conn = new PDO("mysql:host=localhost;
dbname=$dbRPG", MYSQL_USUARIO, MYSQL_PASSWORD);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // our SQL statements
        $conn->exec("INSERT INTO $dbHac.bitacora (nombre_enemigo, ataque_enemigo, defensa_enemigo) VALUES ('Einstein', 90,110 )");


        //$conn->commit();

        echo "Se han insertado correctamente";

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();

    }

$conn = null;


    }
 */