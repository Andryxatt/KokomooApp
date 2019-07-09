@extends('layouts.blog')
@section('content')

    <div class="news-list">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="news-list__share-box show-tablet">
                        <div class="share-box">
                            <p class="share-box__text">Share</p>
                            {{--<div class="share-box__list-link">--}}
                                {{--<ul class="list-link">--}}
                                    {{--<li class="list-link__item">--}}
                                        {{--<a href="{{ Share::load(Request::url(), $newse[0]->category_english)->facebook()}}" target="_blank" class="social-list__link">--}}
                                            {{--<svg class="icon icon-fb ">--}}
                                                {{--<use xlink:href="/static/img/svg/symbol/sprite.svg#fb"></use>--}}
                                            {{--</svg>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="list-link__item">--}}
                                      {{--<a href="{{ Share::load(Request::url(), $newse[0]->category_english)->linkedin()}}" target="_blank" class="social-list__link">--}}
                                         {{--<svg class="icon icon-linkedin ">--}}
                                            {{--<use xlink:href="/static/img/svg/symbol/sprite.svg#linkedin"></use>--}}
                                        {{--</svg>--}}
                                      {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="list-link__item">--}}
                                      {{--<a href="{{ Share::load(Request::url(), $newse[0]->category_english)->pinterest()}}" target="_blank" class="social-list__link">--}}
                                        {{--<svg class="icon icon-pinterest ">--}}
                                          {{--<use xlink:href="/static/img/svg/symbol/sprite.svg#pinterest"></use>--}}
                                        {{--</svg>--}}
                                      {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="list-link__item">--}}
                                      {{--<a href="{{ Share::load(Request::url(), $newse[0]->category_english)->reddit()}}" target="_blank" class="social-list__link">--}}
                                        {{--<svg class="icon icon-reddit ">--}}
                                          {{--<use xlink:href="/static/img/svg/symbol/sprite.svg#reddit"></use>--}}
                                        {{--</svg>--}}
                                      {{--</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}

                            {{--</div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="news-list__title-box">
                        <div class="title-box">
                            <p class="title-box__text-en">{{$artist[0]->full_name}}</p>
                            <p class="title-box__text-ch">{{$artist[0]->specialization}}</p>
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

                                    {{--<div class="top-wrapper__share-box hide-tablet">--}}
                                        {{--<div class="share-box">--}}
                                            {{--<p class="share-box__text">Share</p>--}}

                                            {{--<div class="share-box__list-link">--}}
                                                {{--<div class="list-link" id="share">--}}

                                                    {{--<a class="list-link__item jssocials-share-link" href="{{ Share::load(Request::url(), $newse[0]->category_english)->facebook()}}">--}}
                                                        {{--<svg class="icon icon-fb ">--}}
                                                            {{--<use xlink:href="/static/img/svg/symbol/sprite.svg#fb"></use>--}}
                                                        {{--</svg>--}}
                                                    {{--</a>--}}
                                                    {{--<a class="list-link__item" href="{{ Share::load(Request::url(), $newse[0]->category_english)->linkedin()}}">--}}
                                                        {{--<svg class="icon icon-linkedin ">--}}
                                                            {{--<use xlink:href="/static/img/svg/symbol/sprite.svg#linkedin"></use>--}}
                                                        {{--</svg>--}}
                                                    {{--</a>--}}
                                                    {{--<a class="list-link__item" href="{{ Share::load(Request::url(), $newse[0]->category_english)->pinterest()}}">--}}
                                                        {{--<svg class="icon icon-pinterest ">--}}
                                                            {{--<use xlink:href="/static/img/svg/symbol/sprite.svg#pinterest"></use>--}}
                                                        {{--</svg>--}}
                                                    {{--</a>--}}
                                                    {{--<a class="list-link__item" href="{{ Share::load(Request::url(), $newse[0]->category_english)->reddit()}}">--}}
                                                        {{--<svg class="icon icon-reddit ">--}}
                                                            {{--<use xlink:href="/static/img/svg/symbol/sprite.svg#reddit"></use>--}}
                                                        {{--</svg>--}}
                                                    {{--</a>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div id="share"></div>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($bios as $cont)

                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="news-list__post-list">
                            <div class="post-list"><a class="post-list__picture" href="#"><img class="picture" src="/img/ArtistBioPhoto/{{$cont->photo}}" alt="post"></a></div>
                            <div class="post-list__right-info">

                            </div>
                            <div class="post-list__author-post show-tablet">
                                <p class="author-post">{{$artist[0]->full_name}}</p>
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
    <div class="container">
        <div class="news-list__post-list">
            <h2 class="m-auto">last added news</h2>
            <div class="card-deck card-row pb-3">

                @foreach($topNews as $top)
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="card">
                            <a href="{{route('blog_pages.news',$top->slug)}}"><img class="botomimg card-img-top"
                                                                                   src="/img/newsContent/{{$top->firstCont($top->news_id)['photo']}}"
                                                                                   alt="post"></a>
                            <div class="card-body card-fix">
                                <h5 class="card-title">{{$top->slug}}</h5>
                                <p class="card-text text-14">{{$top->category_english}}</p>
                                <a class="card-link text-14" href="{{route('blog_pages.news',$top->slug)}}">Read news </a>
                            </div>
                            <div class="card-footer card-bottom">
                                <small class="text-muted">{{$top->date_news}}</small>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection













{{--@extends('layouts.blog')--}}
{{--@section('content')--}}
    {{--<div class="content">--}}
        {{--<div class="news-list">--}}
            {{--<div class="container">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-12 col-md-12 col-lg-10">--}}
                        {{--<div class="mobile-title">--}}
                            {{--<p class="mobile-title__en">News</p>--}}
                            {{--<p class="mobile-title__ch">漢字</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="row">--}}
                    {{--<div class="col-12 col-md-12">--}}
                        {{--<div class="news-list__post-box">--}}
                            {{--@foreach($newse as $new)--}}
                                {{--<div class="post-box">--}}
                                    {{--<div class="post-box__wrapper">--}}
                                        {{--<div class="post-box__env">--}}
                                            {{--<div class="post-box__column">--}}
                                                {{--<p class="post-box__title text-20">{{$new->category_english}}</p>--}}
                                                {{--<p class="post-box__sub-info">{{$new->category_china}}</p>--}}
                                                {{--<p class="post-box__author">By {{$new->artist->full_name}} | Posted {{$new->date_news}}</p>--}}
                                            {{--</div>--}}
                                            {{--<div class="post-box__column"><a class="post-box__picture" href="#"><img class="picture" src="/img/newsContent/{{$new->firstCont($new->news_id)['photo']}}" alt="post"></a></div>--}}
                                        {{--</div>--}}
                                        {{--<p class="post-box__author-tablet">By {{$new->artist->full_name}} | Posted {{$new->date_news}}</p>--}}
                                        {{--<div class="post-box__env-bottom">--}}
                                            {{--<div class="post-box__column-bottom">--}}
                                                {{--<p class="post-box__paragraph-en">{{$new->firstCont($new->news_id)['text_english'] }}</p>--}}
                                            {{--</div>--}}
                                            {{--<div class="post-box__column-bottom">--}}
                                                {{--<p class="post-box__paragraph-ch">{{$new->firstCont($new->news_id)['text_china'] }}</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="post-box__link-read"><a class="link-read text-14" href="{{route('blog_pages.news',$new->slug)}}">Read More</a></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}