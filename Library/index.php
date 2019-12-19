<?php
spl_autoload_register(function ($class) {
    include $class . '.php';
});

list($path, $qs) = explode("?", $_SERVER["REQUEST_URI"], 2);
//$path_nodes = explode("/", $path);

switch ($path){
    case '/':
        \Controller\LibraryController::ComposePage();
        break;
    case '404':
    default:
        \Controller\NotFound::ComposePage();
        break;
}

