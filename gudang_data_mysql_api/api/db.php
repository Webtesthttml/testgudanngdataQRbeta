<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "gudang_data";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
  die(json_encode(["error" => "Koneksi gagal: " . $conn->connect_error]));
}
$conn->set_charset("utf8mb4");
?>