<?php
require_once __DIR__ . '/../../db_connect.php';
require_once __DIR__ . '/../includes/auth_check.php';
<<<<<<< HEAD
$id = (int)($_GET['id'] ?? 0);
=======

$id = (int)($_GET['id'] ?? 0);

>>>>>>> 4b0b099 (Initial commit: Travel CMS project)
if ($id > 0) {
    $stmt = $conn->prepare("DELETE FROM destinations WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
}
<<<<<<< HEAD
header('Location: /admin/destinations/index.php');
=======


header('Location: index.php');
>>>>>>> 4b0b099 (Initial commit: Travel CMS project)
exit;
