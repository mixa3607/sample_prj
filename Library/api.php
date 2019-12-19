<?php

//use Api\BookApi;
//use Api\BooksApi;
//use Api\GenresApi;

spl_autoload_register(function ($class) {
    include str_replace('\\', '/', $class . '.php');
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
        $api_name = "Api\BookApi"; break;
    case "books":
        $api_name = "Api\BooksApi"; break;
    case "genres":
        $api_name = "Api\GenresApi"; break;
    case "authors":
        $api_name = "Api\AuthorsApi"; break;
    default:
        print(json_encode(Array('code' => 404, 'error' => 'api not found')));
        http_response_code(404);
        return;
}

//$api_name = "Api\" + $api_name;
$api = new $api_name($_SERVER['REQUEST_METHOD'], $args);
$api->run();

return;