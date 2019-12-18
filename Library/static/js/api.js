class Api {
    static async getBooks() {
        let booksReq = await fetch("/api/books", {method: 'GET'});
        let booksJson = await booksReq.json();
        return booksJson;
    }

    static async deleteBook(bookId) {
        let booksReq = await fetch("/api/book?id=" + bookId, {method: 'DELETE'});
        let booksJson = await booksReq.json();
        return booksJson;
    }

    static async addBook(book){
        let url = `/api/book?title=${encodeURIComponent(book.title)}&pub_date=${book.pubDate}`;
        book.authors.forEach(author => url += "&authors[]=" + encodeURIComponent(author));
        book.genres.forEach(genre => url += "&genres[]=" + encodeURIComponent(genre));
        let resp = await fetch(url, {method: 'POST'});
        //if (resp.code === 200){
            return await resp.json();
        //}
        //else{
        //    throw new Error("Request error");
        //}
    }

    static async changeBookTitle(bookId, title) {
        title = encodeURIComponent(title);
        let req = await fetch(`/api/book?id=${bookId}&title=${title}`, {method: 'PUT'});
        let respJson = await req.json();
        return respJson;
    }

    static async changeBookPubDate(bookId, pubDate) {
        let req = await fetch(`/api/book?id=${bookId}&pub_date=${pubDate}`, {method: 'PUT'});
        let respJson = await req.json();
        return respJson;
    }

    static async changeBookAuthors(bookId, authors) {
        let url = `/api/book?id=${bookId}`;
        authors.forEach(author => url += "&authors[]=" + encodeURIComponent(author));

        let req = await fetch(url, {method: 'PUT'});
        let respJson = await req.json();
        return respJson;
    }

    static async changeBookGenres(bookId, genres) {
        let url = `/api/book?id=${bookId}`;
        genres.forEach(genre => url += "&genres[]=" + encodeURIComponent(genre));

        let req = await fetch(url, {method: 'PUT'});
        let respJson = await req.json();
        return respJson;
    }

    static async getAuthors() {
        let req = await fetch("/api/authors", {method: 'GET'});
        let respJson = await req.json();
        return respJson;
    }

    static async getGenres() {
        let req = await fetch("/api/genres", {method: 'GET'});
        let respJson = await req.json();
        return respJson;
    }
}