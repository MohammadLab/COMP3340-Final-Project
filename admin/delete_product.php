<?php
$base_path = "../";
include "../includes/header.php";
include "../includes/database.php";
?>

<!-- delete product section -->
<main>
    <h2>Delete Product</h2>

    <?php
    /* check admin */
    if (!isset($_SESSION["user_id"]) || $_SESSION["role"] != "admin") {
        echo "<p>Access denied.</p>";
    } else {
        $product_id = $_GET["id"];

        /* delete product */
        $sql = "DELETE FROM products WHERE product_id = '$product_id'";

        if (mysqli_query($conn, $sql)) {
            echo "<p>Product deleted successfully.</p>";
        } else {
            echo "<p>Product was not deleted.</p>";
        }

        echo "<p><a href='products.php'>Back to Products</a></p>";
    }
    ?>
</main>

<?php include "../includes/footer.php"; ?>
