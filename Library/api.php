<?php

use Api\BookApi;
use Api\BooksApi;

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
        $api = new BookApi($_SERVER['REQUEST_METHOD'], $args); break;

    case "books":
        $api = new BooksApi($_SERVER['REQUEST_METHOD'], $args); break;
    default:
        print(json_encode(Array('code' => 404, 'error' => 'api not found')));
        http_response_code(404);
        return;
}
$api->run();

return;