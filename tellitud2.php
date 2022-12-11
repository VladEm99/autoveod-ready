<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
</head>
<link rel="stylesheet" href="style.css">
<body>
<div class="rem">
<h2>Tellimused</h2>

<nav>
    <a href="index.php">Home page</a>
    <a href="lisatellimus.php">Lisa tellimus</a>
    <a href="tellitud2.php">Tellitud</a>
    <a href="https://github.com/VladEm99/">Git HUB</a>
</nav>
<?php
$conn = new mysqli("d109455.mysql.zonevs.eu", "d109455_vlad", "Vlad23Mar22Vlad23Mar22", "d109455_embaas21");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT id, algus, ots, aeg, autonr, autojuht FROM veod WHERE autojuht is null or autonr is null";
if($result = $conn->query($sql)){
    echo "<table class='t1'>
            <tr>
                <th>ID</th>
                <th>Algus</th>
                <th>Ots</th>
                <th>Aeg</th>
                <th>Autonr</th>
                <th>Autojuht</th>
                <th>Lisa andmed</th>         
            </tr>";
    foreach($result as $row){
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["algus"] . "</td>";
        echo "<td>" . $row["ots"] . "</td>";
        echo "<td>" . $row["aeg"] . "</td>";
        echo "<td>" . $row["autonr"] . "</td>";
        echo "<td>" . $row["autojuht"] . "</td>";
        echo "<td><a href='update.php?id=" . $row["id"] . "'>Lisa autonr ja autojuhi</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>
</div>
</body>
</html>
