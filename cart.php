<?php
session_start();
include "includes/header.php";
include "includes/database.php";
?>

<main>
    <!-- cart section -->
    <h2>Cart</h2>

    <?php
    if (!isset($_SESSION["user_id"])) {
        echo "<p>Please log in to view your cart.</p>";
    } else {
        $user_id = $_SESSION["user_id"];
        $sql = "SELECT products.product_name, products.price, cart.quantity
                FROM cart
                INNER JOIN products ON cart.product_id = products.product_id
                WHERE cart.user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1' cellpadding='10'>";
            echo "<tr>";
            echo "<th>Product Name</th>";
            echo "<th>Price</th>";
            echo "<th>Quantity</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["product_name"] . "</td>";
                echo "<td>$" . $row["price"] . "</td>";
                echo "<td>" . $row["quantity"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>Your cart is empty.</p>";
        }
    }
    ?>
</main>

<?php
include "includes/footer.php";
?>
