@extends('client.layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 padding-0">

                <div class="slider-area">
                    <div class="bend niceties preview-2">
                        <div id="ensign-nivoslider" class="slides">
                            @foreach ($posts as $item)
                                <img src="{{ $item->image }}" alt="{{ $item->title }}"
                                    title="#slider-direction-{{ $loop->index + 1 }}"
                                    style="width: 100%;height: 537px;max-width: 100%; object-fit: cover;" />
                            @endforeach
                        </div>

                        @foreach ($posts as $item)
                            <div id="slider-direction-{{ $loop->index + 1 }}" class="slider-direction">
                                <div class="slider-content t-cn s-tb slider-1">
                                    <div class="title-container s-tb-c">
                                        <div class="slider-botton">
                                            <ul>
                                                <li>
                                                    <a class="cat-link" href="category.html">{{ $item->category_name }}</a>
                                                    <span class="date">
                                                        <i class="fa fa-calendar-check-o"
                                                            aria-hidden="true"></i>{{ \Carbon\Carbon::parse($item->created_at)->toDateString() }}
                                                    </span>
                                                    <span class="comment">
                                                        <a href="#"><i class="fa-solid fa-eye"></i>
                                                            {{ $item->views }}</a>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <h1 class="title1"><a href="{{ url('/detail', [$item->id]) }}">{{ $item->title }}</a></h1>
                                        <p class="" style="color: white">{{ $item->content }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>

            <!-- Slider Area End Here-->
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 paddimg-left-none">
                <div class="slider-right">
                    <ul>
                        @foreach ($top3 as $item)
                            <li>
                                <div class="right-content">
                                    <span class="category"><a class="cat-link"
                                            href="{{ url('/detail', [$item->id]) }}">{{ $item->category_name }}</a></span>
                                    <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"> </i>
                                        {{ \Carbon\Carbon::parse($item->created_at)->toDateString() }}</span>
                                    <h5 class="title1"><a href="{{ url('/detail', [$item->id]) }}" >{{ $item->title }}</a></h5>
                                </div>
                                <div class="right-image"><a href="{{ url('/detail', [$item->id]) }}"><img src="{{ $item->image }}"
                                            alt="{{ $item->title }}"
                                            style="width:375px;object-fit: cover;height: 178px;"></a></div>
                            </li>
                        @endforeach



                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="all-news-area">
        <div class="container">
            <!-- latest news Start Here -->
            <div class="row">
                
                <div class="item-box-light-md-less30 ie-full-width">


                    <!-- Trending news  here-->
                    <div class="trending-news separator-large">
                        <div class="row">
                            <div class="view-area">
                                <div class="col-sm-8">
                                    <h3 class="title-bg">Tin Tức Thịnh hành</h3>
                                </div>
                               
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="list-col">
                                    @foreach ($normal as $item)
                                        <a href="{{ url('/detail', [$item->id]) }}"> <img src="{{ $item->image }}" alt=""
                                                title="Trending image" /></a>
                                        <div class="dsc">
                                            <span class="date"> <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                {{ \Carbon\Carbon::parse($item->created_at)->toDateString() }} </span>
                                            <span class="comment"><a href="#"><i class="fa-solid fa-eye"></i>
                                                    50</a></span>
                                            <h3><a href="{{ url('/detail', [$item->id]) }}">{{ $item->title }}</a></h3>
                                            <p class="">{{ $item->content }}</p>

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                @foreach ($top4 as $item)
                                    <ul class="news-post">
                                        <li>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content">
                                                    <div class="item-post">
                                                        <div class="row">
                                                            <div
                                                                class="col-lg-4 col-md-4 col-sm-3 col-xs-3 paddimg-right-none">
                                                                <a href="{{ url('/detail', [$item->id]) }}"> <img
                                                                    src="{{ $item->image }}" alt=""
                                                                    title="Trending image"></a>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-9 col-xs-9">
                                                                <h4><a href="{{ url('/detail', [$item->id]) }}">{{ $item->title }}</a></h4>
                                                                <span class="date"><i class="fa fa-calendar-check-o"
                                                                        aria-hidden="true"></i> {{ \Carbon\Carbon::parse($item->created_at)->toDateString() }}</span>
                                                                        <p class="">{{ $item->content }}</p>
 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                @endforeach
                              
                            </div>
                        </div>
                        
                    </div>

                </div>
                <!--Sidebar Start Here -->

            </div>
        </div>
    </div>
@endsection
