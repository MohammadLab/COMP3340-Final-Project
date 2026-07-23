<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ob_start();
include "../includes/header.php";
$header = ob_get_clean();

/* fix header paths for the admin folder */
$header = str_replace('href="css/style.css"', 'href="../css/style.css"', $header);
$header = str_replace('href="index.php"', 'href="../index.php"', $header);
$header = str_replace('href="products.php"', 'href="../products.php"', $header);
$header = str_replace('href="cart.php"', 'href="../cart.php"', $header);
$header = str_replace('href="order_history.php"', 'href="../order_history.php"', $header);
$header = str_replace('href="logout.php"', 'href="../logout.php"', $header);
$header = str_replace('href="register.php"', 'href="../register.php"', $header);
$header = str_replace('href="login.php"', 'href="../login.php"', $header);
$header = str_replace('href="about.php"', 'href="../about.php"', $header);
$header = str_replace('href="contact.php"', 'href="../contact.php"', $header);
echo $header;

include "../includes/database.php";
?>

<!-- admin products section -->
<main>
    <h2>Admin Products</h2>

    <?php
    /* check if user is an admin */
    if (!isset($_SESSION["user_id"]) || $_SESSION["role"] != "admin") {
        echo "<p>Access denied.</p>";
    } else {
        $message = "";

        /* add product when form is submitted */
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $product_name = $_POST["product_name"];
            $category = $_POST["category"];
            $brand = $_POST["brand"];
            $option_one = $_POST["option_one"];
            $option_two = $_POST["option_two"];
            $price = $_POST["price"];
            $image = $_POST["image"];
            $description = $_POST["description"];

            $sql = "INSERT INTO products (product_name, category, brand, option_one, option_two, price, image, description)
                    VALUES ('$product_name', '$category', '$brand', '$option_one', '$option_two', '$price', '$image', '$description')";

            if (mysqli_query($conn, $sql)) {
                $message = "Product added successfully.";
            } else {
                $message = "Product was not added.";
            }
        }

        if ($message != "") {
            echo "<p>$message</p>";
        }
    ?>

        <!-- add product form -->
        <h3>Add Product</h3>

        <form method="POST" action="products.php">
            <p>
                <label>Product Name</label><br>
                <input type="text" name="product_name" required>
            </p>

            <p>
                <label>Category</label><br>
                <input type="text" name="category" required>
            </p>

            <p>
                <label>Brand</label><br>
                <input type="text" name="brand" required>
            </p>

            <p>
                <label>Option One</label><br>
                <input type="text" name="option_one" required>
            </p>

            <p>
                <label>Option Two</label><br>
                <input type="text" name="option_two" required>
            </p>

            <p>
                <label>Price</label><br>
                <input type="number" name="price" step="0.01" required>
            </p>

            <p>
                <label>Image Filename</label><br>
                <input type="text" name="image" required>
            </p>

            <p>
                <label>Description</label><br>
                <textarea name="description" required></textarea>
            </p>

            <p>
                <input type="submit" value="Add Product" class="button">
            </p>
        </form>

        <!-- products table -->
        <h3>Product List</h3>

        <?php
        /* get all products */
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
            echo "<th>Edit</th>";
            echo "<th>Delete</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["product_id"] . "</td>";
                echo "<td>" . $row["product_name"] . "</td>";
                echo "<td>" . $row["brand"] . "</td>";
                echo "<td>" . $row["category"] . "</td>";
                echo "<td>$" . $row["price"] . "</td>";
                echo "<td><a href='edit_product.php?id=" . $row["product_id"] . "'>Edit</a></td>";
                echo "<td><a href='delete_product.php?id=" . $row["product_id"] . "'>Delete</a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No products found.</p>";
        }
        ?>
    <?php } ?>
</main>

<?php include "../includes/footer.php"; ?>
