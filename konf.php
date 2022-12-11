<?php
$serverinimi="d109455.mysql.zonevs.eu"; // d70420.mysql.zonevs.eu
$kasutaja="d109455_vlad"; // d70420_merk21
$parool="Vlad23Mar22Vlad23Mar22"; // ''
$andmebaas="d109455_embaas21"; //d70420_merk21

$yhendus=new mysqli($serverinimi, $kasutaja, $parool, $andmebaas);

$yhendus->set_charset('UTF8');
?>