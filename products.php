<html>

<head>
    
    <title>Products</title>
    <?php  include('./views/header.php')?>
</head>

<body>
<?php include ('./views/nav.php')?>
    <main>
        <div class="products content-wrapper">
            <h1>Products</h1>
            <p>6 Products</p>
            <div class="products-wrapper">
                <a href="product.php" class="product">
                    <img src="imgs/wallet.jpg" width="200" height="200" alt="Wallet">
                    <span class="name">Wallet</span>
                    <span class="price">
                        $14.99 <span class="rrp">$19.99</span>
                    </span>
                </a>
                <a href="product.php" class="product">
                    <img src="imgs/headphones.jpeg" width="200" height="200" alt="Headphones">
                    <span class="name">Headphones</span>
                    <span class="price">
                        $19.99 </span>
                </a>
                <a href="product.php" class="product">
                    <img src="imgs/watch.jpg" width="200" height="200" alt="Smart Watch">
                    <span class="name">Smart Watch</span>
                    <span class="price">
                        $29.99 </span>
                </a>
                <a href="product.php" class="product">
                    <img src="imgs/camera.jpg" width="200" height="200" alt="Digital Camera">
                    <span class="name">Digital Camera</span>
                    <span class="price">
                        $69.99 </span>
                </a>
            </div>
            <div class="buttons">
                <a href="products.php&amp;p=2">Next</a>
            </div>
        </div>

    </main>
    <?php include('./views/footer.php')?>

</body>

</html>