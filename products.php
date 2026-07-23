<?php include "includes/header.php"; ?>
<?php include "includes/database.php"; ?>

<?php
$message = "";

/* add product to cart */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    $product_id = $_POST["product_id"];

    $check_sql = "SELECT * FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $update_sql = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = '$user_id' AND product_id = '$product_id'";
        mysqli_query($conn, $update_sql);
        $message = "Cart updated.";
    } else {
        $insert_sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES ('$user_id', '$product_id', 1)";
        mysqli_query($conn, $insert_sql);
        $message = "Product added to cart.";
    }
}
?>

<!-- products section -->
<main>
    <h2>Our Products</h2>

    <?php
    if (!isset($_SESSION["user_id"])) {
        echo "<p>Please log in to add items to your cart.</p>";
    }

    if ($message != "") {
        echo "<p>$message</p>";
    }
    ?>

    <?php
    /* get products */
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
            <div class="product">
                <h3><?php echo $row['product_name']; ?></h3>
                <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['product_name']; ?>">
                <p><strong>Brand:</strong> <?php echo $row['brand']; ?></p>
                <p><strong>Category:</strong> <?php echo $row['category']; ?></p>
                <p><strong>Price:</strong> $<?php echo $row['price']; ?></p>
                <p><strong>Option One:</strong> <?php echo $row['option_one']; ?></p>
                <p><strong>Option Two:</strong> <?php echo $row['option_two']; ?></p>
                <p><?php echo $row['description']; ?></p>

                <?php if (isset($_SESSION["user_id"])) { ?>
                    <form method="POST" action="products.php">
                        <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                        <input type="submit" value="Add to Cart" class="button">
                    </form>
                <?php } ?>
            </div>
    <?php
        }
    } else {
        echo "<p>No products found.</p>";
    }
    ?>
</main>

<?php include "includes/footer.php"; ?>
