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

// POST verilerini al
$name = $_POST["name"]; // POST ile alınacak isim verisi
$lname = $_POST["lname"]; // POST ile alınacak soyisim verisi
$birthday = $_POST["birthday"]; // POST ile alınacak doğum tarihi verisi
$email = $_POST["email"]; // POST ile alınacak email verisi

// SQL sorgusunu oluştur
$sql = "INSERT INTO customers (name, lname, birthday, email) VALUES ('$name', '$lname', '$birthday', '$email')";

// Eğer veri ekleme başarılı ise success.html sayfasına yönlendirme sağlıyoruz.
if (mysqli_query($mysqli, $sql)) {
    header("Location: ../yavasdeveloper/success.html");
    echo "Veri başarıyla eklendi.";
} else {
    echo "Hata: " . $sql . "<br>" . mysqli_error($mysqli);
}

//bağlantıyı kapatıyoruz.
mysqli_close($mysqli);

?>