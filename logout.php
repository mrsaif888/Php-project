<?php

session_start();
if (isset($_SESSION['email'])) {
    // code...
    session_destroy();
    header('location:index.php');
} else {
    session_destroy();
    header('location:index.php');
}
