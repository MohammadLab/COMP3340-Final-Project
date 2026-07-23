<?php
/* start session */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/* set link path */
if (!isset($base_path)) {
    $base_path = "";
}

/* choose theme */
$theme_file = "style.css";

if (isset($_COOKIE["theme"])) {
    if ($_COOKIE["theme"] == "dark") {
        $theme_file = "dark.css";
    } else {
        if ($_COOKIE["theme"] == "blue") {
            $theme_file = "blue.css";
        } else {
            $theme_file = "style.css";
        }
    }
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
    <link rel="stylesheet" href="<?php echo $base_path; ?>css/<?php echo $theme_file; ?>">
</head>
<body>
    <!-- main header -->
    <header>
        <h1>Moe's PC Parts</h1>
    </header>

    <!-- main navigation -->
    <nav>
        <a href="<?php echo $base_path; ?>index.php">Home</a>
        <a href="<?php echo $base_path; ?>products.php">Products</a>
        <?php if (isset($_SESSION["user_id"])) { ?>
            <a href="<?php echo $base_path; ?>profile.php">Profile</a>
            <a href="<?php echo $base_path; ?>cart.php">Cart</a>
            <a href="<?php echo $base_path; ?>order_history.php">Order History</a>
            <a href="<?php echo $base_path; ?>logout.php">Logout</a>
        <?php } else { ?>
            <a href="<?php echo $base_path; ?>register.php">Register</a>
            <a href="<?php echo $base_path; ?>login.php">Login</a>
        <?php } ?>
        <a href="<?php echo $base_path; ?>about.php">About</a>
        <a href="<?php echo $base_path; ?>contact.php">Contact</a>
        <a href="<?php echo $base_path; ?>help/index.php">Help</a>
        <a href="<?php echo $base_path; ?>theme.php?theme=normal">Normal Theme</a>
        <a href="<?php echo $base_path; ?>theme.php?theme=dark">Dark Theme</a>
        <a href="<?php echo $base_path; ?>theme.php?theme=blue">Blue Theme</a>
    </nav>

    <?php if (isset($_SESSION["user_id"])) { ?>
        <p>Welcome, <?php echo $_SESSION["first_name"]; ?>!</p>
    <?php } ?>
