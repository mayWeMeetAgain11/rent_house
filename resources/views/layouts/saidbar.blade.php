<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/cards.css">
    <link rel="stylesheet" href="/css/create.css">
    <link rel="stylesheet" href="/css/table.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="/css/show.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500&display=swap"
        rel="stylesheet">



    <title>Document</title>
</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="saidbar">
        <div class="saidbar-brand">
            <a href="{{ route('home') }}">

                <h2><span class="lab la-accusoft"></span><span>Accusoft</span></h2>
            </a>
        </div>
        <div class="saidbar-menu">
            <ul>
                <li>
                    <a href="{{ route('admin') }}" class="active">
                        <span class="las la-igloo"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.houses') }}">
                        <span class="las la-home">
                        </span><span>House</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.chalets') }}"><span class="las la-building"></span><span>Chalet</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.stores') }}">
                        <span class="las la-store"></span>
                        <span>Store</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users') }}">
                        <span class="las la-user-circle">
                        </span><span>User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.rating') }}">
                        <span class="las la-user-circle">
                        </span><span>rating</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <div class="header-title">
                <h2>
                    <label for="nav-toggle">
                        <span class="las la-bars"></span>
                    </label>
                    Dashboard
                </h2>
            </div>
            <div>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                                                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </div>
        </header>
        <main>
            @yield('contents')
        </main>
    </div>
    <script src="/js/main.js"></script>
    @include('sweetalert::alert')
</body>

</html>
