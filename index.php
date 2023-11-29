<?php
//error check
error_reporting(0);
ini_set('display_errors', '0');
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
            <?php
    // Dumping variables for debugging purposes
    // $gadgetsTitle = "Gadgets";
    // $gadgetsDescription = "EveryDay Use Electronic Items";

    // // Dump variables
    // echo "<pre>";
    // var_dump($gadgetsTitle);
    // var_dump($gadgetsDescription);
    // echo "</pre>";
    // ?>
    <!-- Output -->
    <!-- string(7) "Gadgets"
string(29) "EveryDay Use Electronic Items" -->
        </div>
        <div class="recentlyadded content-wrapper">
            <h2>Recently Added Products</h2>
            <?php
    // // Perform some actions related to Recently Added Products
    // // For demonstration purposes, let's simulate an error
    // $undefinedVariable = $nonExistentArray['key'];

    // // Add a stack trace for debugging
    // $stackTrace = debug_backtrace();
    // echo "<pre>";
    // var_dump($stackTrace);
    // echo "</pre>";
    // ?>
            <div class="products">
                <?php if ($result) {
        // Check if there are any rows in the result set
        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
            <a href="<?php echo $proj_root_url; ?>/product.php?id=<?php echo $row['id']; ?>" class="product">
                    <img src="<?php echo $proj_root_url.'/imgs/'.$row['img']; ?>" width="200" height="200" alt="Wallet">
                    <span class="name"><?php echo $row['name']; ?></span>
                    <span class="price">
                       <?php echo $row['price'];
                if ($row['market_price'] > 0) {
                    echo " <span class='rrp'>".$row['market_price'].'</span>';
                } ?> 
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
    <!-- <?php
    die('Manual Breakpoint: Stopping execution for debugging');
    ?> -->
    <?php include './views/footer.php'; ?>

</body>

</html>