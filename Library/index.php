<?php
spl_autoload_register(function ($class) {
    include $class . '.php';
});

list($path, $qs) = explode("?", $_SERVER["REQUEST_URI"], 2);
$path_nodes = explode("/", $path);

switch ($path_nodes[1]){
    case '':
        \Controller\Library::ComposePage();
        break;
    default:
        \Controller\NotFound::ComposePage();
        break;
}

