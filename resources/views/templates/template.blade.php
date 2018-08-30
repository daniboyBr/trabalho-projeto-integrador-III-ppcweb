<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="/css/app.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/all.min.css">

        @yield('css')

        <title>PPCWeb @yield('title')</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <a class="navbar-brand" href="/">PPCWeb</a>
            <!-- Links -->
            <ul class="navbar-nav">
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Link 1</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Link 2</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Link 3</a>--}}
                {{--</li>--}}
            </ul>
        </nav>
        <div class="container">
            @yield('conteudo')
        </div>

        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/app.js"></script>
        <script src="/js/all.min.js"></script>
        @yield('js')
    </body>
</html>