<?php 
include __DIR__ . '/../db/connect.php';
session_start();

if(!isset($_SESSION['newUser'])){
    http_response_code(400);
    echo 'redirect';
    exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $password=$_POST['password'];
    $errors = [];
    if (empty($password) || strlen($password) < 8) { 
        $errors['password']= 'password must be atleast 8 characters';
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $username= $_SESSION['user']['username'];
        $email = $_SESSION['user']['email'];
        $name = $_SESSION['user']['name'];
        $location = $_SESSION['user']['location'];
        $company = $_SESSION['user']['company'];

        $query = "INSERT INTO users (username, email, password, name, location, company) 
            VALUES('$username', '$email', '$password', '$name', '$location', '$company')";
        mysqli_query($db, $query);
        unset($_SESSION['newUser']);
        http_response_code(201);
        exit();
    }
    http_response_code(400);
    echo json_encode($errors);
    exit();
}

?>