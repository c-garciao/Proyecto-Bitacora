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