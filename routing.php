<?php
if (file_exists(__DIR__ . '/' . $_SERVER['REQUEST_URI']) && is_file(__DIR__ . '/' . $_SERVER['REQUEST_URI'])) {
    return false; 
} elseif (file_exists(__DIR__ . '/' . $_SERVER['REQUEST_URI'] . ".php")) {
    include( __DIR__ . '/' . $_SERVER['REQUEST_URI'] . ".php" );
}else {
    $_SERVER['SCRIPT_NAME'] = '/index.php'; 
    include_once (__DIR__ . '/index.php');
}
?>