<?php


namespace View;


use Model\DbLibrary;

class LibraryView
{
    public function DrawPage(){
        Template::PrintHtmlHeadStart();
        Template::PrintPageHead();
        Template::PrintPageBody("", $this->MakeBody(), "");
        Template::PrintHtmlHeadEnd();
    }

    private function MakeBody(): string {
        return <<<EOF
        <div class="books">
            <table id="books-table">
                <tbody>
                </tbody>
            </table>
        </div>
        <hr>
        <div class="new-book">
            <h3>Add new book</h3>
            <hr>
            <div class="title">
                <label>Title <input type="text"></label>
            </div>
            <div class="pub-date">
                <label>Publish date <input type="date"></label>
            </div>
            <hr>
            <h4>Authors</h4>
            <div class="authors">
                <div class="flex-container flex-col authors-container">
                    <div class="m-buttons">
                        <button class="butt-add">add</button>
                        <!--<button hidden class="butt-apply">apply</button>-->
                    </div>
                </div>
            </div>
            <hr>
            <h4>Genres</h4>
            <div class="genres">
                <div class="flex-container flex-col genres-container">
                    <div class="m-buttons">
                        <button class="butt-add">add</button>
                        <!--<button hidden class="butt-apply">apply</button>-->
                    </div>
                </div>
            </div>
            <hr>
            <button class="butt-add-book">Add book</button>
        </div>
EOF;
    }
}