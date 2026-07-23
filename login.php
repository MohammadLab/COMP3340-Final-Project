<?php
session_start();
include "includes/header.php";
include "includes/database.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["first_name"] = $user["first_name"];
        $_SESSION["role"] = $user["role"];

        $message = "Login successful.";
    } else {
        $message = "Invalid email or password.";
    }
}
?>

<main>
    <!-- login section -->
    <h2>Login</h2>

    <?php
    if ($message != "") {
        echo "<p>$message</p>";
    }
    ?>

    <form method="POST" action="login.php">
        <p>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email">
        </p>

        <p>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password">
        </p>

        <p>
            <input type="submit" value="Login" class="button">
        </p>
    </form>
</main>

<?php
include "includes/footer.php";
?>
