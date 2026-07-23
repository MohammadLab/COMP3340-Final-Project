<?php
include "includes/header.php";
include "includes/database.php";
?>

<!-- profile section -->
<main>
    <h2>Profile</h2>

    <?php
    /* check login */
    if (!isset($_SESSION["user_id"])) {
        echo "<p>Please log in to view your profile.</p>";
    } else {
        $user_id = $_SESSION["user_id"];

        /* get user */
        $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            echo "<table border='1' cellpadding='10'>";
            echo "<tr>";
            echo "<th>First Name</th>";
            echo "<td>" . $row["first_name"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Last Name</th>";
            echo "<td>" . $row["last_name"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Email</th>";
            echo "<td>" . $row["email"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Role</th>";
            echo "<td>" . $row["role"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th>Status</th>";
            echo "<td>" . $row["status"] . "</td>";
            echo "</tr>";
            echo "</table>";
        } else {
            echo "<p>User not found.</p>";
        }
    }
    ?>
</main>

<?php include "includes/footer.php"; ?>
