<?php


namespace Model;


class LibraryModel
{
    public function GetBooks(): array{
        return DbLibrary::GetBooks();
    }
}