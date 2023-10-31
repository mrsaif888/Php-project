<?php
session_start();
require_once ('./database/connection.php');

?>
<html lang="en">
<head>
    
    <title>My Account</title>
    <?php include './views/header.php'; ?>
</head>

<body>
<?php include './views/nav.php'; ?>

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
                        <input type="email" name="register_email" id="email" placeholder="john@example.com" required=""
                            class="form-field">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="register_password" id="password" placeholder="Password" required=""
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
    <?php include './views/footer.php'; ?>

</body>

</html>

<?php //  Register user

// Check if the "register" button was clicked.
if (isset($_POST['register'])) {
    $email = $_POST['register_email'];
    $password = $_POST['register_password'];
    $cpassword = $_POST['cpassword'];

    // Check if the passwords match
    if ($password == $cpassword) {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Prepare and execute the SQL query to insert the user
        $sql = "INSERT INTO users (`email`, `password`) VALUES ('$email', '$password')";

        if (mysqli_query($connection, $sql)) {
            echo "<script>
                    toastr.success(`Registration was successful.`);
                   </script>";
        } else {
              echo "<script>
                    toastr.error(`An error occurred during form submission.`);
                   </script>";
         }
    } else {
         echo "<script>
                    toastr.error(`Passwords do not match.`);
                   </script>";
    }
    mysqli_close($connection);
}
    

 // Change this to the page you want to redirect to.

?>