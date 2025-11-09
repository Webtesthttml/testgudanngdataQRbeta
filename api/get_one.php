<?php
header("Content-Type: application/json");
include "db.php";

$id = $_GET["id"] ?? "";
if (!$id) {
  echo json_encode(["error" => "ID tidak ada"]);
  exit;
}

$stmt = $conn->prepare("SELECT * FROM users WHERE uid=?");
$stmt->bind_param("s", $id);
$stmt->execute();
$res = $stmt->get_result();
echo json_encode($res->fetch_assoc() ?: ["error" => "Data tidak ditemukan"]);
?>