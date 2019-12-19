<?php


namespace Api;


use Model\DbLibrary;

class BookApi extends ApiProt
{
    public function getAction(){
        $book_id = $this->args['id'];
        if ($book_id != null){
            $book = DbLibrary::GetBook($book_id);
            $response = $this->response($book, 200);
        }
        else{
            $response = $this->returnError(449, 400, 'book id is requires');//response(['error' => 'book id is requires'], 404);
        }
        print($response);
        return;
    }

    public function createAction(){
        $title = $this->args['title'];
        $image = $this->args['image'];
        $authors = $this->args['authors'];
        $genres = $this->args['genres'];
        $pub_date = $this->args['pub_date'];
        //$authors = explode(',', $this->args['authors']);
        //$genres = explode(',', $this->args['genres']);

        if (!$image){
            $image = 'default.png';
        }

        if (!$pub_date){
            $response = $this->returnError(449, 400, 'publish date is required');
            print($response);
            return;
        }
        elseif (strtotime($pub_date) > time()){
            $response = $this->returnError(449, 400, 'publish date is more then currrent');
            print($response);
            return;
        }

        if (!$title){
            $response = $this->returnError(449, 400, 'title is required');
            print($response);
            return;
        }
        if (!($authors && (count($authors) != 0))){
            $response = $this->returnError(449, 400, 'authors is required');
            print($response);
            return;
        }
        if (!($genres && count($genres) != 0)){
            $response = $this->returnError(449, 400, 'genres is required');
            print($response);
            return;
        }

        $authors_ids = DbLibrary::GetAuthorsIds($authors);
        for ($i = 0; $i < count($authors); $i++){
            if (!$authors_ids[$i]){
                $response = $this->returnError(800, 404, 'Author ' . $authors[$i] . ' not found');
                print($response);
                return;
            }
        }

        $genres_ids = DbLibrary::GetGenresIds($genres);
        for ($i = 0; $i < count($genres); $i++){
            if (!$genres_ids[$i]){
                $response = $this->returnError(800, 404, 'Genre ' . $genres[$i] . ' not found');
                print($response);
                return;
            }
        }

        $image_id = DbLibrary::GetImageIdByName($image);
        if (!$image_id){
            $response = $this->returnError(800, 404, 'Image ' . $image . ' not found');
            print($response);
            return;
        }

        $book_id = DbLibrary::AddBook($title, $authors_ids, $genres_ids, $image_id, $pub_date);
        if (!$book_id){
            $response = $this->returnError(500, 404, 'Error adding book');
            print($response);
            return;
        }
        else{
            $response = $this->response(['book_id' => $book_id]);
            print($response);
            return;
        }
    }

    public function deleteAction(){
        $book_id = $this->args['id'];
        if ($book_id != null){
            if (DbLibrary::DeleteBook($book_id)){
                $response = $this->response(['book_id' => $book_id], 200);
            }
            else{
                $response = $this->returnError(500, 500, 'Can not delete book with id ' . $book_id);
            }
        }
        else{
            $response = $this->returnError(449, 400, 'Book id is required');//response(['error' => 'book id is requires'], 404);
        }
        print($response);
        return;
    }

    public function updateAction(){
        $book_id = intval($this->args['id']);
        $title = $this->args['title'];
        $image = $this->args['image'];
        $authors = $this->args['authors'];
        $genres = $this->args['genres'];
        $pub_date = $this->args['pub_date'];

        if ($book_id == null || $book_id == 0){
            $response = $this->returnError(500, 500, 'Book id is required');
            print($response);
            return;
        }

        if ($pub_date){
            if (strtotime($pub_date) > time()){
                $response = $this->returnError(449, 400, 'publish date is more then currrent');
            }
            elseif (DbLibrary::UpdateBookPublishDate($book_id, $pub_date)){
                $response = $this->response(['book_id' => $book_id, 'pub_date' => $pub_date], 200);
            }
            else{
                if (DbLibrary::GetBook($book_id)->pubDate == $pub_date){
                    $response = $this->returnError(801, 500, 'Already set to eq value');
                }
                else{
                    $response = $this->returnError(500, 500, 'Failing update book publish date');
                }
            }
            print($response);
            return;
        }

        if ($title){
            if (DbLibrary::UpdateBookTitle($book_id, $title)){
                $response = $this->response(['book_id' => $book_id, 'title' => $title], 200);
            }
            else{
                if (DbLibrary::GetBook($book_id)->title == $title){
                    $response = $this->returnError(801, 500, 'Already set to eq value');
                }
                else{
                    $response = $this->returnError(500, 500, 'Failing update book title');
                }
            }
            print($response);
            return;
        }

        if ($image && DbLibrary::UpdateBookImage($book_id, $image)){
                $response = $this->response(['book_id' => $book_id, 'image' => $image], 200);
                print($response);
                return;
        }

        if ($genres && count($genres) != 0){
            $genres = array_values(array_unique($genres, SORT_STRING));
            $genres_ids = DbLibrary::GetGenresIds($genres);
            for ($i = 0; $i < count($genres); $i++){
                if (!$genres_ids[$i]){
                    $response = $this->returnError(800, 404, 'Genre ' . $genres[$i] . ' not found');
                    print($response);
                    return;
                }
            }
            DbLibrary::FlushBookGenres($book_id);
            //if (!DbLibrary::FlushBookGenres($book_id)){
            //    $response = $this->returnError(800, 404, 'Update book error. Maybe book not exist?');
            //    print($response);
            //    return;
            //}
            foreach ($genres_ids as $genre_id){
                DbLibrary::AssignGenreToBook($book_id, $genre_id);
            }
            $response = $this->response(['book_id' => $book_id, 'genres' => $genres], 200);
            print($response);
            return;
        }

        if ($authors && count($authors) != 0){
            $authors = array_values(array_unique($authors, SORT_STRING));
            $authors_ids = DbLibrary::GetAuthorsIds($authors);
            for ($i = 0; $i < count($authors); $i++){
                if (!$authors_ids[$i]){
                    $response = $this->returnError(800, 404, 'Author ' . $authors[$i] . ' not found');
                    print($response);
                    return;
                }
            }
            DbLibrary::FlushBookAuthors($book_id);
            //if (!DbLibrary::FlushBookAuthors($book_id)){
            //    $response = $this->returnError(800, 404, 'Update book error. Maybe book not exist?');
            //    print($response);
            //    return;
            //}
            foreach ($authors_ids as $author_id){
                DbLibrary::AssignAuthorToBook($book_id, $author_id);
            }
            $response = $this->response(['book_id' => $book_id, 'authors' => $authors], 200);
            print($response);
            return;
        }

        $response = $this->returnError(449, 500, 'Need param for update');
        print($response);
        return;

    }
}