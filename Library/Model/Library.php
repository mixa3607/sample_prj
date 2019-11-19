<?php


namespace Model;


class Library
{
    public function GetBooks(): array{
        return DbLibrary::GetBooks();
    }
}