<html lang="en">
<head>
    
    <title>My Account</title>
    <?php  include('./views/header.php')?>
</head>

<body>
<?php include ('./views/nav.php')?>
    <main>
        <div class="myaccount content-wrapper">
            <div class="login-register">
                <div class="login">
                    <h1>Login</h1>
                    <p>
                        <u>Admin Credentials</u><br>
                        Email: admin@website.com<br>
                        Password: admin
                    </p>
                    <form action="" method="post">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" placeholder="john@example.com"
                            value="admin@website.com" required="" class="form-field">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" value="admin"
                            required="" class="form-field">
                        <input name="login" type="submit" value="Login" class="btn">
                    </form>
                </div>
                <div class="register">
                    <h1>Register</h1>
                    <form action="" method="post">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" placeholder="john@example.com" required=""
                            class="form-field">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" required=""
                            class="form-field">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password"
                            required="" class="form-field">
                        <input name="register" type="submit" value="Register" class="btn">
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include('./views/footer.php')?>

</body>

</html>