<?php


namespace View;


class Template
{
    public static function PrintHtmlHeadStart()
    {
?><!DOCTYPE html>
<html lang="en"><?php
    }

    public static function PrintHtmlHeadEnd()
    {
        print("</html>");
    }

    public static function PrintPageBody($header = "", $main = "", $footer = "")
    {
        print("<div class=\"container\"><div class=\"header\">");
        print($header);
        print("</div><div class=\"content\">");
        print($main);
        print("</div><div class=\"footer\">");
        print($footer);
        print("</div></div>");
    }

    public static function PrintPageHead($title = "Library")
    {
?><head>
    <title><?php print($title); ?></title>
    <link rel="stylesheet" href="/static/css/main.css">
    <script type="application/javascript" src="/static/js/api.js"></script>
    <script type="application/javascript" src="/static/js/main.js"></script>
</head><?php
    }
}