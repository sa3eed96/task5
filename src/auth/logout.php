<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        session_destroy();
        http_response_code(200);
    }
?>