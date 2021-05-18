<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>@yield('title') | {{ config('app.name', 'restoshop') }}</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('dist/assets/js/config.navbar-vertical.js') }}"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('dist/vendors/glightbox/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
    <link href=" {{ asset('dist/vendors/dropzone/dropzone.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/assets/css/theme-rtl.min.css') }}" rel="stylesheet" id="style-rtl"/>
    <link href="{{ asset('dist/assets/css/theme.min.css') }}" rel="stylesheet" id="style-default"/>
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            linkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            linkRTL.setAttribute('disabled', true);
        }
    </script>
</head>

<body>
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container" data-layout="container">
        <script>
            var isFluid = JSON.parse(localStorage.getItem('isFluid'));
            if (isFluid) {
                var container = document.querySelector('[data-layout]');
                container.classList.remove('container');
                container.classList.add('container-fluid');
            }
        </script>
        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl" style="display: none;">
            <script>
                var navbarStyle = localStorage.getItem("navbarStyle");
                if (navbarStyle && navbarStyle !== 'transparent') {
                    document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
                }
            </script>
            {{--            burger --}}
            <div class="d-flex align-items-center">
                <div class="toggle-icon-wrapper">
                    <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-toggle="tooltip"
                            data-placement="left" title="Menu">
                        <span class="navbar-toggle-icon">
                            <span class="toggle-line"></span>
                        </span>
                    </button>
                </div>
                <a class="navbar-brand" href="/">
                    <div class="d-flex align-items-center py-3">
                        <span class="font-sans-serif">RestoShop</span></div>
                </a>
            </div>

            {{--            navbar onglet--}}
            <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                <div class="navbar-vertical-content scrollbar">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.index') }}">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="fas fa-chart-pie"></span>
                                    </span>
                                    <span class="nav-link-text">Dashboard</span>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#user" data-toggle="collapse" role="button"
                               aria-expanded="false" aria-controls="user">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="fas fa-user"></span>
                                    </span>
                                    <span class="nav-link-text">Les utilisateurs</span>
                                </div>
                            </a>
                            <ul class="nav collapse" id="user" data-parent="#navbarVerticalCollapse">
                                <li class="nav-item">

                                    <a class="nav-link mb-2" href="{{ route('user.all') }}">
                                        <span class="fas fa-user"></span>
                                        Tous les utilisateurs
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-2" href="{{ route('user.admin') }}">
                                        <span class="fas fa-user"></span>
                                        Super Administrateurs
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-2" href="#">
                                        <span class="fas fa-user"></span>
                                        Administrateurs du restaurant
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#restaurant" data-toggle="collapse" role="button"
                               aria-expanded="false" aria-controls="restaurant">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="far fa-building"></span>
                                    </span>
                                    <span class="nav-link-text">Restaurants</span>
                                </div>
                            </a>
                            <ul class="nav collapse" id="restaurant" data-parent="#navbarVerticalCollapse">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('restaurant.all') }}">Tous les restaurants</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Mon restaurant</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#plats" data-toggle="collapse"
                               role="button" aria-expanded="false" aria-controls="plats">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="fas fa-concierge-bell"></span>
                                    </span>
                                    <span class="nav-link-text">Plâts</span>
                                </div>
                            </a>
                            <ul class="nav collapse" id="plats" data-parent="#navbarVerticalCollapse">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Tous les categories</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Tous les plâts</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-xl"
             style="padding-left: 250px">
            <button class="btn navbar-toggler-humburger-icon navbar-toggler mr-1 mr-sm-3" type="button"
                    data-toggle="collapse" data-target="#navbarStandard" aria-controls="navbarStandard"
                    aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                            class="toggle-line"></span></span></button>
            <a class="navbar-brand mr-1 mr-sm-3" href="#">
                <div class="d-flex align-items-center">
{{--                    <img class="mr-2" src="{{ asset('dist/assets/img/illustrations/falcon.png') }}"--}}
{{--                         alt="" width="40"/>--}}
                    <span class="font-sans-serif">RestoShop</span></div>
            </a>
            <ul class="navbar-nav navbar-nav-icons ml-auto flex-row align-items-center">
                <li class="nav-item dropdown">
                </li>
                <li class="nav-item dropdown">
                    <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownUser">
                        <div class="bg-white rounded-lg py-2">
                            {{--                            <div class="dropdown-divider"></div>--}}
                            <a class="dropdown-item" href="{{ route('user.profil',['id'=>auth()->user()->id]) }}">Profil</a>
                            <form method="POST" action="{{ url('/logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        {{--        content--}}
        <div class="content">
            {{--autres formes de navbar--}}
            <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand"
                 style="padding-left: 250px;">
                <button class="btn navbar-toggler-humburger-icon navbar-toggler mr-1 mr-sm-3" type="button"
                        data-toggle="collapse" data-target="#navbarVerticalCollapse"
                        aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation">
                    <span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                <a class="navbar-brand mr-1 mr-sm-3" href="#">
                    <div class="d-flex align-items-center">
                        {{--                        <img class="mr-2" src="{{ asset('dist/assets/img/illustrations/falcon.png') }}"--}}
                        {{--                             alt="" width="40"/>--}}
                        <span class="font-sans-serif">RestoShop</span></div>
                </a>
                <ul class="navbar-nav align-items-center d-none d-lg-block">
                    <li class="nav-item">

                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-icons ml-auto flex-row align-items-center">

                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" id="navbarDropdownUser" href="#"
                           role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <div class="avatar avatar-xl">
                                <img class="rounded-circle" src="https://www.xovi.com/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png" alt=""/>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownUser">
                            <div class="bg-white rounded-lg py-2">
                                <a class="dropdown-item" href="{{ route('user.profil',['id'=>auth()->user()->id]) }}">profil</a>
                                <form method="POST" action="{{ url('/logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Déconnexion
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            <script>
                var navbarPosition = localStorage.getItem('navbarPosition');
                var navbarVertical = document.querySelector('.navbar-vertical');
                var navbarTopVertical = document.querySelector('.content .navbar-top');
                var navbarTop = document.querySelector('[data-layout] .navbar-top');
                var navbarTopCombo = document.querySelector('.content [data-navbar-top="combo"]');

                if (navbarPosition === 'top') {
                    navbarTop.removeAttribute('style');
                    navbarTopVertical.remove(navbarTopVertical);
                    navbarVertical.remove(navbarVertical);
                    navbarTopCombo.remove(navbarTopCombo);
                } else if (navbarPosition === 'combo') {
                    navbarVertical.removeAttribute('style');
                    navbarTopCombo.removeAttribute('style');
                    navbarTop.remove(navbarTop);
                    navbarTopVertical.remove(navbarTopVertical);
                } else {
                    navbarVertical.removeAttribute('style');
                    navbarTopVertical.removeAttribute('style');
                    navbarTop.remove(navbarTop);
                    // navbarTopCombo.remove(navbarTopCombo);
                }
            </script>

            {{--contenue de la page--}}
            @yield('contenue')

        </div>
    </div>
</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->


<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="{{ asset('dist/vendors/popper/popper.min.js') }}"></script>
<script src="{{ asset('dist/vendors/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('dist/vendors/anchorjs/anchor.min.js') }}"></script>
<script src="{{ asset('dist/vendors/is/is.min.js') }}"></script>
<script src="{{ asset('dist/assets/js/flatpickr.js') }}"></script>
<script src="{{ asset('dist/vendors/dropzone/dropzone.min.js') }}"></script>
<script src="{{ asset('dist/vendors/lottie/lottie.min.js') }}"></script>
<script src="{{ asset('dist/vendors/fontawesome/all.min.js') }}"></script>
<script src="{{ asset('dist/vendors/lodash/lodash.min.js') }}"></script>
<script src="{{ asset('dist/vendors/list.js/list.min.js') }}"></script>
<script src="{{ asset('dist/assets/js/theme.js') }}"></script>
<script src="{{ asset('dist/vendors/glightbox/glightbox.min.js') }}"></script>
<link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">

@yield('script')
</body>


<!-- Mirrored from prium.github.io/falcon/v3.0.0-alpha10/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Dec 2020 14:27:33 GMT -->
</html>
