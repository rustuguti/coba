<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Berhasil Login</title>
</head>
<body>
    <style>
           body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            background-image: url("g3.jpg");
            background-repeat:no-repeat;
            background-size :cover;
        }
        </style>
<div class="container-logout">
    <form action="home.php" method="POST" class="login-email">
        <h1>Selamat Datang, <?php echo $_SESSION['username']; ?>!</h1>
        <div class="input-group">
            <button type="submit" class="btn">Lanjut</button>
        </div>
    </form>
</div>
</body>
</html>