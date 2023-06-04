<?php
$host = "localhost";
$dbname = "siakad";
$username = "root";
$password = "";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Koneksi ke database berhasil!";
} catch(PDOException $e) {
    echo "Koneksi ke database gagal: " . $e->getMessage();
}
?>

