<?php
session_start();
require_once './database/connection.php';

// Pagination settings
$productsPerPage = 4;
$page = isset($_GET['p']) ? (int) $_GET['p'] : 1;
$offset = ($page - 1) * $productsPerPage;

// Fetch products from the database
$sql = "SELECT * FROM products LIMIT $offset, $productsPerPage";
$result = mysqli_query($connection, $sql);

?>

<html>

<head>
    <title>Products</title>
    <?php include './views/header.php'; ?>
</head>

<body>
    <?php include './views/nav.php'; ?>
    <main>
        <div class="products content-wrapper">
            <h1>Products</h1>
              <div class="products-wrapper">
            <?php
            // Display products
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="product.php" class="product">';
                echo '<img src="imgs/'.$row['img'].'" width="200" height="200" alt="'.$row['name'].'">';
                echo '<span class="name">'.$row['name'].'</span>';
                echo '<span class="price">$'.$row['price'].'</span>';
                echo '</a>';
            }

            // Display pagination links
            $sql = 'SELECT COUNT(*) AS total FROM products';
            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_assoc($result);
            $totalProducts = $row['total'];
            $totalPages = ceil($totalProducts / $productsPerPage);

         // Display pagination links
            echo '</div><div class="pagination">';

            // Previous link
            if ($page > 1) {
                echo '<a href="products.php?p='.($page - 1).'">Previous</a>';
            }

            // Page numbers
            echo '<span class="page">Page '.$page.' of '.$totalPages.'</span>';
            for ($i = 1; $i <= $totalPages; ++$i) {
                if ($i === $page) {
                    echo '<span class="current">'.$i.'</span>';
                } else {
                    echo '<a href="products.php?p='.$i.'">'.$i.'</a>';
                }
            }

            // Next link
            if ($page < $totalPages) {
                echo '<a href="products.php?p='.($page + 1).'">Next</a>';
            }

            echo '</div>';
            ?>

        
        </div>
    </main>
    <?php include './views/footer.php'; ?>
</body>

</html>
