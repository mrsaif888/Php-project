<?php
session_start();
require_once './database/connection.php';

// Fetch products based on product IDs in the session cart
$cartProducts = [];
$user_id = $_SESSION['user_id'] ?? 0;
 $subtotal = 0;
// Check if the session cart exists and is an array
if (isset($_SESSION['cart'][$user_id]) && is_array($_SESSION['cart'][$user_id])) {
    $productIds = array_keys($_SESSION['cart'][$user_id]); // Get product IDs from the cart
    $subtotal = 0;
    if (!empty($productIds)) {
        // Create a string of comma-separated product IDs
        $productIdsString = implode(',', $productIds);

        // Prepare the query
        $query = "SELECT * FROM products WHERE id IN ($productIdsString)";

        // Execute the query
        $result = mysqli_query($connection, $query);

        // Check if the query was successful

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cartProducts[$row['id']] = $row; // Use product ID as array key
                $quantity = $_SESSION['cart'][$user_id][$row['id']];
                $subtotal += $row['price'] * $quantity;
            }
        }
    }
}

// Handle quantity updates and product removal
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'quantity-') !== false) {
            $productId = str_replace('quantity-', '', $key);
            $newQuantity = (int) $value;
            // Validate the quantity
            // if ($newQuantity > 0 && $newQuantity <= 10) {
            $_SESSION['cart'][$user_id][$productId] = $newQuantity;
            $subtotal = 0;
            foreach ($cartProducts as $product) {
                $productId = $product['id'];

                // Ensure that the product ID exists in the cart quantities array
                if (isset($_SESSION['cart'][$user_id])) {
                    $quantity = $_SESSION['cart'][$user_id][$productId];
                    $subtotal += $product['price'] * $quantity;
                }
            }
            // }
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['placeorder'])) {
    $user_id = $_SESSION['user_id'] ?? 0;

    // Check if the session cart exists and is an array
    if (isset($_SESSION['cart'][$user_id]) && is_array($_SESSION['cart'][$user_id])) {
        unset($_SESSION['cart'][$user_id]);
        header('Location: ./placeorder.php');
        exit();
    }
}

// Handle product removal using GET method
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['remove'])) {
    $productIdToRemove = $_GET['remove'];

    // Check if the product ID exists in the cart
    if (isset($_SESSION['cart'][$user_id][$productIdToRemove])) {
        // Remove the product from the cart
        unset($_SESSION['cart'][$user_id][$productIdToRemove]);

        // Redirect to the cart page
        header('Location: cart.php');
        exit();
    }
}

?>

<html>
<head>
    <title>Cart</title>
    <?php include './views/header.php'; ?>

</head>

<body>
    <?php include './views/nav.php'; ?>
    <main class="cart-main">
        <div class="cart content-wrapper">
            <h1>Shopping Cart</h1>
            <?php if (empty($cartProducts)) {
    ?> 
    <div class="no-product">
<p class='no-products-message'>No products in the cart.</p>
<a href='./index.php' class='continue-shopping-link'>Continue Shopping</a>
    </div>
         <?php
} else {
        ?>
            <form action="cart.php" method="post">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cartProducts as $product) { ?>
                            <tr>
                                <td class="img">
                                    <a href="product.php">
                                        <img src="imgs/<?php echo $product['img']; ?>" alt="<?php echo $product['name']; ?>">
                                    </a>
                                </td>
                                <td>
                                    <a href="product.php"><?php echo $product['name']; ?></a>
                                    <br>
                                    <a href="cart.php?remove=<?php echo $product['id']; ?>" class="remove">Remove</a>
                                </td>
                                <td class="price">$<?php echo $product['price']; ?></td>
                                <td class="quantity">
                                    <input type="number" name="quantity-<?php echo $product['id']; ?>" value="<?php echo $_SESSION['cart'][$user_id][$product['id']]; ?>" min="1" max="10" placeholder="Quantity" required="">
                                </td>
                                <td class="price">$<?php echo $product['price'] * $_SESSION['cart'][$user_id][$product['id']]; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="subtotal">
                    <span class="text">Total</span>
                    <span class="price">$<?php echo $subtotal; ?></span>
                </div>
                <div class="buttons">
                    <input type="submit" value="Update" name="update" class="btn-1">
                    <input type="submit" value="Place Order" name="placeorder" class="btn-1 btn-gap">
                </div>
            </form>
            <?php
    } ?>
        </div>
    </main>
    <?php include './views/footer.php'; ?>

</body>
</html>
