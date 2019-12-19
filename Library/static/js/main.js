function addFuncToClick(classQuery, functionName){
    document.querySelectorAll(classQuery).forEach(function (element) {
        element.addEventListener("click", functionName);
    });
}

class HtmlHelpers{
    static addAuthorOrGenre(container, isAuthor, value = "", isP = false){
        let listName = "genres-List";
        let containerClassName = "genre-container";
        if (isAuthor){
            listName = "authors-list";
            containerClassName = "author-container";
        }
        let div = document.createElement("div");
        div.className = `flex-container ${containerClassName}`;

        let button = document.createElement("button");
        button.textContent = "del";
        button.className = "butt-del";

        div.appendChild(button);
        if (isP){
            let p = document.createElement("p");
            p.className = "name";
            p.textContent = value;
            div.appendChild(p);
        }
        else {
            let input = document.createElement("input");
            input.type = "text";
            input.setAttribute("list", listName);
            input.className = "name";
            input.value = value;
            div.appendChild(input);
        }
        container.appendChild(div);
    }

    /*static addGenre(container){
        let div = "<div class=\"flex-container genre-container\">\n" +
            "<button class=\"butt-del\">del</button>\n" +
            "<input type='text' list='genres-list' class=\"name\"/></div>";
        container.insertAdjacentHTML('beforeend', div);
    }*/

    static addBookToList(book) {
        let genresDivs = [];
        let authorsDivs = [];
        book.genres.forEach(genre => genresDivs.push(`<div class="flex-container genre-container">
<button class="butt-del">del</button>
<p class="name">${genre}</p></div>`));
        book.authors.forEach(author => authorsDivs.push(`<div class="flex-container author-container">
<button class="butt-del">del</button>
<p class="name">${author}</p></div>`));

        let titleCell = `<td class="title-cell">
        <div class="flex-container book-title-container">
            <button class="butt-edit">edit</button>
            <p class="book-title">${book.title}</p>
        </div>
    </td>`;
        let pubDateCell = `<td class="publish-date-cell">
        <div class="flex-container pub-date-container">
            <button class="butt-edit">edit</button>
            <p class="pub-date">${book.pubDate}</p>
        </div>
    </td>`;
        let authorsCell = `<td class="authors-cell">
        <div class="flex-container flex-col authors-container">
            ${authorsDivs.join('\n')}
            <div class="m-buttons">
                <button class="butt-add">add</button>
                <button hidden class="butt-apply">apply</button>
            </div>
        </div>
    </td>`;
        let genresCell = `<td class="genres-cell">
        <div class="flex-container flex-col genres-container">
            ${genresDivs.join('\n')}
            <div class="m-buttons">
                <button class="butt-add">add</button>
                <button hidden class="butt-apply">apply</button>
            </div>
        </div>
    </td>`;
        let delCell = `<td class="del-cell">
                        <button class="butt-del">Del</button>
                    </td>`;
        let row = `<tr class="book-row" book="${book.id}">` + titleCell + authorsCell + genresCell + pubDateCell + delCell;

        let booksTable = document.querySelector("#books-table > tbody");
        booksTable.insertAdjacentHTML('beforeend', row);
        ClickHandlers.addHandlers();
    }

    static addDatalist(values, elemId){
        let content = document.querySelector(".content");
        let datalist = document.createElement("datalist");
        datalist.id = elemId;
        values.forEach(value => {
            let option = document.createElement("option");
            option.value = value;
            datalist.appendChild(option);
        });
        content.appendChild(datalist);
    }
}

class ClickHandlers{
    static addHandlers(){
        addFuncToClick("#books-table .authors-cell", ClickHandlers.authorsClickHandler);
        addFuncToClick("#books-table .genres-cell", ClickHandlers.genresClickHandler);
        addFuncToClick("#books-table .pub-date-container", ClickHandlers.pubDateClickHandler);
        addFuncToClick("#books-table .book-title-container", ClickHandlers.titleClickHandler);
        addFuncToClick("#books-table .del-cell", ClickHandlers.delBookClickHandler);

        addFuncToClick(".new-book .authors", ClickHandlers.authorsClickHandler);
        addFuncToClick(".new-book .genres", ClickHandlers.genresClickHandler);
        addFuncToClick(".new-book", ClickHandlers.addBookClickHandler);
    }

    static async authorsClickHandler(sender){
        let applyButt = sender.currentTarget.querySelector(".butt-apply");
        let hideApplyButt = false;
        let currentTarget = sender.currentTarget;
        //del
        if (sender.target.matches('.author-container > .butt-del')){
            sender.target.parentElement.remove();
        }
        //add
        else if (sender.target.matches('.authors-container > .m-buttons > .butt-add')){
            HtmlHelpers.addAuthorOrGenre(currentTarget.querySelector(".authors-container"), true);
        }
        //apply
        else if (sender.target.matches('.authors-container > .m-buttons > .butt-apply')){
            let authors = [];
            let inputs = currentTarget.querySelectorAll(".author-container > input[type=text]");
            let ps = currentTarget.querySelectorAll(".author-container > p.name");
            authors = authors.concat(getElemText(inputs));
            authors = authors.concat(getElemText(ps));
            let bookId = getBookId(currentTarget);

            let result = await Api.changeBookAuthors(bookId, authors);
            if (result.code == 200){
                currentTarget.querySelectorAll(".author-container").forEach(ac => ac.remove());
                result.authors.forEach( author => HtmlHelpers.addAuthorOrGenre(currentTarget.querySelector(".authors-container"), true, author, true));
                hideApplyButt = true;
            }
            else{
                alert(`Error: ${result.code}. ${result.error_description}`);
            }
        }
        else{
            return;
        }
        if (applyButt != null){
            applyButt.hidden = hideApplyButt;
        }
    }

    static async genresClickHandler(sender){
        let hideApplyButt = false;
        let currentTarget = sender.currentTarget;
        let applyButt = sender.currentTarget.querySelector(".butt-apply");

        if (sender.target.matches('.genre-container > .butt-del')){
            sender.target.parentElement.remove();
        }
        else if (sender.target.matches('.genres-container > .m-buttons > .butt-add')){
            HtmlHelpers.addAuthorOrGenre(currentTarget.querySelector(".genres-container"), false);
        }
        else if (sender.target.matches('.genres-container > .m-buttons > .butt-apply')){
            let genres = [];
            let inputs = currentTarget.querySelectorAll(".genre-container > input[type=text]");
            let ps = currentTarget.querySelectorAll(".genre-container > p.name");
            genres = genres.concat(getElemText(inputs));
            genres = genres.concat(getElemText(ps));

            let bookId = getBookId(currentTarget);
            let result = await Api.changeBookGenres(bookId, genres);
            if (result.code == 200){
                currentTarget.querySelectorAll(".genre-container").forEach(gc => gc.remove());
                result.genres.forEach( author => HtmlHelpers.addAuthorOrGenre(currentTarget.querySelector(".genres-container"), false, author, true));
                hideApplyButt = true;
            }
            else{
                alert(`Error: ${result.code}. ${result.error_description}`);
            }
        }
        else{
            return;
        }
        if (applyButt != null){
            applyButt.hidden = hideApplyButt;
        }
    }

    static async pubDateClickHandler(sender){
        let currentTarget = sender.currentTarget;
        if (sender.target.matches(".butt-edit")){
            let pubDateElem = currentTarget.querySelector(".pub-date");
            if (pubDateElem.tagName === "P"){
                let inputElem = document.createElement("input");
                inputElem.type = "date";
                inputElem.className = "pub-date";
                inputElem.value = pubDateElem.textContent;
                currentTarget.replaceChild(inputElem, pubDateElem);
            }
            else{
                let result = await Api.changeBookPubDate(getBookId(sender.target), pubDateElem.value);
                if (result.code == 200 || result.code == 801){
                    let pElem = document.createElement("p");
                    pElem.className = "pub-date";
                    pElem.textContent = pubDateElem.value;
                    currentTarget.replaceChild(pElem, pubDateElem);
                }
                if (result.code != 200){
                    alert(`Error: ${result.code}. ${result.error_description}`);
                }
            }
        }
    }

    static async titleClickHandler(sender){
        let currentTarget = sender.currentTarget;
        if (sender.target.matches(".butt-edit")){
            let pubDateElem = currentTarget.querySelector(".book-title");
            if (pubDateElem.tagName === "P"){
                let inputElem = document.createElement("input");
                inputElem.type = "text";
                inputElem.className = "book-title";
                inputElem.value = pubDateElem.textContent;
                currentTarget.replaceChild(inputElem, pubDateElem);
            }
            else{
                let result = await Api.changeBookTitle(getBookId(sender.target), pubDateElem.value);
                if (result.code == 200 || result.code == 801){
                    let pElem = document.createElement("p");
                    pElem.className = "book-title";
                    pElem.textContent = pubDateElem.value;
                    currentTarget.replaceChild(pElem, pubDateElem);
                }
                if (result.code != 200){
                    alert(`Error: ${result.code}. ${result.error_description}`);
                }
            }
        }
    }

    static async addBookClickHandler(sender) {
        if (sender.target.matches(".butt-add-book")){
            let container = sender.currentTarget;
            let title = container.querySelector(".title input").value;
            let date = container.querySelector(".pub-date input").value;
            let genres = getElemText(container.querySelectorAll(".genres .name"));
            let authors = getElemText(container.querySelectorAll(".authors .name"));

            let book = {"title": title, "authors": authors, "genres": genres, "pubDate": date};
            let result = await Api.addBook(book);
            if (result.code == 200){
                book['id'] = result.book_id;
                HtmlHelpers.addBookToList(book);
                flushNewBook(container);
            }
            else{
                alert(`Error: ${result.code}. ${result.error_description}`)
            }
        }
    }

    static async delBookClickHandler(sender) {
        if (sender.target.matches(".butt-del")){
            let bookRow = getBookRow(sender.target);
            let bookId = bookRow.getAttribute("book");
            let result = await Api.deleteBook(bookId);
            if (result.code == 200){
                bookRow.remove();
            }
            else{
                alert(`Error: ${result.code}. ${result.error_description}`)
            }
        }
    }
}

function getElemText(elems){
    let texts = [];
    elems.forEach(function (elem) {
        switch (elem.tagName) {
            case "INPUT": texts.push(elem.value); break;
            case "P": texts.push(elem.textContent); break;
        }
    });
    return texts;
}

function inputsToP(containers){
    containers.forEach(function(container){
        let input = container.querySelector("input");
        if (input != null){
            let p = document.createElement("p");
            p.className = "name";
            p.textContent = input.value;
            container.replaceChild(p, input);
        }
    });
}

function flushNewBook(container) {
    container.querySelector(".title input").value = "";
    container.querySelector(".pub-date input").value = "";
    let genres = container.querySelectorAll(".genre-container, .author-container");
    genres.forEach(elem => elem.remove(elem));
}

function getBookRow(childElem){
    let bookId = null;
    let currentElem = childElem;
    while (bookId == null){
        currentElem = currentElem.parentNode;
        bookId = currentElem.getAttribute("book");
    }
    return currentElem;
}

function getBookId(childElem){
    let bookId = getBookRow(childElem).getAttribute("book");
    return bookId;
}

async function addBooks(){
    let json = await Api.getBooks();
    if (json.code == 200){
        json.books.forEach( book => HtmlHelpers.addBookToList(book));
        //ClickHandlers.addHandlers();
    }
    else{
        alert("Api return error")
    }
}

function addDatalists(){
    Api.getAuthors().then(json => {HtmlHelpers.addDatalist(json.authors, "authors-list")});
    Api.getGenres().then(json => {HtmlHelpers.addDatalist(json.genres, "genres-list")});
}


window.onload = () => {
    addBooks().then(ClickHandlers.addHandlers);
    addDatalists();
};