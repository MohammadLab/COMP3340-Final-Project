<?php
$base_path = "../";
include "../includes/header.php";
include "../includes/database.php";
?>

<!-- edit product section -->
<main>
    <h2>Edit Product</h2>

    <?php
    /* check admin */
    if (!isset($_SESSION["user_id"]) || $_SESSION["role"] != "admin") {
        echo "<p>Access denied.</p>";
    } else {
        $product_id = $_GET["id"];
        $message = "";

        /* update product */
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $product_name = $_POST["product_name"];
            $category = $_POST["category"];
            $brand = $_POST["brand"];
            $option_one = $_POST["option_one"];
            $option_two = $_POST["option_two"];
            $price = $_POST["price"];
            $image = $_POST["image"];
            $description = $_POST["description"];

            $update_sql = "UPDATE products
                           SET product_name = '$product_name',
                               category = '$category',
                               brand = '$brand',
                               option_one = '$option_one',
                               option_two = '$option_two',
                               price = '$price',
                               image = '$image',
                               description = '$description'
                           WHERE product_id = '$product_id'";

            if (mysqli_query($conn, $update_sql)) {
                $message = "Product updated successfully.";
            } else {
                $message = "Product was not updated.";
            }
        }

        if ($message != "") {
            echo "<p>$message</p>";
        }

        /* get product */
        $sql = "SELECT * FROM products WHERE product_id = '$product_id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    ?>

            <!-- edit product form -->
            <form method="POST" action="edit_product.php?id=<?php echo $product_id; ?>">
                <p>
                    <label>Product Name</label><br>
                    <input type="text" name="product_name" value="<?php echo $row["product_name"]; ?>" required>
                </p>

                <p>
                    <label>Category</label><br>
                    <input type="text" name="category" value="<?php echo $row["category"]; ?>" required>
                </p>

                <p>
                    <label>Brand</label><br>
                    <input type="text" name="brand" value="<?php echo $row["brand"]; ?>" required>
                </p>

                <p>
                    <label>Option One</label><br>
                    <input type="text" name="option_one" value="<?php echo $row["option_one"]; ?>" required>
                </p>

                <p>
                    <label>Option Two</label><br>
                    <input type="text" name="option_two" value="<?php echo $row["option_two"]; ?>" required>
                </p>

                <p>
                    <label>Price</label><br>
                    <input type="number" name="price" step="0.01" value="<?php echo $row["price"]; ?>" required>
                </p>

                <p>
                    <label>Image Filename</label><br>
                    <input type="text" name="image" value="<?php echo $row["image"]; ?>" required>
                </p>

                <p>
                    <label>Description</label><br>
                    <textarea name="description" required><?php echo $row["description"]; ?></textarea>
                </p>

                <p>
                    <input type="submit" value="Update Product" class="button">
                </p>
            </form>
    <?php
        } else {
            echo "<p>Product not found.</p>";
        }
    }
    ?>
</main>

<?php include "../includes/footer.php"; ?>
