<?php
// Make sure session exists (for admin_name, etc.)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/*
 * Set this to whatever folder your project lives in.
 *
 * Examples:
 *   http://localhost/travel_cms/admin/login.php  ->  $baseUrl = '/travel_cms';
 *   http://localhost/TravelCms/admin/login.php   ->  $baseUrl = '/TravelCms';
 *   http://localhost/HTTP5225/TravelCms/admin/login.php -> $baseUrl = '/HTTP5225/TravelCms';
 */
$baseUrl = '/travel_cms'; // <<< CHANGE THIS TO MATCH YOUR URL

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Travel CMS Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 (CDN) -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous"
    >

    <!-- Font Awesome (CDN) -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

    <style>
        body {
            padding-top: 70px;
            background-color: #f5f5f5;
        }
        .sidebar {
            position: fixed;
            top: 70px;
            left: 0;
            bottom: 0;
            width: 230px;
            padding: 15px;
            background: #f8f9fa;
            border-right: 1px solid #ddd;
            overflow-y: auto;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .sidebar .nav-link {
            color: #333;
            padding-left: 0;
        }
        .sidebar .nav-link i {
            width: 20px;
        }
        .sidebar .nav-link.active {
            font-weight: 600;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo $baseUrl; ?>/admin/dashboard.php">
            <i class="fa fa-globe-americas"></i> Travel CMS Admin
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#adminNav" aria-controls="adminNav"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="adminNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link"
                       href="<?php echo $baseUrl; ?>/frontend/index.php"
                       target="_blank">
                        <i class="fa fa-home"></i> View Site
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       href="<?php echo $baseUrl; ?>/admin/logout.php">
                        <i class="fa fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="sidebar">
    <div class="mb-3">
        <strong>Admin Menu</strong>
        <?php if (!empty($_SESSION['admin_name'])): ?>
            <div class="small text-muted">
                Logged in as: <?php echo htmlspecialchars($_SESSION['admin_name']); ?>
            </div>
        <?php endif; ?>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link"
               href="<?php echo $baseUrl; ?>/admin/dashboard.php">
                <i class="fa fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link"
               href="<?php echo $baseUrl; ?>/admin/destinations/index.php">
                <i class="fa fa-map-marker-alt"></i> Destinations
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link"
               href="<?php echo $baseUrl; ?>/admin/photos/index.php">
                <i class="fa fa-images"></i> Photos
            </a>
        </li>
    </ul>
</div>

<div class="content">
<!-- page content starts in each file after including admin_header.php -->
