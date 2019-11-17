<?php


namespace Api;


use Model\DbLibrary;

class BookApi extends ApiProt
{
    public function getAction(){
        $books = DbLibrary::GetBooks();
        //DbLibrary::AddBook("naa", [2,5,10], [4,8,10], 1);
        //$genres = DbLibrary::GetBookGenres(10);
        //$authors = DbLibrary::GetBookAuthors(10);
        //$ids = DbLibrary::GetGenresIds(Array("Красота и здоровье", "Исторический роман", "", null));
        print($this->response(array_merge(['books' => $books], $this->args), 200));
    }
}