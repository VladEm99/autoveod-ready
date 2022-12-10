<?php
require_once ('konf.php');
global $yhendus;
//FILTER_SANITIZE_STRING - Удаляет теги и кодирует двойные
//и одинарные кавычки, при необходимости удаляет или кодирует специальные символы.

$algus = filter_var(trim($_POST['algus']),
    FILTER_SANITIZE_STRING);
$ots = filter_var(trim($_POST['ots']),
    FILTER_SANITIZE_STRING);
$aeg = $_POST['aeg'];

$yhendus->query("INSERT INTO `veod` (`algus`, `ots`, `aeg`)
    VALUES('$algus', '$ots', '$aeg')");
$yhendus->close();
header('Location: lisatellimus.php');
exit;
?>
