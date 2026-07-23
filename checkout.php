<?php
include "includes/header.php";
include "includes/database.php";
?>

<main>
    <!-- checkout section -->
    <h2>Checkout</h2>

    <?php
    /* checkout cart */
    if (!isset($_SESSION["user_id"])) {
        echo "<p>Please log in to checkout.</p>";
    } else {
        $user_id = $_SESSION["user_id"];
        $message = "";
        $total = 0;
        $cart_items = array();

        $sql = "SELECT cart.product_id, products.product_name, products.price, cart.quantity
                FROM cart
                INNER JOIN products ON cart.product_id = products.product_id
                WHERE cart.user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cart_items[] = $row;
                $total = $total + ($row["price"] * $row["quantity"]);
            }

            /* create order */
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $order_date = date("Y-m-d H:i:s");
                $order_sql = "INSERT INTO orders (user_id, order_date, total)
                              VALUES ('$user_id', '$order_date', '$total')";
                $order_result = mysqli_query($conn, $order_sql);

                if ($order_result) {
                    $order_id = mysqli_insert_id($conn);

                    foreach ($cart_items as $cart_item) {
                        $product_id = $cart_item["product_id"];
                        $quantity = $cart_item["quantity"];
                        $price = $cart_item["price"];

                        $order_item_sql = "INSERT INTO order_items (order_id, product_id, quantity, price)
                                           VALUES ('$order_id', '$product_id', '$quantity', '$price')";
                        mysqli_query($conn, $order_item_sql);
                    }

                    $delete_sql = "DELETE FROM cart WHERE user_id = '$user_id'";
                    mysqli_query($conn, $delete_sql);

                    $message = "Order placed successfully.";
                    $cart_items = array();
                }
            }

            if ($message != "") {
                echo "<p>$message</p>";
            } else {
                echo "<table border='1' cellpadding='10'>";
                echo "<tr>";
                echo "<th>Product Name</th>";
                echo "<th>Price</th>";
                echo "<th>Quantity</th>";
                echo "</tr>";

                foreach ($cart_items as $cart_item) {
                    echo "<tr>";
                    echo "<td>" . $cart_item["product_name"] . "</td>";
                    echo "<td>$" . $cart_item["price"] . "</td>";
                    echo "<td>" . $cart_item["quantity"] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
                echo "<p><strong>Total:</strong> $" . $total . "</p>";
    ?>
                <form method="POST" action="checkout.php">
                    <p><input type="submit" value="Place Order" class="button"></p>
                </form>
    <?php
            }
        } else {
            echo "<p>Your cart is empty.</p>";
        }
    }
    ?>
</main>

<?php
include "includes/footer.php";
?>
