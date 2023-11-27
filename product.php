<?php
session_start();
require_once './database/connection.php';

// Check if the product_id is set and is a positive integer
if (isset($_GET['id']) && ctype_digit($_GET['id']) && $_GET['id'] > 0) {
    $productId = $_GET['id'];

    // Fetch product details from the database
    $sql = "SELECT * FROM products WHERE id = $productId";
    $result = mysqli_query($connection, $sql);

    // Check if a product is found with the given ID
    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        // Redirect or handle the case when the product is not found
        header('Location: ./error.php');
        exit();
    }
} else {
    // Redirect or handle the case when the product_id is not valid
    header('Location: ./error.php');
    exit();
}

// Check if the form is submitted for adding to the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
    $productId = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);

    $user_id = $_SESSION['user_id'] ?? 0;
    if ($quantity !== false && $productId !== false && !empty($_SESSION['user_id'])) {
        // Ensure the quantity is a positive integer
        if ($quantity > 0) {
            // Create or update the cart session variable
            $_SESSION['cart'] = $_SESSION['cart'] ?? [];

            // Check if the product is already in the cart
            if (isset($_SESSION['cart'][$user_id][$productId])) {
                // If the product is already in the cart, update the quantity
                $_SESSION['cart'][$user_id][$productId] += $quantity;
            } else {
                // If the product is not in the cart, add it with the specified quantity
                $_SESSION['cart'][$user_id][$productId] = $quantity;
            }

            // Redirect to the cart page or any other page as needed
            header('Location: ./cart.php');
            exit();
        }
    } else {
        if ($user_id == 0) {
            header('Location: ./myaccount.php');
            exit();
        } else {
            // // Redirect to the error page if the conditions are not met
            header('Location: ./error.php');
            exit();
        }
    }
}

?>

<html>

<head>
    <title>Product</title>
    <?php include './views/header.php'; ?>
</head>

<body>
    <?php include './views/nav.php'; ?>
    <main>
        <div class="product content-wrapper">
            <img  class="responsive-image" src="<?php echo $proj_root_url; ?>/imgs/<?php echo $product['img']; ?>" width="500" height="500" alt="<?php echo $product['name']; ?>">
            <div class="product-info">
                <h1 class="name"><?php echo $product['name']; ?></h1>
                <span class="price">
                    $<?php echo $product['price']; ?> <span class="rrp">$<?php echo $product['market_price']; ?></span>
                </span>
                <form action="./product.php?id=<?php echo $product['id']; ?>" method="post">
                    <input type="hidden" type="number" name="quantity" value="1" min="1" max="34" placeholder="Quantity" required="">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="submit" value="Add To Cart">
                </form>
                <div class="description">
                    <?php echo $product['desc']; ?>
                </div>
            </div>
        </div>
    </main>
    <?php include './views/footer.php'; ?>
</body>

</html>
