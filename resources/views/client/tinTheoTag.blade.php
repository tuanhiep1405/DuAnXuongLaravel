@extends('client.layouts.master')
@section('content')
    <div class="inner-page-header">
        <div class="banner">
            <img src="/client/images/banner/3.jpg" alt="Banner">
        </div>
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-page-locator">

                            <ul>
                                <li><a href="{{ url('/') }}">Trang chủ <i class="fa fa-compress" aria-hidden="true"></i>
                                    </a></li>
                            </ul>


                        </div>
                        <div class="header-page-title">

                            {{-- <h1>{{$tag->name}}</h1> --}}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-page-area gallery-page category-page">
        <div class="container">
            <div class="row">
                <div class="item-box-light-md-less30 ie-full-width">
                    @foreach ($postWithTags as $item)
                        <div class="row">
                            <ul>
                                <li>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="carousel-inner">
                                            <div class="blog-image">
                                                <div class="single-image text-center">
                                                    <img src="{{ $item->image }}" alt="Blog single photo">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <h3><a href="{{ url('/detail', [$item->id]) }}">{{ $item->post_title }}</a></h3>
                                        <span class="date"><i class="fa fa-calendar-check-o"
                                                aria-hidden="true"></i>{{ \Carbon\Carbon::parse($item->created_at)->toDateString() }}</span>
                                        <span class="like"><a href="#"><i class="fa fa-comment-o"
                                                    aria-hidden="true"></i> {{ $item->views }} </a></span>
                                        <p>{{ $item->content }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    @endforeach






                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar-area">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
