<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="/css/app.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="/js/plugins/DataTables/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="/js/plugins/jquery-ui-1.12.1/jquery-ui.structure.min.css">
        <link rel="stylesheet" type="text/css" href="/js/plugins/jquery-ui-1.12.1/jquery-ui.theme.min.css">
        <link rel="stylesheet" type="text/css" href="/js/plugins/jquery-ui-1.12.1/jquery-ui.min.css">

        <style>
            .dropdown-item{
                color: white;
            }
        </style>

        @yield('css')

        <title>PPCWeb @yield('title')</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top justify-content-between">
            <a class="navbar-brand" href="/">PPCWeb</a>
            <!-- Links -->
            <ul class="navbar-nav">
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Link 1</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Link 2</a>--}}
                {{--</li>--}}
                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <div class="container-fluid">
            @yield('conteudo')
        </div>

        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/app.js"></script>
        <script src="/js/all.min.js"></script>
        <script type="text/javascript" src="/js/plugins/DataTables/datatables.min.js"></script>
        <script type="text/javascript" src="/js/plugins/DataTables/datatables.min.js"></script>
        <script type="text/javascript" src="/js/plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/js/plugins/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js"></script>
        <script type="text/javascript" src="/js/comum.js"></script>
        @yield('js')
    </body>
</html>