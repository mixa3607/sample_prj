<?php


namespace Api;


use Model\DbLibrary;

class AuthorsApi extends ApiProt
{
    public function getAction(){
        $genres = DbLibrary::GetAuthors();
        print($this->response(['authors' => $genres]));
    }
}