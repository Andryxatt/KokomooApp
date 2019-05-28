@extends('layouts.blog')
@section('content')
    <div class="content">
        <div class="news-list">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-10">
                        <div class="mobile-title">
                            <p class="mobile-title__en">News</p>
                            <p class="mobile-title__ch">漢字</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="news-list__post-box">
                            @foreach($newss as $new)
                            <div class="post-box" id="posts">
                                <div class="post-box__wrapper">
                                    <div class="post-box__env">
                                        <div class="post-box__column">
                                            <p class="post-box__title text-20">{{$new->category_english}}</p>
                                            <p class="post-box__sub-info">{{$new->category_china}}</p>
                                            <p class="post-box__author">By {{$new->artist->full_name}} | Posted {{$new->date_news}}</p>
                                        </div>
                                        <div class="post-box__column"><a class="post-box__picture" href="#"><img class="picture" src="/img/newsContent/{{$new->firstCont($new->news_id)['photo']}}" alt="post"></a></div>
                                    </div>
                                    <p class="post-box__author-tablet">By {{$new->artist->full_name}} | Posted {{$new->date_news}}</p>
                                    <div class="post-box__env-bottom">
                                        <div class="post-box__column-bottom">
                                            <p class="post-box__paragraph-en">{{$new->firstCont($new->news_id)['text_english'] }}</p>
                                        </div>
                                        <div class="post-box__column-bottom">
                                            <p class="post-box__paragraph-ch">{{$new->firstCont($new->news_id)['text_china'] }}</p>
                                        </div>
                                    </div>
                                    <div class="post-box__link-read"><a class="link-read text-14" href="{{route('blog_pages.news',$new->slug)}}">Read More</a></div>
                                </div>
                            </div>
                            @endforeach
                                {{ $newss->links( "pagination::simple-default") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection