<?php


namespace Controller;


class NotFound
{
    public static function ComposePage(){
        http_response_code(404);
        print('Page not found');
    }
}