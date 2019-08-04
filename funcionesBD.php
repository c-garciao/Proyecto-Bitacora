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
        $tmp->exec("set names utf8mb4");
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
        $consulta = "SELECT COUNT(*) FROM $dbHac.llamadas";
        $conn = $db->query($consulta);
        if (!$conn) {
            print "<p>Error en la consulta.</p>\n";
        } elseif ($conn->fetchColumn() == 0) {
            print '<h1 style="font-family: title;font-size: 60px;color: #ff3385;">No existen datos</h1>';
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

/*
function obtener_operadores(){
    try {
        global $dbHac;
        $db = conectaDb();
        $conn = new PDO("mysql:host=localhost;dbname=$dbHac", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(*) FROM $dbHac.operadores";
        $conn = $db->query($consulta);
        if (!$conn) {
            print "<p>Error en la consulta.</p>\n";
        } elseif ($conn->fetchColumn() == 0) {
            print '<h1 style="font-family: title;font-size: 60px;color: #ff3385;">No existen datos</h1>';
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
        $conn = new PDO("mysql:host=localhost;dbname=$dbHac", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(*) FROM $dbHac.llamadas";
        $conn = $db->query($consulta);
        if (!$conn) {
            print "<p>Error en la consulta.</p>\n";
        } elseif ($conn->fetchColumn() == 0) {
            print '<h1 style="font-family: title;font-size: 60px;color: #ff3385;">No existen datos</h1>';
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
        $conn = new PDO("mysql:host=localhost;dbname=$dbHac", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(*) FROM $dbHac.llamadas";
        $conn = $db->query($consulta);
        if (!$conn) {
            print "<p>Error en la consulta.</p>\n";
        } elseif ($conn->fetchColumn() == 0) {
            print '<h1 style="font-family: title;font-size: 60px;color: #ff3385;">No existen datos</h1>';
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
        $conn = new PDO("mysql:host=localhost;dbname=$dbHac", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(*) FROM $dbHac.llamadas";
        $conn = $db->query($consulta);
        if (!$conn) {
            print "<p>Error en la consulta.</p>\n";
        } elseif ($conn->fetchColumn() == 0) {
            print '<h1 style="font-family: title;font-size: 60px;color: #ff3385;">No existen datos</h1>';
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
        $conn = new PDO("mysql:host=localhost;dbname=$dbHac", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(*) FROM $dbHac.operadores";
        $conn = $db->query($consulta);
        if (!$conn) {
            print "<p>Error en la consulta.</p>\n";
        } elseif ($conn->fetchColumn() == 0) {
            print '<h1 style="font-family: title;font-size: 60px;color: #ff3385;">No existen datos</h1>';
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
        $conn = new PDO("mysql:host=localhost;dbname=$dbHac", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(*) FROM $dbHac.operadores";
        $conn = $db->query($consulta);
        if (!$conn) {
            print "<p>Error en la consulta.</p>\n";
        } elseif ($conn->fetchColumn() == 0) {
            print '<h1 style="font-family: title;font-size: 60px;color: #ff3385;">No existen datos</h1>';
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
        $conn = new PDO("mysql:host=localhost;dbname=$dbHac", MYSQL_USUARIO, MYSQL_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT COUNT(*) FROM $dbHac.operadores";
        $conn = $db->query($consulta);
        if (!$conn) {
            print "<p>Error en la consulta.</p>\n";
        } elseif ($conn->fetchColumn() == 0) {
            print '<h1 style="font-family: title;font-size: 60px;color: #ff3385;">No existen datos</h1>';
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
        $conn = new PDO("mysql:host=localhost;dbname=$dbRPG", MYSQL_USUARIO, MYSQL_PASSWORD);
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