<html>

<head>
    
    <title>Product</title>
    <?php  include('./views/header.php')?>
</head>

<body>
<?php include ('./views/nav.php')?>
    <main>
        <div class="product content-wrapper">
            <img src="imgs/wallet.jpg" width="500" height="500" alt="Wallet">
            <div>
                <h1 class="name">Wallet</h1>
                <span class="price">
                    $14.99 <span class="rrp">$19.99</span>
                </span>
                <form action="./cart.php" method="post">
                    <input type="number" name="quantity" value="1" min="1" max="34" placeholder="Quantity" required="">
                    <input type="hidden" name="product_id" value="2">
                    <input type="submit" value="Add To Cart">
                </form>
                <div class="description">
                </div>
            </div>
        </div>

    </main>
    <?php include('./views/footer.php')?>

</body>

</html>