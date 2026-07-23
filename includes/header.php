<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Mohammad Labak">
    <meta name="description" content="Moe's PC Parts is a simple computer parts website.">
    <meta name="keywords" content="pc parts, computer parts, moe's pc parts">
    <title>Moe's PC Parts</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- main header -->
    <header>
        <h1>Moe's PC Parts</h1>
    </header>

    <!-- main navigation -->
    <nav>
        <a href="index.php">Home</a>
        <a href="products.php">Products</a>
        <?php if (isset($_SESSION["user_id"])) { ?>
            <a href="cart.php">Cart</a>
            <a href="order_history.php">Order History</a>
            <a href="logout.php">Logout</a>
        <?php } else { ?>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
        <?php } ?>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
    </nav>

    <?php if (isset($_SESSION["user_id"])) { ?>
        <p>Welcome, <?php echo $_SESSION["first_name"]; ?>!</p>
    <?php } ?>
