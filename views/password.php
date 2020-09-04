<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <script src="public/js/jquery-3.5.1.js"></script>
        <script src="public/js/password.js" root="<?php echo $_ENV['ROOT'];?>"></script>
        <title>Task 5</title>
    </head>
    <body class="container">
        <div class="header">
            <h1>New User</h2>
        </div>
        <form id="passwordForm">
            <div class="input">
                <label for="password">
                    <h4>Enter password for your account</h4>
                </label>
                <input type="password" id="password" name="password">
                <p><small class="error" id="passwordError"></small></p>
            </div>
            <button class="btn success" type="submit">Save</button>
        </form>
    </body>
</html>