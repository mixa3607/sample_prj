<?php


namespace Controller;


class Library
{
    public static function ComposePage(){
        $model = new \Model\Library();
        $view = new \View\Library();
        $view->DrawPage($model->GetBooks());
    }
}