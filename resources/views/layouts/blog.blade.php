<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CHI-China</title><!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE = edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <!-- Favicon-->

    <link rel="apple-touch-icon" sizes="60x60" href="/static/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/static/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/static/img/favicon/favicon-16x16.png">
    <link rel="mask-icon" href="/static/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
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
                        <div class="col-12 col-md-12 col-lg-4">
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
                        <div class="col-12 col-md-12 col-lg-8">

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
                                    <a class="navigation-menu__link text-16 margin-navigation-agency" href="{{ route('blog_pages.agency_list') }}">
                                        <span class="navigation-menu__lang-en">Agency</span>
                                        <span class="navigation-menu__border"></span>
                                        <span class="navigation-menu__lang-ch">机构</span>
                                    </a>
                                   <div class="navigation-menu__link margin-navigation-search">
                                      <form method="get" action="{{route('blog_pages.news_search')}}">
                                        <input class="form-control" name="query" id="textsearch" type="text">
                                        <button type="submit" id="search">
                                          Search
                                        </button>
                                         <div class="navigation-search__info">
                                          <span class="navigation-menu__border"></span>
                                          <span class="search-text">搜索</span>
                                        </div>
                                      </form>
                                    </div>
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
            <div class="modal-qr__body"><img class="modal-qr__item" src="/static/img/content/wechat-qr-code.jpg" alt="qr-code"></div>
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
                                        <a  href="#" class="social-list__link" data-izimodal-open="#modal-qr">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">

</script>
</body>
</html>
