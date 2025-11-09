<?php
header("Content-Type: application/json");
include "db.php";

$res = $conn->query("SELECT * FROM users ORDER BY name ASC");
$data = [];
while ($row = $res->fetch_assoc()) {
  $data[] = $row;
}
echo json_encode($data);
?>