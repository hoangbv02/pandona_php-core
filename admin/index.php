<?php
session_start();
if (!isset($_SESSION['login']['admin'])) {
    header("Location: ../index.php?pages=dang_nhap");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="../assets/fontawesome/css/all.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/bootstrap/css/admin_bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/css/admin.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <?php include 'layout/sidebar.php' ?>
        <!-- Content Start -->
        <div class="content">
            <?php include 'layout/navbar.php';
            include('../config/dbhelper.php');
            ?>
            <?php
            $pages = isset($_GET['pages']) ? $_GET['pages'] : 'trang_chu';
            include $pages . '.php';
            ?>
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button"><i class="fas fa-chevron-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="../assets/jquery/jquery-3.6.1.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src="../assets/js/admin.js"></script>
</body>

</html>