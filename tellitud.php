<?php
require_once ('konf.php');
global $yhendus;

//autonr lisamine
if(isSet($_REQUEST['uus_komment'])){
    $kask = $yhendus->prepare("UPDATE veod SET autonr= '$autonr' WHERE id=?");
    $lisaautonr = ($_REQUEST['autonr'] . "\n"); //"\n" - murra teksti ridu
    $kask->bind_param("si", $lisaautonr, $_REQUEST['uus_autonr']);
    $kask->execute();
    header("location: $_SERVER[PHP_SELF]");
}
?>
<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="style.css">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-
    scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Autoveod</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="registration_my_css.css">
</head>
<body>
<div class="container mt-4">
    <h1>Lisa Tellimus</h1>
    <nav>
        <a href="index.php">Home page</a>
        <a href="lisatellimus.php">Lisa tellimus</a>
        <a href="autojuhid.php">Autojuhid</a>
        <a href="https://github.com/VladEm99/">Git HUB</a>
    </nav>




    <table>
        <tr>
            <th>ID</th>
            <th>Algus</th>
            <th>Ots</th>
            <th>Aeg</th>
            <th>Autonr</th>
            <th>Lisa autonr</th>
            <th>Autojuht</th>
            <th>Lisa autojuht</th>
        </tr>
        <?php
        //show data from table
        $kask=$yhendus->prepare('SELECT id, algus, ots, aeg, autonr, autojuht FROM veod WHERE autojuht is null or autonr is null');
        $kask->bind_result($id, $algus, $ots, $aeg, $autonr, $autojuht);
        $kask->execute();
        while($kask->fetch()){
            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>".htmlspecialchars($algus)."</td>";
            echo "<td>$ots</td>";
            echo "<td>$aeg</td>";
            echo "<td>$autonr</td>";
            echo "<td>
            <form action='?'>
            <input type='hidden' name='uus_autonr' value='$id'>
            <input type='text' name='autonr'>
            <input type='submit' value='Lisa'>
            <form>
            </td>";
            echo "<td>$autojuht</td>";
            echo "<td>
            <form action='?'>
            <input type='hidden' name='uus_komment'>
            <input type='text' name='komment'>
            <input type='submit' value='Lisa'>
            <form>
            </td>";
        } ?>
    </table>
</div>
</body>
</html>