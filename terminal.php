<?php
$hostname = "localhost";
$dbName = "yavasdeveloper";
$username = "root";
$password = "Ayberk01205**..Manolya48**..3509..**";
$port = 3306;

// Yeni database bağlantı isteği oluşturuyoruz.
$mysqli = new mysqli($hostname, $username, $password, $dbName, $port);

if ($mysqli->connect_error) {
    echo 'Connection Failed';
} else {
    echo "Connected successfully";
}
// Formdan gelen veriyi alıyoruz
$message = $_POST['messageTerminal'];

// SQL sorgusu oluşturuyoruz
$sql = "$message";

// SQL sorgusunu çalıştırıyoruz
if ($mysqli->query($sql) === TRUE) {
    header("Location: ../yavasdeveloper/terminal.html");
    echo "Data inserted successfully";
} else {
    header("Location: ../yavasdeveloper/terminal.html");
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
//bağlantıyı kapatıyoruz.
mysqli_close($mysqli);

?>