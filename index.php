<?php
session_start();
require_once './database/connection.php';

?>
<html>

<head>
    
    <title>Home</title>
    
    <?php include './views/header.php';

    $sql = 'SELECT * FROM products';
    $result = mysqli_query($connection, $sql);

    ?>
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
                <?php if ($result) {
        // Check if there are any rows in the result set
        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
            <a href="product.php" class="product">
                    <img src="<?php echo 'imgs/'.$row["img"] ?>" width="200" height="200" alt="Wallet">
                    <span class="name"><?php echo $row["name"] ?></span>
                    <span class="price">
                       <?php echo $row["price"]; 
                            if($row["market_price"] > 0){
                                echo " <span class='rrp'>".$row["market_price"]."</span>";
                            }    
                       ?> 
                    </span>
                </a>
          <?php
            }
        } else {
            echo 'No products found';
        }

        // Free result set
        mysqli_free_result($result);
    } else {
        echo 'Error: '.mysqli_error($connection);
    }?>
                
               
            </div>
        </div>

    </main>
    <?php include './views/footer.php'; ?>

</body>

</html>