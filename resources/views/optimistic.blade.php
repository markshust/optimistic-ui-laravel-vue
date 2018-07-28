<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Twitter</title>
        <link href="css/app.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container" id="app">
            <tweet-component :initial-tweets="{{ $tweets }}"></tweet-component>
        </div>
        <script type="text/javascript" src="/js/app.js"></script>
    </body>
</html>
