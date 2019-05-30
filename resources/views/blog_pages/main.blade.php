@extends('layouts.blog')

@section('content')
            <div class="content">
                <div class="top-info">
                    <div class="container">
                        <div class="row align-items-end">
                            <div class="col-12 col-lg-4">
                                <div class="top-info__envelope">
                                    <div class="top-info__box-env">
                                        @foreach ($leftCont as $left)
                                        <div class="box-env">
                                            <div class="box-env__text">{{$left->china_text}}</div>
                                            <div class="box-env__text">{{$left->english_text}}</div>
                                        </div>
                                       @endforeach
                                    </div>
                                    <div class="top-info__title-env">
                                        <div class="title-env">
                                            <div class="title-env__chinese-text">
                                                <p class="title-env__ch">商业领域的艺术呈现</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-8">
                                <div class="top-info__title-env">
                                    <div class="title-env">
                                        <div class="title-env__english-text">
                                            <p class="title-env__en"><span class="title-env__title-upper">Chi</span> - Art manifestation</p>
                                            <p class="title-env__en-bottom">in a world commerce</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-container__card-box">
                    <div class="container">
                        <div class="row">
                            @foreach($maincont as $main)
                            <div class="col-12 col-md-12 col-lg-4">
                                <div class="card-box">
                                    <div class="card-box__rotate-title">
                                        <div class="rotate-title">
                                            <a class="picture" href="{{ route('blog_pages.'. strtolower($main->title_english).'_list') }}">
                                            <p class="rotate-title__en">{{$main->title_english}}</p>
                                            <p class="rotate-title__ch">{{$main->title_china}}</p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-box__picture"><a class="picture" href="{{ route('blog_pages.'. strtolower($main->title_english).'_list') }}"><img class="picture__item" src="img/content/{{$main->photo}}" alt="picture"></a></div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
@endsection