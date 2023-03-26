<?php
include("connection.php");

session_start();
$uname = $_SESSION['uname'];

if ($uname) {
} else {
    header("location:admin.php");
    die();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin-Dashboard manage products</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?
    family=Poppins:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <p>管理者名稱 : <?php echo $uname; ?></p>
        <a href="logout.php">登出</a>
    </header>
</body>
