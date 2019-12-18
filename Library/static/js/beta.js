function addFuncToClick(classQuery, functionName){
    document.querySelectorAll(classQuery).forEach(function (element) {
        element.addEventListener("click", functionName);
    });
}

class HtmlHelpers{
    static addAuthor(container){
        let div = "<div class=\"flex-container author-container\">\n" +
            "<button class=\"butt-del\">del</button>\n" +
            "<input type='text' class=\"name\"/></div>";
        container.insertAdjacentHTML('beforeend', div);
    }

    static addGenre(container){
        let div = "<div class=\"flex-container genre-container\">\n" +
            "<button class=\"butt-del\">del</button>\n" +
            "<input type='text' class=\"name\"/></div>";
        container.insertAdjacentHTML('beforeend', div);
    }

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
        addHandlers();
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

    static authorsClickHandler(sender){
        let applyButt = sender.currentTarget.querySelector(".butt-apply");
        let hideApplyButt;
        //del
        if (sender.target.matches('.author-container > .butt-del')){
            sender.target.parentElement.remove();
            hideApplyButt = false;
        }
        //add
        else if (sender.target.matches('.authors-container > .m-buttons > .butt-add')){
            HtmlHelpers.addAuthor(sender.currentTarget.querySelector(".authors-container"));
            hideApplyButt = false;
        }
        //apply
        else if (sender.target.matches('.authors-container > .m-buttons > .butt-apply')){
            let authors = [];
            let inputs = sender.currentTarget.querySelectorAll(".author-container > input[type=text]");
            let ps = sender.currentTarget.querySelectorAll(".author-container > p.name");
            authors = authors.concat(getElemText(inputs));
            authors = authors.concat(getElemText(ps));
            alert(authors.join(', '));//api call to apply authors
            let authorContainers = sender.currentTarget.querySelectorAll(".author-container");
            inputsToP(authorContainers);
            applyButt.hidden = true;
        }
        else{
            return;
        }
        if (applyButt != null){
            applyButt.hidden = hideApplyButt;
        }
    }

    static genresClickHandler(sender){
        let hideApplyButt;
        let applyButt = sender.currentTarget.querySelector(".butt-apply");
        if (sender.target.matches('.genre-container > .butt-del')){
            sender.target.parentElement.remove();
            hideApplyButt = false;
        }
        else if (sender.target.matches('.genres-container > .m-buttons > .butt-add')){
            HtmlHelpers.addGenre(sender.currentTarget.querySelector(".genres-container"));
            hideApplyButt = false;
        }
        else if (sender.target.matches('.genres-container > .m-buttons > .butt-apply')){
            let genres = [];
            let inputs = sender.currentTarget.querySelectorAll(".genre-container > input[type=text]");
            let ps = sender.currentTarget.querySelectorAll(".genre-container > p.name");
            genres = genres.concat(getElemText(inputs));
            genres = genres.concat(getElemText(ps));
            alert(genres.join(', '));//api call to apply authors
            let genresContainers = sender.currentTarget.querySelectorAll(".genre-container");
            inputsToP(genresContainers);
            hideApplyButt = true;
        }
        else{
            return;
        }
        if (applyButt != null){
            applyButt.hidden = hideApplyButt;
        }
    }

    static pubDateClickHandler(sender){
        if (sender.target.matches(".butt-edit")){
            let pubDateElem = sender.currentTarget.querySelector(".pub-date");
            if (pubDateElem.tagName === "P"){
                let inputElem = document.createElement("input");
                inputElem.type = "date";
                inputElem.className = "pub-date";
                inputElem.value = pubDateElem.textContent;
                sender.currentTarget.replaceChild(inputElem, pubDateElem);
            }
            else{
                let pElem = document.createElement("p");
                pElem.className = "pub-date";
                pElem.textContent = pubDateElem.value;
                sender.currentTarget.replaceChild(pElem, pubDateElem);
            }
        }
    }

    static titleClickHandler(sender){
        if (sender.target.matches(".butt-edit")){
            let pubDateElem = sender.currentTarget.querySelector(".book-title");
            if (pubDateElem.tagName === "P"){
                let inputElem = document.createElement("input");
                inputElem.type = "text";
                inputElem.className = "book-title";
                inputElem.value = pubDateElem.textContent;
                sender.currentTarget.replaceChild(inputElem, pubDateElem);
            }
            else{
                let pElem = document.createElement("p");
                pElem.className = "book-title";
                pElem.textContent = pubDateElem.value;
                sender.currentTarget.replaceChild(pElem, pubDateElem);
            }
        }
    }

    static addBookClickHandler(sender) {
        if (sender.target.matches(".butt-add-book")){
            let container = sender.currentTarget;
            let title = container.querySelector(".title input").value;
            let date = container.querySelector(".pub-date input").value;
            let genres = getElemText(container.querySelectorAll(".genres .name"));
            let authors = getElemText(container.querySelectorAll(".authors .name"));

            let book = {"title": title, "authors": authors, "genres": genres, "pubDate": date};
            book['id'] = 20; //api call add book
            HtmlHelpers.addBookToList(book);
            flushNewBook(container);
        }
    }

    static delBookClickHandler(sender) {
        if (sender.target.matches(".butt-del")){
            let bookRow = getBookRow(sender.target);
            let bookId = bookRow.getAttribute("book");
            //alert(bookId);
            bookRow.remove();
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

function addBooks(){

}


window.onload = ClickHandlers.addHandlers;