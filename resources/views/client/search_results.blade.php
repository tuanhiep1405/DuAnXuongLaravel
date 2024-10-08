@extends('client.layouts.master')

@section('content')
    <h2 class="text-center mt-3">Kết quả tìm kiếm cho: "{{ $query }}"</h2>

    @if ($posts->isEmpty())
        <p>Không có bài viết nào phù hợp với từ khóa tìm kiếm.</p>
    @else
        <div class="blog-page-area gallery-page category-page">
            <div class="container">
                <div class="row">
                    <div class="item-box-light-md-less30 ie-full-width">
                        @foreach ($posts as $post)
                            <div class="row">
                                <ul>
                                    <li>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="carousel-inner">
                                                <div class="blog-image">
                                                    <div class="single-image text-center">
                                                        <img src="{{ $post->image }}" alt="Blog single photo">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <h3><a href="{{ url('/detail', [$post->id]) }}">{{ $post->title }}</a>
                                            </h3>
                                            <span class="date"><i class="fa fa-calendar-check-o"
                                                    aria-hidden="true"></i>{{ \Carbon\Carbon::parse($post->created_at)->toDateString() }}</span>
                                            <span class="like"><a href="#"><i class="fa fa-comment-o"
                                                        aria-hidden="true"></i> {{ $post->views }} </a></span>
                                            <p>{{ $post->content }}</p>
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
    @endif

@endsection
