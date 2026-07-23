<?php include "includes/header.php"; ?>
<?php include "includes/database.php"; ?>

<!-- products section -->
<main>
    <h2>Our Products</h2>

    <?php
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
            </div>
    <?php
        }
    } else {
        echo "<p>No products found.</p>";
    }
    ?>
</main>

<?php include "includes/footer.php"; ?>
