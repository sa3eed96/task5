<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 5</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="public/js/jquery-3.5.1.js"></script>
    <script src="public/js/logout.js" root="<?php echo $_ENV['ROOT'];?>"></script>
</head>
<body class="container">
    <div class="header">
        <h1>Home 
            <button id="logoutBtn" class="btn error">Logout</button>
        </h1>
    </div>
    welcome <?php echo $_SESSION['user']['username']; ?>
</body>
</html>