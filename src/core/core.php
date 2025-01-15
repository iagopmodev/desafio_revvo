<?php
    require 'vendor/autoload.php';
    if(!function_exists('handleCors'))
    {
        function handleCors()
        {
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS, POST");
            header("Access-Control-Allow-Headers: Content-Type");

            if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
                // Handle preflight OPTIONS request
                header("HTTP/1.1 200 OK");
                exit;
            }
        }
    }