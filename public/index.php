<?php

$page = $_GET['page'] ?? 'home';

switch ($page) {  
    case 'cursos':  
        include '../src/views/cursos.php';  
        break;  
    case 'home':  
    default:  
        include '../src/views/home.php';  
        break;  
}