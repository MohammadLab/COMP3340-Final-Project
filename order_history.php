<?php
session_start();
include "includes/header.php";
include "includes/database.php";
?>

<main>
    <!-- order history section -->
    <h2>Order History</h2>

    <?php
    if (!isset($_SESSION["user_id"])) {
        echo "<p>Please log in to view your order history.</p>";
    } else {
        $user_id = $_SESSION["user_id"];
        $sql = "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY order_date DESC";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1' cellpadding='10'>";
            echo "<tr>";
            echo "<th>Order ID</th>";
            echo "<th>Order Date</th>";
            echo "<th>Total</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["order_id"] . "</td>";
                echo "<td>" . $row["order_date"] . "</td>";
                echo "<td>$" . $row["total"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>You have not placed any orders.</p>";
        }
    }
    ?>
</main>

<?php
include "includes/footer.php";
?>
