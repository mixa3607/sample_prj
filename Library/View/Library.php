<?php


namespace View;


use Model\DbLibrary;

class Library
{
    public function DrawPage(array $books){
        print("<!DOCTYPE html>
<html lang=\"en\">");
        print(Template::GetHtmlHead());
        //print($this->DrawBody());
        $this->DrawBody();
        print("</html>");
    }

    private function DrawBody(){
        ?>
<body>
<div class="container">
    <div class="header">

    </div>
    <div class="content">
        <div class="books">
            <table id="books_table">
                <tbody>
                <tr>
                    <td>
                        <div class="flex-container flex-col">
                            <div class="flex-container"><button>del</button><p>test</p></div>
                            <div class="flex-container"><button>del</button><p>test</p></div>
                            <button>add</button>
                        </div>
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="flex-container flex-col">
                            <div class="flex-container"><button>del</button><p>test</p></div>
                            <div class="flex-container"><button>del</button><p>test</p></div>
                            <button>add</button>
                        </div>
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        3
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body><?php
    }
}