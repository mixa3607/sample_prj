<?php


namespace Model;


use ClassDef\Book;

class DbLibrary
{
    //public static function GetBooks($offset = 0, $count = 30){
    //    $db_stmt = Db::GetDb()->prepare("select")
    //}

    public static function AddImage($node_id, $name): ?int{
        $db_stmt = Db::GetDb()->prepare("insert into pictures (storage_id, upload_date, name)   value (?, now(), ?)");
        $db_stmt->bind_param("is", $node_id, $name);
        $db_stmt->execute();
        if ($db_stmt->affected_rows == 1){
            return $db_stmt->insert_id;
        }
        else{
            return null;
        }
    }

    public static function GetImagePath($name): ?string{
        $db_stmt = Db::GetDb()->prepare("SELECT CONCAT(s.path, p.`name`) AS path
FROM pictures p 
INNER JOIN storages s ON p.storage_id = s.id
WHERE p.`name` = ?");
        $db_stmt->bind_param("s", $name);
        $db_stmt->execute();
        if ($db_stmt->num_rows == 1){
            $db_result = $db_stmt->get_result();
            $path = $db_result->fetch_assoc()['path'];
            return $path;
        }
        else{
            return null;
        }
    }

    private static function AssignAuthorToBook($book_id, $author_id): int{
        $db_stmt = Db::GetDb()->prepare("insert into book_authors (book_id, author_id)  value (?, ?)");
        $db_stmt->bind_param("ii", $book_id, $author_id);
        $db_stmt->execute();
        return $db_stmt->insert_id;
    }

    private static function AssignGenreToBook($book_id, $genre_id): int{
        $db_stmt = Db::GetDb()->prepare("insert into book_genres (book_id, genre_id)  value (?, ?)");
        $db_stmt->bind_param("ii", $book_id, $genre_id);
        $db_stmt->execute();
        return $db_stmt->insert_id;
    }

    public static function GetBookGenres($book_id): ?array {
        $db_stmt = Db::GetDb()->prepare("select g.`name`
FROM books b 
INNER JOIN book_genres bg ON b.id = bg.book_id
INNER JOIN genres g ON g.id = bg.genre_id
WHERE b.id = ?");
        $db_stmt->bind_param("i", $book_id);
        $db_stmt->execute();
        if ($db_stmt->affected_rows != 0){
            $db_result = $db_stmt->get_result();
            $rows = $db_result->fetch_all();
            $genres = array_map(function ($arr){return $arr[0];}, $rows);
            return $genres;
        }
        else{
            return null;
        }
    }

    public static function GetBookAuthors($book_id): ?array {
        $db_stmt = Db::GetDb()->prepare("select a.`name`
FROM books b 
INNER JOIN book_authors ba ON b.id = ba.book_id
INNER JOIN authors a ON a.id = ba.author_id
WHERE b.id = ?");
        $db_stmt->bind_param("i", $book_id);
        $db_stmt->execute();
        if ($db_stmt->affected_rows != 0){
            $db_result = $db_stmt->get_result();
            $rows = $db_result->fetch_all();
            $authors = array_map(function ($arr){return $arr[0];}, $rows);
            return $authors;
        }
        else{
            return null;
        }
    }

    public static function GetGenresIds($genres): array {
        $results = Array();
        foreach ($genres as $genre){
            $db_stmt = Db::GetDb()->prepare("select id from genres where `name` = ?");
            $db_stmt->bind_param("s", $genre);
            $db_stmt->execute();
            $db_result = $db_stmt->get_result();
            if ($db_result->num_rows == 1){
                $row = $db_result->fetch_row();
                array_push($results, $row[0]);
            }
            else{
                array_push($results, null);
            }
        }
        return $results;
    }

    public static function GetAuthorsIds($authors): array {
        $results = Array();
        foreach ($authors as $author){
            $db_stmt = Db::GetDb()->prepare("select id from authors where `name` = ?");
            $db_stmt->bind_param("s", $author);
            $db_stmt->execute();
            $db_result = $db_stmt->get_result();
            if ($db_result->num_rows == 1){
                $row = $db_result->fetch_row();
                array_push($results, $row[0]);
            }
            else{
                array_push($results, null);
            }
        }
        return $results;
    }

    public static function AddBook($name, $authors_ids, $genres_ids, $image_id): ?int{
        //insert book
        $db_stmt = Db::GetDb()->prepare("insert into books (`name`, add_date, pic_id) value (?, now(), ?)");
        $db_stmt->bind_param("si", $name, $image_id);
        $db_stmt->execute();

        //if success assign genres and authors to book
        if ($db_stmt->affected_rows == 1){
            $book_id = $db_stmt->insert_id;
            foreach ($authors_ids as $author_id) {
                if ($author_id == null){ continue; }
                static::AssignAuthorToBook($book_id, $author_id);
            }
            foreach ($genres_ids as $genre_id) {
                if ($genre_id == null){ continue; }
                static::AssignGenreToBook($book_id, $genre_id);
            }
            return $book_id;
        }
        else{
            return null;
        }
    }

    public static function GetBooks($offset = 0, $count = PHP_INT_MAX): ?array {
        $db_stmt = Db::GetDb()->prepare("select b.id, b.`name` as title, CONCAT(s.path, p.`name`) as picture
from books b 
LEFT JOIN pictures p ON b.pic_id = p.id
LEFT JOIN storages s ON p.storage_id = s.id
LIMIT ?
OFFSET ?");
        $db_stmt->bind_param("ii", $count, $offset);
        $db_stmt->execute();
        if ($db_stmt->affected_rows != 0){
            $db_result = $db_stmt->get_result();
            $rows = $db_result->fetch_all();
            $books = [];
            foreach ($rows as $row) {
                $book = new Book();
                $book->id = $row[0];
                $book->title = $row[1];
                $book->image = $row[2];
                $book->authors = DbLibrary::GetBookAuthors($book->id);
                $book->genres = DbLibrary::GetBookGenres($book->id);
                array_push($books, $book);
            }
            return $books;
        }
        else{
            return null;
        }
    }
}