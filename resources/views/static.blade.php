<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Twitter</title>
        <link href="css/app.css" rel="stylesheet">
    </head>
    <body>
        <div id="dark-loader"></div>
        <div class="container">
            <div class="tweetbox">
                <form action="/tweet" method="POST" onsubmit="document.getElementById('dark-loader').style.display = 'block';">
                    <textarea name="tweet"></textarea>
                    <input type="hidden" name="username" value="markshust" />
                    <input type="submit" value="Tweet!" />
                    @csrf()
                </form>
            </div>
            <div class="timeline">
                @foreach($tweets as $tweet)
                <div class="tweet">
                    <div class="user-info">
                        <img src="images/{{$tweet->username}}.jpg" class="avatar" />
                        <div class="username">
                            {{$tweet->username}}
                        </div>
                    </div>
                    <div class="content">
                        {{$tweet->tweet}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
