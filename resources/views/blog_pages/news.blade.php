@extends('layouts.blog')
@section('content')

        <div class="news-list">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="news-list__share-box show-tablet">
                            <div class="share-box">
                                <p class="share-box__text">Share</p>
                                <div class="share-box__list-link">
                                <ul class="social-list">
                                    <li class="social-list__item">
                                        <a  href="https://www.facebook.com" target="_blank" class="social-list__link">
                                            <svg class="icon icon-fb ">
                                                <use xlink:href="/static/img/svg/symbol/sprite.svg#fb"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="social-list__item">
                                        <a  href="https://www.instagram.com/chi_media/" target="_blank" class="social-list__link">
                                            <svg class="icon icon-instagram ">
                                                <use xlink:href="/static/img/svg/symbol/sprite.svg#instagram"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="social-list__item">
                                        <a  href="https://www.wechat.com/" target="_blank" class="social-list__link">
                                            <svg class="icon icon-wechat ">
                                                <use xlink:href="/static/img/svg/symbol/sprite.svg#wechat"></use>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="news-list__title-box">
                            <div class="title-box">
                                <p class="title-box__text-en">{{$newse[0]->category_english}}</p>
                                <p class="title-box__text-ch">{{$newse[0]->category_china}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="news-list__post-env">
                            <div class="post-env">
                                <div class="post-env__top-wrapper">
                                    <div class="top-wrapper">
                                        <div class="top-wrapper__author-post hide-tablet">
                                            <p class="author-post">By {{$newse[0]->artist->full_name}} | Posted {{$newse[0]->date_news}}</p>
                                        </div>
                                        <div class="top-wrapper__share-box hide-tablet">
                                            <div class="share-box">
                                                <p class="share-box__text">Share</p>

                                                <div class="share-box__list-link">
                                                    <div class="list-link" id="share">

                                                        <a class="list-link__item jssocials-share-link" href="https://facebook.com/sharer/sharer.php?u=">
                                                            <svg class="icon icon-fb ">
                                                                <use xlink:href="/static/img/svg/symbol/sprite.svg#fb"></use>
                                                            </svg>
                                                        </a>
                                                        <a class="list-link__item" href="https://twitter.com/intent/tweet">
                                                            <svg class="icon icon-twitter ">
                                                                <use xlink:href="/static/img/svg/symbol/sprite.svg#twitter"></use>
                                                            </svg>
                                                        </a>
                                                        <a class="list-link__item" href="#">
                                                            <svg class="icon icon-wechat ">
                                                                <use xlink:href="/static/img/svg/symbol/sprite.svg#wechat"></use>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($content as $cont)

                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="news-list__post-list">
                            <div class="post-list"><a class="post-list__picture" href="#"><img class="picture" src="/img/newsContent/{{$cont->photo}}" alt="post"></a></div>
                            <div class="post-list__right-info">
                                <div class="right-info">
                                    <p class="right-info__text-en text-14">{{$cont->photo_title}}</p>
                                </div>
                            </div>
                            <div class="post-list__author-post show-tablet">
                                <p class="author-post">{{$newse[0]->artist->full_name}} | Posted {{$newse[0]->date_news}}</p>
                            </div>

                            <div class="post-list__bottom-column">
                                <div class="bottom-column">
                                    <div class="bottom-column__item">
                                        <p class="bottom-column__text-en text-14">{{$cont->text_english}}</p>
                                    </div>
                                    <div class="bottom-column__item">
                                        <p class="bottom-column__text-ch text-14">{{$cont->text_china}}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

@endsection