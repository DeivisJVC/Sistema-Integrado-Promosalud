<?php
session_start();
if ($_SESSION['rol'] !== 'paciente') {
  http_response_code(403);
  exit;
}
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$conn = new mysqli('localhost', 'root', '', 'sistema_integrado_promosalud2');
$stmt = $conn->prepare("DELETE FROM agenda WHERE id = ?");
$stmt->bind_param("i", $id);
$success = $stmt->execute();
echo json_encode(['success' => $success]);
