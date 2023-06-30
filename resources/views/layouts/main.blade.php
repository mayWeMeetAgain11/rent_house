<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>template one</title>
    <!-- main templeate css file -->
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/table.css">
    <!-- render all elements normally -->
    <link rel="stylesheet" href="/css/normalize.css">
    <!-- font library  -->
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- font famile -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- start header  -->
    <header>
        <div class="contener">
            <img class="logo" src="images/logo.png" alt="">
            <div class="links">
                <span class="icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
                <ul>
                    @if (Auth::check() && Auth::user()->group_by == 1)
                        <li><a href="{{ route('admin') }}">Admin</a></li>
                    @endif
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle"
                                href="{{ route('user.index', [Auth::id()]) }}" role="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            </il>
                        <li>
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
                    <li><a href="{{ route('user.showall') }}">ikars</a></li>
                    <li><a href="#aAbout">About</a></li>
                    <li><a href="#contact">contact</a></li>
                </ul>
            </div>
        </div>
    </header>
    <!-- end header  -->
    @yield('content')
    <!-- start contact  -->
    <div class="contact" id="contact">
        <div class="contener">
            <h3 class="special-headeing">contact</h3>
            <p>We are born to create</p>
            <div class="contact-contener">
                <p class="par">Feel free to drop us a line at:</p>
                <a href="" class="lenk">leonagency@mail.com</a>
                <div class="last">
                    find us on social networks:
                    <i class="fas fa-youtube"></i>
                    <i class="fas fa-facebook"></i>
                    <i class="fas fa-twitter"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact  -->
    <!-- start footer  -->
    <div class="footer">
        <div>&copy; 2021-<span>Leon</span>,All Right Reserved</div>
    </div>
    <!-- end footer  -->
</body>

</html>
