<?php

use Api\Book;

spl_autoload_register(function ($class) {
    include $class . '.php';
});


list($path, $qs) = explode("?", $_SERVER["REQUEST_URI"], 2);
parse_str($qs, $args);
$path_nodes = explode("/", $path);

if ($path_nodes[1] != "api"){
    echo json_encode(Array('error' => 'routing error'));
    http_response_code(500);
    return;
}

switch ($path_nodes[2]){
    case "book":
        $api = new Book($_SERVER['REQUEST_METHOD'], $args);
        $api->run();
        break;
    default:
        echo json_encode(Array('code' => 404, 'error' => 'api not found'));
        http_response_code(404);
        break;
}

function getArgs(): array {
    parse_str($_SERVER['QUERY_STRING'], $args);
    return $args;
}