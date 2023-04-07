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
mysqli_close($mysqli);

?>