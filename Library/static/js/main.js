function addFuncToClick(classQuery, functionName){
    document.querySelectorAll(classQuery).forEach(function (button) {
        button.addEventListener("click", functionName);
    });
}

function addHandlers() {
    addFuncToClick(".butt-del-genre", deleteGenre);
    addFuncToClick(".butt-del-author", deleteAuthor);

    addFuncToClick(".butt-add-genre", addGenre);
    addFuncToClick(".butt-add-author", addAuthor);

    addFuncToClick(".butt-apply-genres", applyGenres);
    addFuncToClick(".butt-apply-authors", applyAuthors);

    addFuncToClick(".butt-title-edit", editTitle);
    addFuncToClick(".butt-pub-date-edit", editDate);
}

function deleteGenre(sender) {
    sender.currentTarget.parentElement.parentElement.querySelector(".butt-apply-genres").hidden = false;
    sender.currentTarget.parentElement.remove();
}
function deleteAuthor(sender) {
    sender.currentTarget.parentElement.parentElement.querySelector(".butt-apply-authors").hidden = false;
    sender.currentTarget.parentElement.remove();
}

function addGenre(sender){
    var button = sender.currentTarget;
    var genresContainer = button.parentElement.parentElement;
    //genresContainer.querySelector(".butt-apply-genres").hidden = false;

    var delButton = document.createElement("button");
    delButton.className += "butt-del-genre ";
    delButton.textContent = "del";
    delButton.addEventListener("click", deleteGenre);

    //var p = document.createElement("p");
    var input = document.createElement("input");
    input.type = "text";


    var genreContainer = document.createElement("div");
    genreContainer.className += "flex-container ";
    genreContainer.append(delButton);
    genreContainer.append(input);

    genresContainer.insertBefore(genreContainer, genresContainer.lastChild);

}
function addAuthor(sender){
    var button = sender.currentTarget;
    var authorsContainer = button.parentElement.parentElement;
    authorsContainer.querySelector(".butt-apply-authors").hidden = false;

    var delButton = document.createElement("button");
    delButton.className += "butt-del-author ";
    delButton.textContent = "del";
    delButton.addEventListener("click", deleteAuthor);

    //var p = document.createElement("p");
    var input = document.createElement("input");
    input.type = "text";


    var authorContainer = document.createElement("div");
    authorContainer.className += "flex-container ";
    authorContainer.append(delButton);
    authorContainer.append(input);

    authorsContainer.insertBefore(authorContainer, authorsContainer.lastChild);

}

function applyGenres(sender) {
    var button = sender.currentTarget;
    var genreContainer = button.parentElement;
    var genresContainer = genreContainer.parentElement;

    var genres = "";
    genresContainer.querySelectorAll(".genre-name").forEach(function (p) {
        genres += ("genres[]=" + p.textContent + "&");
    });
    genresContainer.querySelectorAll("input").forEach(function (p) {
        genres += ("genres[]=" + p.value + "&");
    });

    alert(genres);
    button.hidden = true;

}
function applyAuthors(sender) {
    var button = sender.currentTarget;
    var authorContainer = button.parentElement;
    var authorsContainer = authorContainer.parentElement;

    var genres = "";
    authorsContainer.querySelectorAll(".author-name").forEach(function (p) {
        genres += ("authors[]=" + p.textContent + "&");
    });
    authorsContainer.querySelectorAll("input").forEach(function (p) {
        genres += ("authors[]=" + p.value + "&");
    });

    alert(genres);
    button.hidden = true;
}

function editTitle(sender){
    var button = sender.currentTarget;
    var container = button.parentElement;
    var p = container.querySelector(".book-title");
    var input = container.querySelector("input");

    if (input){
        var text = input.value;
        //api change title
        p = document.createElement("p");
        p.setAttribute("class", "book-title")
        p.textContent = text;
        input.remove();
        button.textContent = "edit";
        container.append(p);
    }
    else{
        input = document.createElement("input");
        input.setAttribute("type", "text");
        input.value = p.textContent;
        container.append(input);
        p.remove();
        button.textContent = "apply";
    }
}
function editDate(sender){
    var button = sender.currentTarget;
    var container = button.parentElement;
    var p = container.querySelector(".book-pub-date");
    var input = container.querySelector("input");

    if (input){
        var text = input.value;
        //api change title
        p = document.createElement("p");
        p.setAttribute("class", "book-pub-date")
        p.textContent = text;
        input.remove();
        button.textContent = "edit";
        container.append(p);
    }
    else{
        input = document.createElement("input");
        input.setAttribute("type", "date");
        input.value = p.textContent;
        container.append(input);
        p.remove();
        button.textContent = "apply";
    }
}

window.onload = addHandlers;
var res = Api.getBooks();

