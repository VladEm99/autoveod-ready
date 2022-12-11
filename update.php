<?php
$conn = new mysqli("d109455.mysql.zonevs.eu", "d109455_vlad", "Vlad23Mar22Vlad23Mar22", "d109455_embaas21");
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
// если запрос GET
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"]))
{
    $id = $conn->real_escape_string($_GET["id"]);
    $sql = "SELECT * FROM veod WHERE id = '$id'";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            foreach($result as $row){
                $autonr = $row["autonr"];
                $autojuht = $row["autojuht"];
            }
            echo "<h3>Andmete uuendamine</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='$id' />
                    <p>Autonr:
                    <input required type='text' name='autonr' value='$autonr' /></p>
                    <p>Autojuht:
                    <input required type='text' name='autojuht' value='$autojuht' /></p>
                    <input type='submit' value='Сохранить'>
            </form>";
        }
        else{
            echo "<div>pole leitud</div>";
        }
        $result->free();
    } else{
        echo "Ошибка: " . $conn->error;
    }
}
elseif (isset($_POST["id"]) && isset($_POST["autonr"]) && isset($_POST["autojuht"])) {

    $id = $conn->real_escape_string($_POST["id"]);
    $autonr = $conn->real_escape_string($_POST["autonr"]);
    $autojuht = $conn->real_escape_string($_POST["autojuht"]);
    $sql = "UPDATE veod SET autonr = '$autonr', autojuht = '$autojuht' WHERE id = '$id'";
    if($result = $conn->query($sql)){
        header("Location: tellitud2.php");
    } else{
        echo "Ошибка: " . $conn->error;
    }
}
else{
    echo "Некорректные данные";
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
</head>
<body>
</body>
</html>