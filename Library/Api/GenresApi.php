<?php


namespace Api;


use Model\DbLibrary;

class GenresApi extends ApiProt
{
    public function getAction(){
        $genres = DbLibrary::GetGenres();
        print($this->response(['genres' => $genres]));
    }
}