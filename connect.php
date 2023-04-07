<?php
$envFile = __DIR__ . '/.env';
if(file_exists($envFile)){
$_ENV = parse_ini_file($envFile);

$hostname = $_ENV['HOST'];
$dbName = $_ENV['DATABASE'];
$username = $_ENV['USERNAME'];
$password = $_ENV['PASSWORD'];
$port = 3306;

$mysqli = mysqli_init();
$mysqli->ssl_set(NULL, NULL, /etc/ssl/certs/ca-certificates.crt, NULL, NULL);
$mysqli->real_connect($hostname, $username, $password, $dbName, $port);

if ($mysqli->connect_error) {
    echo 'Connection Failed';
} else {
    echo "Connected successfully";
}
}
else{
    printf(".env file not found");
}

$ad = $_POST["name"];
$soyad = $_POST["lname"];
$tarih = $_POST["birthday"];
$email = $_POST["email"];

$sql = "INSERT INTO customers (name, lname, birthday, email) VALUES ('$ad', '$soyad', '$tarih', '$email')";
if (mysqli_query($mysqli, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
}
mysqli_close($mysqli);

?>