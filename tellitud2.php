<!DOCTYPE html>
<html>
<head>
    <title>METANIT.COM</title>
    <meta charset="utf-8" />
</head>
<link rel="stylesheet" href="style.css">
<body>
<h2>Список пользователей</h2>
<?php
$conn = new mysqli("localhost", "vlad21", "12345", "vlad21");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT id, algus, ots, aeg, autonr, autojuht FROM veod WHERE autojuht is null or autonr is null";
if($result = $conn->query($sql)){
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Algus</th>
                <th>Ots</th>
                <th>Aeg</th>
                <th>Autonr</th>
                <th>Autojuht</th>
            </tr>";
    foreach($result as $row){
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["algus"] . "</td>";
        echo "<td>" . $row["ots"] . "</td>";
        echo "<td>" . $row["aeg"] . "</td>";
        echo "<td>" . $row["autonr"] . "</td>";
        echo "<td>" . $row["autojuht"] . "</td>";
        echo "<td><a href='update.php?id=" . $row["id"] . "'>Изменить</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>
</body>
</html>
