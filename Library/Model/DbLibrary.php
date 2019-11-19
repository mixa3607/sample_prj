<?php


namespace Model;


use ClassDef\Book;

class DbLibrary
{
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

    public static function GetImageIdByName(string $name): ?int{
        $db_stmt = Db::GetDb()->prepare("SELECT id
FROM pictures
WHERE `name` = ?");
        $db_stmt->bind_param("s", $name);
        $db_stmt->execute();
        $db_result = $db_stmt->get_result();
        if ($db_result->num_rows == 1){
            $id = $db_result->fetch_row()[0];
            return $id;
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

    public static function AssignAuthorToBook($book_id, $author_id): int{
        $db_stmt = Db::GetDb()->prepare("insert into book_authors (book_id, author_id)  value (?, ?)");
        $db_stmt->bind_param("ii", $book_id, $author_id);
        $db_stmt->execute();
        return $db_stmt->insert_id;
    }

    public static function AssignGenreToBook($book_id, $genre_id): int{
        $db_stmt = Db::GetDb()->prepare("insert into book_genres (book_id, genre_id)  value (?, ?)");
        $db_stmt->bind_param("ii", $book_id, $genre_id);
        $db_stmt->execute();
        return $db_stmt->insert_id;
    }

    public static function FlushBookAuthors($book_id): ?int{
        $db_stmt = Db::GetDb()->prepare("DELETE FROM book_authors WHERE book_id = ?");
        $db_stmt->bind_param("i", $book_id);
        $db_stmt->execute();
        return $db_stmt->affected_rows != 0?$db_stmt->affected_rows:null;
    }

    public static function FlushBookGenres($book_id): ?int{
        $db_stmt = Db::GetDb()->prepare("DELETE FROM book_genres WHERE book_id = ?");
        $db_stmt->bind_param("i", $book_id);
        $db_stmt->execute();
        return $db_stmt->affected_rows != 0?$db_stmt->affected_rows:null;
    }

    private static function DeassignAuthorToBook($book_id, $author_id): bool{
        $db_stmt = Db::GetDb()->prepare("DELETE FROM book_authors WHERE book_id = ? AND author_id = ?");
        $db_stmt->bind_param("ii", $book_id, $author_id);
        $db_stmt->execute();
        return $db_stmt->affected_rows != 0;
    }

    private static function DeassignGenreToBook($book_id, $genre_id): bool{
        $db_stmt = Db::GetDb()->prepare("DELETE FROM book_genres WHERE book_id = ? AND genre_id = ?");
        $db_stmt->bind_param("ii", $book_id, $genre_id);
        $db_stmt->execute();
        //$db_result = $db_stmt->get_result();
        return $db_stmt->affected_rows != 0;
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

    public static function AddBook($name, $authors_ids, $genres_ids, $image_id, $pub_date): ?int{
        //insert book
        $db_stmt = Db::GetDb()->prepare("insert into books (`name`, add_date, pic_id, publish_date) value (?, now(), ?, ?)");
        $db_stmt->bind_param("sis", $name, $image_id, $pub_date);
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


    public static function GetBook($id): Book {
        $db_stmt = Db::GetDb()->prepare("select b.id, b.`name` as title, CONCAT(s.path, p.`name`) as picture
from books b 
LEFT JOIN pictures p ON b.pic_id = p.id
LEFT JOIN storages s ON p.storage_id = s.id
where b.id = ?");
        $db_stmt->bind_param("i", $id);
        $db_stmt->execute();
        if ($db_stmt->affected_rows != 0){
            $db_result = $db_stmt->get_result();
            $row = $db_result->fetch_row();
            $book = new Book();
            $book->id = $row[0];
            $book->title = $row[1];
            $book->image = $row[2];
            $book->authors = DbLibrary::GetBookAuthors($book->id);
            $book->genres = DbLibrary::GetBookGenres($book->id);
            return $book;
        }
        else{
            return null;
        }
    }

    public static function DeleteBook(int $book_id): bool{
        $db_stmt = Db::GetDb()->prepare("DELETE FROM books where id = ?");
        $db_stmt->bind_param("i", $book_id);
        $db_stmt->execute();
        return $db_stmt->affected_rows != 0;
    }

    public static function UpdateBookTitle(int $book_id, string $name): bool{
        $db_stmt = Db::GetDb()->prepare("UPDATE books SET `name`=? WHERE id = ?");
        $db_stmt->bind_param("si", $name, $book_id);
        $db_stmt->execute();
        return $db_stmt->affected_rows != 0;
    }

    public static function UpdateBookImage(int $book_id, string $image_id): bool{
        $db_stmt = Db::GetDb()->prepare("UPDATE books SET image=? WHERE id = ?");
        $db_stmt->bind_param("ii", $image_id, $book_id);
        $db_stmt->execute();
        return $db_stmt->affected_rows != 0;
    }

    public static function UpdateBookPublishDate(int $book_id, string $pub_date): bool{
        $db_stmt = Db::GetDb()->prepare("UPDATE books SET publish_date= ? WHERE id = ?");
        $db_stmt->bind_param("si", $pub_date, $book_id);
        $db_stmt->execute();
        return $db_stmt->affected_rows != 0;
    }



}