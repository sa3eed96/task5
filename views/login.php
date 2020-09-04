<html>
    <head>
      <title>Task 5</title>
      <link rel="stylesheet" type="text/css" href="public/css/style.css">
      <script src="public/js/jquery-3.5.1.js"></script>
      <script src="public/js/login.js" root="<?php echo $_ENV['ROOT'];?>"></script>
      <script src="public/js/github.js" root="<?php echo $_ENV['ROOT'];?>"></script>
    </head>
  <body class="container">
    <div class="header">
      <h1>Login</h2>
    </div>
    
    <form id="loginForm">
      <div class="input">
        <label for="email">email or username</label>
        <input type="text" name="email" id="email">
        <p><small id="emailError" class="error"></small></p>
      </div>
      <div class="input">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <p><small id="passwordError" class="error"></small></p>
      </div>
      <p><small id="serverError" class="error"></small></p>
      <div class="input">
        <button class="btn" type="submit">Login</button>
      </div>
    </form>

    <?php if(isset($_GET['error'])):?>
      <p id="msg" class="error"><?php echo $_GET['error'] ?></p>
    <?php endif; ?>
    
    <button id="gitauthBtn" class="github">Register with Github</button>
  </body>
</html>