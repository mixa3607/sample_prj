<?php


namespace View;


class Template
{
    public static function GetHtmlHead($title = "Library"): string
    {
        return <<< EOF

<head>
    <title>Library</title>
    <link rel="stylesheet" href="/static/css/main.css">
    <script type="application/javascript" src="/static/js/main.js"></script>
</head>
EOF;
    }
}