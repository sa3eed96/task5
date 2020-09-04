<?php 

  if (!isset($_SESSION['user'])) {
    http_response_code(401);
  	header('location:'.$_ENV['ROOT'].'login.php');
  }

?>