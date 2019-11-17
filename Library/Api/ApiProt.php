<?php
namespace Api;


abstract class ApiProt
{
    protected $method;
    protected $args;

    public function __construct($method, $args) {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");

        $this->method = $method;
        $this->args = $args;
    }

    public function run(){
        $action = $this->getActionName();
        if ($action != null){
            $this->$action();
        }
        else{
            print($this->response(Array('error' => "Method not allowed"), 405));
        }
    }

    protected function getActionName() : ?string
    {
        $method = $this->method;
        switch ($method) {
            case 'GET':
                return 'getAction';
                break;
            case 'POST':
                return 'createAction';
                break;
            case 'PUT':
                return 'updateAction';
                break;
            case 'DELETE':
                return 'deleteAction';
                break;
            default:
                return null;
        }
    }

    protected function response($data, $status = 500) {
        http_response_code($status);
        //header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));
        return json_encode($data);
    }

    private function requestStatus($code) {
        $status = array(
            200 => 'OK',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        );
        return ($status[$code])?$status[$code]:$status[500];
    }
}