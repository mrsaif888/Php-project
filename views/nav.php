<?php

if (isset($_SESSION['login_msg']) && $_SESSION['login_msg'] == 1) {
    echo '<script>
                    toastr.success(`Login successful.`);
                  </script>';
    $_SESSION['login_msg'] = 0;
}
?>
<header>
        <div class="content-wrapper">
            <h1>INSTANT CART</h1>
            <nav>
                <a href="<?php echo $proj_root_url; ?>/index.php">Home</a>
                <a href="<?php echo $proj_root_url; ?>/products.php">Products</a>
                <?php if (isset($_SESSION['name'])) {
    ?>
                 <a href="<?php echo $proj_root_url; ?>/logout.php">logout</a>
                 <a href="#"><?php echo $_SESSION['name']; ?></a>
                 <?php
} else {?>
                <a href="<?php echo $proj_root_url; ?>/myaccount.php">Login</a>
                <?php } ?>
            </nav>
            <div class="link-icons">
                <div class="search">
                    <i class="fas fa-search" title="Search"></i>
                    <input type="text" placeholder="Search...">
                </div>
                <a href="cart.php">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <a class="responsive-toggle" href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
        </div>
    </header>