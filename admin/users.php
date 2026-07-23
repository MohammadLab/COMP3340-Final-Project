<?php
$base_path = "../";
include "../includes/header.php";
include "../includes/database.php";
?>

<!-- admin users section -->
<main>
    <h2>Admin Users</h2>

    <?php
    /* check admin */
    if (!isset($_SESSION["user_id"]) || $_SESSION["role"] != "admin") {
        echo "<p>Access denied.</p>";
    } else {
        /* get users */
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1' cellpadding='10'>";
            echo "<tr>";
            echo "<th>User ID</th>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Email</th>";
            echo "<th>Role</th>";
            echo "<th>Status</th>";
            echo "<th>Action</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["user_id"] . "</td>";
                echo "<td>" . $row["first_name"] . "</td>";
                echo "<td>" . $row["last_name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["role"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";

                if ($row["user_id"] == $_SESSION["user_id"]) {
                    echo "<td>Current User</td>";
                } else {
                    if ($row["status"] == "active") {
                        echo "<td><a href='toggle_user.php?id=" . $row["user_id"] . "&status=disabled'>Disable</a></td>";
                    } else {
                        echo "<td><a href='toggle_user.php?id=" . $row["user_id"] . "&status=active'>Enable</a></td>";
                    }
                }

                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No users found.</p>";
        }
    }
    ?>
</main>

<?php include "../includes/footer.php"; ?>
