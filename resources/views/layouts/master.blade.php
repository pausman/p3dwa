<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title', config('app.name'))</title>
    <meta charset='utf-8'>

    {{-- Latest compiled and minified CSS --}}
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <link href='/css/cipher.css' rel='stylesheet'>

    {{--load any local page head code --}}
    @stack('head')
</head>
<header>
    <a href='/'><img src='images/ciphericon.png' id='logo' alt='Cipher Logo'></a>{{config('app.name')}}
</header>
<body>

<header>
    {{-- <a href='/'><img src='/images/foobookslogo.jpg' id='logo' alt='Foobooks Logo'></a> --}}
</header>


{{--Main content section --}}

<section>
    <div class="container text-center">
        <div class="jumbotron">
            @yield('content')
        </div>
    </div>

</section>


<footer>
    Project 3 Pat Ausman October 2018
</footer>


</body>
</html>