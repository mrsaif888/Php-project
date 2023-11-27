<?php
require_once './database/connection.php';
// This is a basic error page example.
// You might want to customize it further based on your needs.

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #e44d26;
        }

        p {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <h1>Error</h1>
    <p>Oops! Something went wrong.</p>
    <p><a href="<?php echo $proj_root_url; ?>/index.php">Go back to the home page</a></p>
</body>

</html>
