<?php
require_once ('konf.php');
global $yhendus;?>
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
<div class="container">
    <h1>Autoveod</h1>
    <nav>
        <a href="index.php">Home page</a>
        <a href="lisatellimus.php">Lisa tellimus</a>
        <a href="tellitud2.php">Tellitud</a>
        <a href="https://github.com/VladEm99/">Git HUB</a>
    </nav>



    <h2>Autojuht ja auto on määratud</h2>
    <table>
        <tr>
            <th>Algus</th>
            <th>Ots</th>
            <th>Aeg</th>
            <th>Autonr</th>
            <th>Juht</th>
            <th>Valmis</th>
        </tr>
        <?php
        //show data from table
        $kask=$yhendus->prepare('SELECT algus, ots, aeg, autonr, autojuht, valmis FROM veod WHERE autonr AND autojuht is not null');
        $kask->bind_result($algus, $ots, $aeg, $autonr, $autojuht, $valmis);
        $kask->execute();
        while($kask->fetch()){
            echo "<tr>";
            echo "<td>".htmlspecialchars($algus)."</td>";
            echo "<td>$ots</td>";
            echo "<td>$aeg</td>";
            echo "<td>$autonr</td>";
            echo "<td>$autojuht</td>";
            echo "<td>$valmis</td>";
        } ?>
    </table>
        <h2>Autojuht ja auto pole määratud</h2>
    <table>
        <tr>
            <th>Algus</th>
            <th>Ots</th>
            <th>Aeg</th>
            <th>Autonr</th>
            <th>Juht</th>
            <th>Valmis</th>
        </tr>
        <?php
        //show data from table
        $kask=$yhendus->prepare('SELECT algus, ots, aeg, autonr, autojuht, valmis FROM veod WHERE autonr is null OR autojuht is null');
        $kask->bind_result($algus, $ots, $aeg, $autonr, $autojuht, $valmis);
        $kask->execute();
        while($kask->fetch()){
            echo "<tr>";
            echo "<td>".htmlspecialchars($algus)."</td>";
            echo "<td>$ots</td>";
            echo "<td>$aeg</td>";
            echo "<td>$autonr</td>";
            echo "<td>$autojuht</td>";
            echo "<td>$valmis</td>";
        } ?>
    </table>
</div>

</body>
</html>