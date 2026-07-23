<?php
include "includes/header.php";
include "includes/database.php";
?>

<!-- statistics section -->
<main>
    <h2>Products by Category</h2>
    <p>This graph shows the number of products in each category.</p>

    <?php
    /* get product counts */
    $sql = "SELECT category, COUNT(*) AS product_count FROM products GROUP BY category";
    $result = mysqli_query($conn, $sql);

    $categories = "";
    $counts = "";

    while ($row = mysqli_fetch_assoc($result)) {
        $categories = $categories . "'" . $row["category"] . "',";
        $counts = $counts . $row["product_count"] . ",";
    }
    ?>

    <canvas id="productsChart"></canvas>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
/* create chart */
var categoryNames = [<?php echo $categories; ?>];
var productCounts = [<?php echo $counts; ?>];

var chartArea = document.getElementById("productsChart");

var productsChart = new Chart(chartArea, {
    type: "bar",
    data: {
        labels: categoryNames,
        datasets: [{
            label: "Products",
            data: productCounts
        }]
    },
    options: {
        plugins: {
            title: {
                display: true,
                text: "Products by Category"
            }
        }
    }
});
</script>

<?php include "includes/footer.php"; ?>
