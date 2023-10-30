<?php

// Update the details below with your MySQL details
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'instant_cart';

// Create a connection to the database
$connection = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// Check the connection
if (!$connection) {
    exit('Failed to connect to the database: '.mysqli_connect_error());
}

// Now you can use the $connection variable to perform database operations.

// Close the connection when you're done
mysqli_close($connection);
