<?php

require __DIR__ . "/config_sgbd.php";

// creation de la ligne de connexion a placer dans le PDO
$configsgbd = $sgbd_type . ':host=' . $sgbd_server;
if(!empty($sgbd_port) && $sgbd_port !== "0") {
    $configsgbd .= ';port=' . $sgbd_port;
}
$configsgbd .= ';dbname=' . $sgbd_dbname;
$configsgbd .= ";charset=UTF8";

$sgbd = new PDO($configsgbd, $sgbd_user, $sgbd_pass);
