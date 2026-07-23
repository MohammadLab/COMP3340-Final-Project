<?php
$base_path = "../";
include "../includes/header.php";
include "../includes/database.php";
?>

<!-- toggle user section -->
<main>
    <h2>Update User Status</h2>

    <?php
    /* check admin */
    if (!isset($_SESSION["user_id"]) || $_SESSION["role"] != "admin") {
        echo "<p>Access denied.</p>";
    } else {
        $user_id = $_GET["id"];
        $status = $_GET["status"];

        /* update user status */
        if ($user_id == $_SESSION["user_id"]) {
            echo "<p>User status was not updated.</p>";
        } else {
            $sql = "UPDATE users SET status = '$status' WHERE user_id = '$user_id'";

            if (mysqli_query($conn, $sql)) {
                echo "<p>User status updated successfully.</p>";
            } else {
                echo "<p>User status was not updated.</p>";
            }
        }

        echo "<p><a href='users.php'>Back to Users</a></p>";
    }
    ?>
</main>

<?php include "../includes/footer.php"; ?>
