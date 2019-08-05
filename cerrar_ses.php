<?php
include_once './funcionesBD.php';
session_name("ses_hacienda"); //Creamos una sesion nueva y la iniciamos
session_start();
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
        <title></title>
    </head>
    <body>
        <?php
        session_destroy($_SESSION);
        session_unset();
        ?>
    </body>
</html>
