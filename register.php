<?php
include "includes/header.php";
include "includes/database.php";

$message = "";

/* register user */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = "customer";

    $sql = "INSERT INTO users (first_name, last_name, email, password, role)
            VALUES ('$first_name', '$last_name', '$email', '$password', '$role')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $message = "Registration successful.";
    } else {
        $message = "Registration failed.";
    }
}
?>

<main>
    <!-- register section -->
    <h2>Register</h2>

    <?php
    if ($message != "") {
        echo "<p>$message</p>";
    }
    ?>

    <form method="POST" action="register.php">
        <p>
            <label for="first_name">First Name:</label><br>
            <input type="text" id="first_name" name="first_name">
        </p>

        <p>
            <label for="last_name">Last Name:</label><br>
            <input type="text" id="last_name" name="last_name">
        </p>

        <p>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email">
        </p>

        <p>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password">
        </p>

        <p>
            <input type="submit" value="Register" class="button">
        </p>
    </form>
</main>

<?php
include "includes/footer.php";
?>
