<?php
require_once ('konf.php');
global $yhendus;

if (isset($_POST["algus"]) && isset($_POST["ots"]) && isset($_POST["aeg"])) {

    if($yhendus->connect_error){
        die("Ошибка: " . $yhendus->connect_error);
    }
    $algus = $yhendus->real_escape_string($_POST["algus"]);
    $ots = $yhendus->real_escape_string($_POST["ots"]);
    $aeg = $yhendus->real_escape_string($_POST["aeg"]);
    $sql = "INSERT INTO veod(algus, ots, aeg) VALUES ('$algus', $ots, $aeg)";
    if($yhendus->query($sql)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $yhendus->error;
    }
    $yhendus->close();
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
<div class="container">
    <h1>Tellimused</h1>
    <nav>
        <a href="index.php">Home page</a>
        <a href="lisatellimus.php">Lisa tellimus</a>
        <a href="tellitud2.php">Tellitud</a>
        <a href="https://github.com/VladEm99/">Git HUB</a>
    </nav>




    <table>
        <tr>
            <th>Algus</th>
            <th>Ots</th>
            <th>Aeg</th>
        </tr>
        <?php
        //show data from table
        $kask=$yhendus->prepare('SELECT algus, ots, aeg FROM veod');
        $kask->bind_result($algus, $ots, $aeg);
        $kask->execute();
        while($kask->fetch()){
            echo "<tr>";
            echo "<td>".htmlspecialchars($algus)."</td>";
            echo "<td>$ots</td>";
            echo "<td>$aeg</td>";
        } ?>
    </table>
    <form action="lisa.php" method="post">
        <h2>Tellimuse lisamine:</h2>
        <dl>
            <dt>Algus punkt:</dt>
            <dd><input type="text" name="algus"></dd>
            <dt>Lõpp punkt:</dt>
            <dl><input type="text" name="ots"></dl>
            <dt>Valige aeg:</dt>
            <dl><input type="datetime-local" name="aeg"></dl>
            <input class="XD" type="submit" value="Lisa tellimus">
        </dl>
    </form>
</div>
</body>
</html>