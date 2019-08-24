<?php

include_once '../bd/funcionesBD.php';
session_name("ses_hacienda"); //Creamos una sesion nueva y la iniciamos
session_start();
$mensaje = "";

/* $formats = $_POST["mensajes"];
  if (is_array($formats)) {
  foreach ($formats as $format) {
  echo $format . ",";
  }
  }
  //for ( $i=0;$i<count($_POST['mensajes']);$i++) {
  echo $_POST['mensajes'][0];//[$i];

  //}
  foreach($_POST['mensajes'] as $selected) {
  echo "<p>".$selected ."</p>";
  } */
if (empty($_POST['mensajes'])) {
    $_SESSION["alerta_c_t"] = TRUE;
    header("Location:../../cambioturno.php");
    die();
} else if (!empty($_POST['mensajes'])) {
    foreach ($_POST['mensajes'] as $check) {
        $DATOS['valores_c_t'][] = $check;// . ",";
    }
}
print_r ($DATOS['valores_c_t']);
$borrar = implode(",",$DATOS['valores_c_t']);
echo $borrar;
borraRegistro('cambio_turno', 'id_c_t', $borrar);
unset($borrar);

////$nombre_tabla, $id,$valores