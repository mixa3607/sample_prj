<?php


namespace Controller;


class LibraryController
{
    public static function ComposePage(){
        #$model = new \Model\Library();
        $view = new \View\LibraryView();
        #$view->DrawPage($model->GetBooks());
        $view->DrawPage();
    }
}