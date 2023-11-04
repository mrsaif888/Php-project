<?php
session_start();
require_once './database/connection.php';

?>
<html>

<head>
    
    <title>Home</title>
    <?php include './views/header.php'; ?>
</head>

<body>
<?php include './views/nav.php'; ?>
    <main>
        <div class="featured">
            <h2>Gadgets</h2>
            <p>EveryDay Use Electronic Items</p>
        </div>
        <div class="recentlyadded content-wrapper">
            <h2>Recently Added Products</h2>
            <div class="products">
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
        </div>

    </main>
    <?php include './views/footer.php'; ?>

</body>

</html>