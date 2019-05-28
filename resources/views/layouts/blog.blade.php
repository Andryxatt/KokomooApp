<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Main</title><!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE = edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <!-- Favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="./static/favicon//apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./static/favicon//apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./static/favicon//apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./static/favicon//apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./static/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./static/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./static/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./static/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./static/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="./static/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./static/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./static/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./static/favicon/favicon-16x16.png">
    <link rel="manifest" href="./static/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="./static/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="/static/css/libs.min.css">
    <link rel="stylesheet" type="text/css" href="/jssocials/jssocials.css">
    <link rel="stylesheet" type="text/css" href="/jssocials/jssocials-theme-flat.css">
    <link rel="stylesheet" type="text/css" href="/static/css/main.css"><!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
</head>
<body class="index-main">
<!-- Icon-->
<!-- Titles-->
<!-- Buttons-->
<!-- Language-->
<!-- Social-->
<!-- Social modal-->
<!-- Map-->
<!-- Forms-->
<!-- Select-->
<!-- Category items-->
<!-- Navigation tablet and portrait-->
<!-- Cart items-->
<!-- Cart items with tags-->
<!-- Main slider-->
<!-- Product Card Slider-->
<!-- Counter-->
<!-- List Stars-->
<!-- Filter-->
<div class="site__wrapper">
    <div class="page">
        <div class="area">
            <header class="header">
                <div class="container">
                    <div class="row align-items-end">
                        <div class="col-12 col-md-12 col-lg-3">
                            <div class="header__envelope-mobile">
                                <div class="header__logotype"><a class="logotype" href="{{ route('blog_pages.main') }}">
                                        <svg class="icon icon-logo ">
                                            <use xlink:href="/static/img/svg/symbol/sprite.svg#logo"></use>
                                        </svg></a></div>
                                <div class="header__bars">
                                    <button class="bars" type="button">
                                        <svg class="icon icon-next ">
                                            <use xlink:href="/static/img/svg/symbol/sprite.svg#next"></use>
                                        </svg>
                                        <svg class="icon icon-more ">
                                            <use xlink:href="/static/img/svg/symbol/sprite.svg#more"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-3">
                            <div class="form-group">
                                <input type="text" name="search" id="search" class="form-control" placeholder="search news artists">
                                    <button class="bars" type="button"> Search
                                    </button>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-6">
                            <div class="header__navigation-menu">
                                <div class="navigation-menu">
                                    <a class="navigation-menu__link text-16" href="{{ route('blog_pages.news_list') }}">
                                        <span class="navigation-menu__lang-en">News</span>
                                        <span class="navigation-menu__border"></span>
                                        <span class="navigation-menu__lang-ch">新闻</span>
                                    </a>
                                    <a class="navigation-menu__link text-16" href="{{ route('blog_pages.artists_list') }}">
                                        <span class="navigation-menu__lang-en">Artists</span>
                                        <span class="navigation-menu__border"></span>
                                        <span class="navigation-menu__lang-ch">艺术家</span>
                                    </a>
                                    <a class="navigation-menu__link text-16" href="{{ route('blog_pages.agency_list') }}">
                                        <span class="navigation-menu__lang-en">Agency</span>
                                        <span class="navigation-menu__border"></span>
                                        <span class="navigation-menu__lang-ch">机构</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="navigation-mobile">
                <div class="navigation-mobile__list-nav">
                    <div class="list-nav">
                        <a class="navigation-menu__link text-16" href="{{ route('blog_pages.news_list') }}">
                            <span class="navigation-menu__lang-en">News</span>
                            <span class="navigation-menu__border"></span>
                            <span class="navigation-menu__lang-ch">新闻</span>
                        </a>
                        <a class="navigation-menu__link text-16" href="{{ route('blog_pages.artists_list') }}">
                            <span class="navigation-menu__lang-en">Artists</span>
                            <span class="navigation-menu__border"></span>
                            <span class="navigation-menu__lang-ch">艺术家</span>
                        </a><a class="navigation-menu__link text-16" href="{{ route('blog_pages.agency_list') }}">
                            <span class="navigation-menu__lang-en">Agency</span>
                            <span class="navigation-menu__border"></span>
                            <span class="navigation-menu__lang-ch">机构</span>
                        </a>
                    </div>
                    <div class="list-nav__social-list">
                        <ul class="social-list">
                            <li class="social-list__item"><a class="social-list__link" href="https://www.facebook.com/" target="_blank">
                                    <svg class="icon icon-fb ">
                                        <use xlink:href="static/img/svg/symbol/sprite.svg#fb"></use>
                                    </svg></a></li>
                            <li class="social-list__item"><a class="social-list__link" href="https://www.instagram.com/chi_media/" target="_blank">
                                    <svg class="icon icon-instagram ">
                                        <use xlink:href="static/img/svg/symbol/sprite.svg#instagram"></use>
                                    </svg></a></li>
                            <li class="social-list__item"><a class="social-list__link" href="https://www.wechat.com/" target="_blank">
                                    <svg class="icon icon-wechat ">
                                        <use xlink:href="static/img/svg/symbol/sprite.svg#wechat"></use>
                                    </svg></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
        <div class="modal-qr" id="modal-qr">
            <div class="modal-qr__body"><img class="modal-qr__item" src="static/img/content/wechat-qr-code.jpg" alt="qr-code"></div>
        </div>
        <div class="modal-subscribe" id="modal-subscribe">
            <form class="modal-subscribe__body" name="subscribe[]">
                <label class="modal-subscribe__label">
                    <input class="modal-subscribe__input" type="text" name="email" placeholder="Enter your mail">
                </label>
                <button class="modal-subscribe__button-send button-form" type="button">Send</button>
            </form>
        </div>
        <div class="modal-callback">
            <div class="modal-callback__body">
                <p class="modal-callback__text-en text-14">Thank you for subscribing</p>
                <p class="modal-callback__text-ch text-14">感謝您的訂閱</p>
            </div>
        </div>
        <div class="modal-error">
            <div class="modal-error">
                <p class="modal-error__text-en text-14">This email is already signed</p>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="footer__logotype"><a class="logotype" href="#">
                                <svg class="icon icon-logo ">
                                    <use xlink:href="/static/img/svg/symbol/sprite.svg#logo"></use>
                                </svg></a></div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-12 col-md-12 col-lg-7">
                        <div class="footer__bottom-info">
                            <div class="bottom-info">
                                <p class="bottom-info__en">Follow </p>
                                <p class="bottom-info__rotate-border"></p>
                                <p class="bottom-info__ch">关注</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-5">
                        <div class="footer__subscribe-env">
                            <div class="subscribe-env">
                                {{--<form action="{{ url('/blog/mailChim') }}" method="post">--}}
                            {{--{{ csrf_field() }}--}}
                                    <button class="subscribe-env " type="button" data-izimodal-open="#modal-subscribe"><span class="subscribe-env__text">Subscribe</span><span class="subscribe-env__border"></span><span class="subscribe-env__text">订阅</span></button>
                                {{--</form>--}}

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="footer__social-list">
                            <div id="">
                            <ul class="social-list">
                                    <li class="social-list__item">
                                        <a  href="https://www.facebook.com/chi_media" target="_blank" class="social-list__link">
                                            <svg class="icon icon-fb ">
                                                <use xlink:href="/static/img/svg/symbol/sprite.svg#fb"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="social-list__item">
                                        <a  href="https://instagram.com/chi_media" target="_blank" class="social-list__link">
                                            <svg class="icon icon-instagram ">
                                                <use xlink:href="/static/img/svg/symbol/sprite.svg#instagram"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="social-list__item">
                                        <a  href="https://we@chi-china.net" target="_blank" class="social-list__link">
                                            <svg class="icon icon-wechat ">
                                                <use xlink:href="/static/img/svg/symbol/sprite.svg#wechat"></use>
                                            </svg>
                                        </a>
                                    </li>
                                </ul></div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="/static/js/libs.min.js"></script>
<script src="/jssocials/jssocials.min.js"></script>
<script src="/jssocials/soc.js"></script>
<script src="/static/js/main.js"></script>
<script src="/static/js/search.js"></script>

</body>
</html>
