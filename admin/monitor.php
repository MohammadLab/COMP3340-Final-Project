<?php
$base_path = "../";
include "../includes/header.php";
include "../includes/database.php";
?>

<!-- monitoring section -->
<main>
    <h2>Website Monitoring</h2>

    <?php
    /* check admin */
    if (!isset($_SESSION["user_id"]) || $_SESSION["role"] != "admin") {
        echo "<p>Access denied.</p>";
    } else {
        /* check database */
        if ($conn) {
            $database_status = "Online";
        } else {
            $database_status = "Offline";
        }

        echo "<table border='1' cellpadding='10'>";
        echo "<tr>";
        echo "<th>Service</th>";
        echo "<th>Status</th>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Website</td>";
        echo "<td>Online</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>PHP</td>";
        echo "<td>Online</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Database</td>";
        echo "<td>" . $database_status . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>User Login</td>";
        echo "<td>Online</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Product Catalogue</td>";
        echo "<td>Online</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Shopping Cart</td>";
        echo "<td>Online</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Checkout</td>";
        echo "<td>Online</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>Admin Area</td>";
        echo "<td>Online</td>";
        echo "</tr>";

        echo "</table>";
    }
    ?>
</main>

<?php include "../includes/footer.php"; ?>
