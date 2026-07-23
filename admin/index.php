<?php
$base_path = "../";
include "../includes/header.php";
include "../includes/database.php";
?>

<main>
    <!-- admin section -->
    <h2>Admin Page</h2>

    <?php
    /* check admin */
    if (!isset($_SESSION["user_id"]) || $_SESSION["role"] != "admin") {
        echo "<p>Access denied.</p>";
    } else {
        /* get products */
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1' cellpadding='10'>";
            echo "<tr>";
            echo "<th>Product ID</th>";
            echo "<th>Product Name</th>";
            echo "<th>Brand</th>";
            echo "<th>Category</th>";
            echo "<th>Price</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["product_id"] . "</td>";
                echo "<td>" . $row["product_name"] . "</td>";
                echo "<td>" . $row["brand"] . "</td>";
                echo "<td>" . $row["category"] . "</td>";
                echo "<td>$" . $row["price"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No products found.</p>";
        }
    }
    ?>
</main>

<?php
include "../includes/footer.php";
?>
