<?php
    
    include('./config/config.php');
    session_start();
    print_r($_SESSION);

    $visitor_ip = $_SERVER['REMOTE_ADDR'];
    $visitor_agent = $_SERVER['HTTP_USER_AGENT'];
    // $visitor_referer = $_SERVER['HTTP_REFERER'];
?>