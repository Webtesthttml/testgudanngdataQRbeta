<?php
header("Content-Type: application/json");
include "db.php";

$data = json_decode(file_get_contents("php://input"), true);

if (!$data["name"]) {
  echo json_encode(["error" => "Nama wajib diisi"]);
  exit;
}

$uid = uniqid("u");
$stmt = $conn->prepare("INSERT INTO users (uid, name, phone, nid, email, address, created) VALUES (?, ?, ?, ?, ?, ?, NOW())");
$stmt->bind_param("ssssss", $uid, $data["name"], $data["phone"], $data["nid"], $data["email"], $data["address"]);
if ($stmt->execute()) {
  echo json_encode(["success" => true, "uid" => $uid]);
} else {
  echo json_encode(["error" => "Gagal menyimpan data"]);
}
?>