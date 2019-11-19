<?php


namespace Api;


use Model\DbLibrary;

class BooksApi extends ApiProt
{
    public function getAction(){
        $books = DbLibrary::GetBooks();
        print($this->response(['books' => $books]));
    }
}