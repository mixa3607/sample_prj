<?php
namespace Api;


abstract class ApiProt
{
    protected $action;
    protected $args;

    public function __construct($method, $args) {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");

        $this->action = $this->getActionName($method);
        $this->args = $args;
    }

    public function run(){
        //$action = $this->getActionName();
        if ($this->action != null){
            $this->{$this->action}();
        }
        else{
            $str = $this->returnError(405, 405);
            print($str);
        }
    }

    protected function getActionName(string $method) : ?string
    {
        $methods = [
            'GET' => 'getAction',
            'POST' => 'createAction',
            'PUT' => 'updateAction',
            'DELETE' => 'deleteAction'
        ];
        $action = $methods[$method];
        if ($action && method_exists($this, $action)){
            return $action;
        }
        else{
            return null;
        }
    }

    protected function response($data, $status = 500) {
        http_response_code($status);
        //$data['code'] = $status;
        return json_encode($data);
    }

    protected function returnError(int $api_err_code, int $http_err_code, string $description = null){
        http_response_code($http_err_code);
        $err = ['code' => $api_err_code,
            'code_name' => $this->getApiCodeStr($api_err_code),
            'error_description' => $description];
        return json_encode($err);
    }

    protected function getApiCodeStr(int $code): string {
        $status = [200 => "OK",
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            449 => 'Retry With',
            500 => 'Internal Server Error',
            800 => 'Element Not Found'];
        return ($status[$code])?$status[$code]:$status[500];
    }

    private function getHttpCodeStr($code) {
        $status = array(
            200 => 'OK',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        );
        return ($status[$code])?$status[$code]:$status[500];
    }
}