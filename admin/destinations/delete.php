<?php
// admin/destinations/delete.php

require_once __DIR__ . '/../../db_connect.php';
require_once __DIR__ . '/../includes/auth_check.php';

// Get id from query string
$id = (int)($_GET['id'] ?? 0);

if ($id > 0) {
    // (Optional) First fetch existing record to delete its image file
    $stmt = $conn->prepare("SELECT image FROM destinations WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($row = $res->fetch_assoc()) {
        if (!empty($row['image'])) {
            $imgPath = __DIR__ . '/../../uploads/destinations/' . $row['image'];
            if (is_file($imgPath)) {
                @unlink($imgPath); // delete file, ignore error
            }
        }
    }

    // Now delete the destination row
    $stmt = $conn->prepare("DELETE FROM destinations WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
}

// ✅ redirect back to the list in the SAME folder
header('Location: index.php');
exit;
