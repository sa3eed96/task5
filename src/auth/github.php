<?php
    include __DIR__ . '/../db/connect.php';

    if(isset($_GET['code']) && isset($_GET['state'])){

        if($_GET['state'] != $_SESSION['state']){
            echo 'hehehe';
            die();
        }

        $data = http_build_query([
            'client_id' => $_ENV['GITHUB_CLIENT_ID'],
            'client_secret' => $_ENV['GITHUB_CLIENT_SECRET'],
            'state' => $_SESSION['state'],
            'code' => $_GET['code'],
        ]);
        $context = stream_context_create([
            'http'=>[
                'method'=>'POST',
                'header'=> [
                    'Content-Type: application/x-www-form-urlencoded',
                    "Content-Length: ".strlen($data),
                    'Accept: application/json',
                    'User-Agent: Task5',
                ],
                'content'=>$data,
            ]
        ]);
        $result = json_decode(file_get_contents('https://github.com/login/oauth/access_token', false, $context), true);
        if($result == false){
            header('location:'.$_ENV['ROOT'].'login.php?error=failed to register');
            exit();
        }
        
        $context = stream_context_create([
            'http'=>[
                'method'=>'GET',
                'header'=>[
                    'Accept: application/json',
                    'Authorization: Bearer '.$result['access_token'],
                    'User-Agent: Task5',
                ],
            ]
        ]);
        $result = json_decode(file_get_contents('https://api.github.com/user', false, $context), true);
        if($result == false){
            header('location:'.$_ENV['ROOT'].'login.php?error=failed to register');
            exit();
        }

        $username= $result['login'];
        $user_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
        $r = mysqli_query($db, $user_query);
        $user = mysqli_fetch_assoc($r);

        if ($user) {
            header('location:'.$_ENV['ROOT']."login.php?error=username $username is already registered");
            exit();
        }else{
            $_SESSION['user'] =[ 
                'username' => $result['login'],
                'email' => $result['email'],
                'name' => $result['name'],
                'company' => $result['company'],
                'location' => $result['location'],
            ];
            $_SESSION['newUser'] = true;
            unset($_SESSION['state']);
            header('location:'.$_ENV['ROOT'].'password.php');
            exit();
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $_SESSION['state'] = bin2hex(random_bytes(32));
        $queryString = http_build_query([
            'client_id' => $_ENV['GITHUB_CLIENT_ID'],
            'scope' => 'user',
            'state' => $_SESSION['state'],
        ]);
        echo 'https://github.com/login/oauth/authorize?'.$queryString;
        die();
    }
?>