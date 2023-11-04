<?php
session_start();
require_once './database/connection.php';

?>
<html>

<head>
    
    <title>Cart</title>
    <?php include './views/header.php'; ?>
</head>

<body>
<?php include './views/nav.php'; ?>
    <main>
        <div class="cart content-wrapper">
            <h1>Shopping Cart</h1>
            <form action="cart.php" method="post">
                <table>
                    <thead>
                        <tr>
                            <td colspan="2">Product</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="img">
                                <a href="product.php">
                                    <img src="imgs/watch.jpg" width="50" height="50" alt="Smart Watch">
                                </a>
                            </td>
                            <td>
                                <a href="product.php">Smart Watch</a>
                                <br>
                                <a href="cart.php&amp;remove=1" class="remove">Remove</a>
                            </td>
                            <td class="price">$29.99</td>
                            <td class="quantity">
                                <input type="number" name="quantity-1" value="4" min="1" max="10" placeholder="Quantity"
                                    required="">
                            </td>
                            <td class="price">$119.96</td>
                        </tr>
                        <tr>
                            <td class="img">
                                <a href="product.php">
                                    <img src="imgs/wallet.jpg" width="50" height="50" alt="Wallet">
                                </a>
                            </td>
                            <td>
                                <a href="product.php">Wallet</a>
                                <br>
                                <a href="cart.php&amp;remove=2" class="remove">Remove</a>
                            </td>
                            <td class="price">$14.99</td>
                            <td class="quantity">
                                <input type="number" name="quantity-2" value="1" min="1" max="34" placeholder="Quantity"
                                    required="">
                            </td>
                            <td class="price">$14.99</td>
                        </tr>
                    </tbody>
                </table>
                <div class="subtotal">
                    <span class="text">Subtotal</span>
                    <span class="price">$134.95</span>
                </div>
                <div class="buttons">
                    <input type="submit" value="Update" name="update" class="btn-1">
                    <input type="submit" value="Place Order" name="placeorder" class="btn-1 btn-gap">
                </div>
            </form>
        </div>

    </main>
    <?php include './views/footer.php'; ?>

</body>

</html>