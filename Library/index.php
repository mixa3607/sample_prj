<?php
spl_autoload_register(function ($class) {
    include $class . '.php';
});

list($path, $qs) = explode("?", $_SERVER["REQUEST_URI"], 2);
//parse_str($qs, $args);
$path_nodes = explode("/", $path);

//if ($path_nodes[1] != "api"){
//    echo json_encode(Array('error' => 'routing error'));
//    http_response_code(500);
//    return;
//}

switch ($path_nodes[1]){
    case '':
    case 'library':
        \Controller\Library::ComposePage();
        break;
    default:
        \Controller\NotFound::ComposePage();
        break;
}

