@extends('layouts.blog')
@section('content')
    <div class="content">
        <div class="main-artist artist-list">
            <div class="main-container__card-box">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-10">
                            <div class="main-artist__envelope-top">
                                <div class="envelope-top">
                                    <div class="mobile-title">
                                        <p class="mobile-title__en">Artist</p>
                                        <p class="mobile-title__ch">艺术家</p>
                                    </div>
                                    <div class="mobile-title__button-list">
                                        <button class="button-list" type="button">
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8">
                            <div class="news-list__post-box">
                            @foreach($artists as $artist)

                                <div class="post-box">
                                    <div class="post-box__wrapper">
                                        <div class="post-box__env">
                                            <div class="post-box__column">
                                                <a class="" href="{{route('blog_pages.artist_news',$artist->artist_id)}}">
                                                    <p class="post-box__title text-20">{{$artist->full_name}}</p>
                                                    <p class="post-box__sub-info">{{$artist->specialization}}</p>
                                                </a>
                                            </div>
                                            <div class="post-box__column"><a class="post-box__picture" href="{{route('blog_pages.artist_news',$artist->artist_id)}}"><img class="picture" src="/img/artist/{{$artist->image}}" alt="post"></a></div>
                                        </div>
                                        <p class="post-box__author-tablet"></p>
                                        <div class="post-box__env-bottom">
                                            <div class="post-box__column-bottom">
                                                <p class="post-box__paragraph-en"></p>
                                            </div>
                                            <div class="post-box__column-bottom">
                                                <p class="post-box__paragraph-ch"></p>
                                            </div>
                                        </div>
                                        <div class="post-box__link-read"><a class="link-read text-14" href="{{route('blog_pages.artist_news',$artist->artist_id)}}">About Artist</a></div>
                                    </div>
                                </div>

                            @endforeach

                            </div>
                            {{ $artists->links("pagination::simple-default") }}
                        </div>
                        <div class="col-12 col-md-12 col-lg-4">
                            <div class="row">
                                <div class="col-12 col-lg-12">
                                    <div class="main-artist__list-alphabet">

                                        <ul class="list-alphabet">
                                            <li class="list-alphabet__item" ><div class="list-alphabet__top-line">
                                                    <div class="top-line"></div>
                                                </div>
                                                <div class="list-alphabet__artist">
                                                    <div class="artist">
                                                        <form action="{{ route('blog_pages.artists_list') }}">
                                                            <input type="submit" value="A" name="sort" class="input-alphabet picture" />
                                                        </form>
                                                    </div>
                                                </div></li>
                                            @foreach($allArt as $art)
                                                {{--@if($allArt->newsArtist()->count()>0)--}}
                                            <li class="list-alphabet__item">
                                                <div class="list-alphabet__top-line">
                                                    <div class="top-line"></div>
                                                </div>
                                                <div class="list-alphabet__artist">
                                                    <div class="artist">
                                                        <a href="{{route('blog_pages.artist_news',$art->artist_id)}}">
                                                            <p class="artist__name">{{$art->full_name}}</p>
                                                            <p class="artist__name text-gray">{{$art->specialization}}</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                                {{--@endif--}}
                                         @endforeach
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile__list-alphabet">
            <ul class="list-alphabet">
                <li class="list-alphabet__item">
                    <div class="list-alphabet__top-line">
                        <div class="top-line"></div>
                    </div>
                    <div class="list-alphabet__artist">
                        <div class="artist">
                            <p class="artist__name">Hans von Aachen,</p>
                            <p class="artist__name text-gray">German mannerist painter</p>
                        </div>
                        <div class="artist">
                            <p class="artist__name">Nikolaj Abraham Abildgaard</p>
                            <p class="artist__name text-gray">Danish artist and antiquarian</p>
                        </div>
                    </div>
                </li>
                <li class="list-alphabet__item">
                    <div class="list-alphabet__top-line">
                        <div class="top-line"></div>
                    </div>
                    <div class="list-alphabet__artist">
                        <div class="artist">
                            <p class="artist__name">Hans von Aachen,</p>
                            <p class="artist__name text-gray">German mannerist painter</p>
                        </div>
                    </div>
                </li>
                <li class="list-alphabet__item">
                    <div class="list-alphabet__top-line">
                        <div class="top-line"></div>
                    </div>
                    <div class="list-alphabet__artist"></div>
                </li>
                <li class="list-alphabet__item">
                    <div class="list-alphabet__top-line">
                        <div class="top-line"></div>
                    </div>
                    <div class="list-alphabet__artist"></div>
                </li>
                <li class="list-alphabet__item">
                    <div class="list-alphabet__top-line">
                        <div class="top-line"></div>
                    </div>
                    <div class="list-alphabet__artist">
                        <div class="artist">
                            <p class="artist__name">Hans von Aachen,</p>
                            <p class="artist__name text-gray">German mannerist painter</p>
                        </div>
                        <div class="artist">
                            <p class="artist__name">Hans von Aachen,</p>
                            <p class="artist__name text-gray">German mannerist painter</p>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
@endsection