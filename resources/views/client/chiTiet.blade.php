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
                                    </a>{{ $chiTiet->category_name }}</li>
                            </ul>


                        </div>
                        <div class="header-page-title">
                            <h1>TIN TỨC : {{ $chiTiet->category_name }}</h1>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-blog-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="utf_post_title-area">

                        {{-- <h1 class="utf_post_title" ><a href="#"></a></h1> --}}
                        <h1 class="title-detail">{{ $chiTiet->title }}</h1>
                        <blockquote>

                            <p>
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                                {{ $chiTiet->content }}
                                <i class="fa fa-quote-right" aria-hidden="true"></i>
                            </p>
                        </blockquote>

                        <div class="single-image text-center">
                            <img src="{{ $chiTiet->image }}" alt="Blog single photo">
                        </div>
                        <?php
                        
                        $content = $chiTiet->summary;
                        
                        $paragraphs = explode('. ', $content);
                        
                        $lineCounter = 0;
                        
                        foreach ($paragraphs as $line) {
                            echo "<p >$line.</p>";
                        
                            $lineCounter++;
                        
                            if ($lineCounter % 5 == 0) {
                                echo "<div style='margin-bottom: 20px;'></div>";
                            }
                        }
                        ?>


                        {{-- <blockquote class="card-body">
                    <p class="Normal" style=" line-height: 2; ">{{$chiTiet->summary}}</p> 
                </blockquote> --}}

                        <div class="share-section">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="share-link">
                                    <li class="hvr-bounce-to-right"><a href="#"> Tags:</a></li>
                                    @foreach ($postWithTags as $item)
                                        {{-- @dd($item); --}}


                                        <li class="hvr-bounce-to-right"><a
                                                href="{{ url('/chuDe', [$item->tags_id]) }}">{{ $item->tag_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <hr>

                        <div class="like-section">
                            <div class="row">

                                <h3 class="title-bg">BẠN CÓ THỂ THÍCH</h3>
                                <hr>
                                <div class="row">
                                    @foreach ($tuongtu as $item)
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="popular-post-img">
                                                <a href="{{ url('/detail', [$item->id]) }}"><img src="{{ $item->image }}"
                                                        alt="Blog single photo"></a>
                                            </div>
                                            <h3>
                                                <a href="{{ url('/detail', [$item->id]) }}">{{ $item->title }}</a>
                                            </h3>
                                            <span class="date"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                {{ \Carbon\Carbon::parse($item->created_at)->toDateString() }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="author-comment">
                                <h3 class="title-bg">Recent Comments</h3>

                                @foreach ($bl as $item)
                                    @if ($item->comment_id !== null)
                                        <ul>
                                            <li>
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                        <div class="image-comments"><img src="/client/images/single/3.jpg"
                                                                alt="Blog single photo"></div>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                                        <span class="reply"> <span class="date"><i
                                                                    class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                                {{ $item->comment_date }}</span></span>
                                                        <div class="dsc-comments">
                                                            <h4>{{ $item->comment_user }}</h4>
                                                            <p>{{ $item->comment_content }}</p>
                                                            <a href="#"> Reply</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @if ($item->reply_id !== null)
                                                <li>
                                                    <div class="row">
                                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                            <div class="image-comments"><img
                                                                    src="/client/images/single/3.jpg"
                                                                    alt="Blog single photo"></div>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                                            <span class="reply"> <span class="date"><i
                                                                        class="fa fa-calendar-check-o"
                                                                        aria-hidden="true"></i>
                                                                    {{ $item->reply_date }}</span></span>
                                                            <div class="dsc-comments">
                                                                <h4>{{ $item->reply_user }}</h4>
                                                                <p>{{ $item->reply_content }}</p>
                                                                <a href="#"> Reply</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                    @else
                                        <p>Không có bình luận nào</p>
                                    @endif
                                @endforeach
                            </div>


                            <form action="{{ route('comment.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" value="11">
                                <input type="hidden" name="user_id" value="1"> 
                                <div class="form-group">
                                    <textarea name="content" class="form-control" rows="4" placeholder="Nhập bình luận của bạn..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Gửi Bình Luận</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endsection
