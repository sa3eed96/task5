<?php 
include __DIR__ . '/../db/connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email= $_POST['email'];
    $password=$_POST['password'];
    $errors = [];

    if (empty($email)) { 
        $errors['email'] = "invalid email or username"; 
    }
    if (empty($password)) { 
        $errors['password']= 'password is required';
    }

    if (count($errors) == 0) {
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = md5($password);

        $query = "SELECT name, username, email, company, location FROM users WHERE (username='$email' or email='$email') AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $user = $results->fetch_assoc();
            $_SESSION['user'] = $user;
            http_response_code(200);
            exit();
        }else {
            $errors['server'] = 'wrong email/username or password';
        }
    }
    http_response_code(400);
    echo json_encode($errors);
}

?>