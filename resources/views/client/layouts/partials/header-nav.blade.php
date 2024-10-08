<div class="header-bottom-area" id="sticky">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <div class="navbar-header">
                    <div class="col-sm-8 col-xs-8 padding-null">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="col-sm-4 col-xs-4 hidden-desktop text-right search">
                        <a href="#search-mobile" data-toggle="collapse" class="search-icon"><i class="fa fa-search"
                                aria-hidden="true"></i></a>
                        <div id="search-mobile" class="collapse search-box">
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                    </div>
                </div>
                <div class="main-menu navbar-collapse collapse">
                    <nav>
                        <ul>
                            <li><a href="{{ url('/') }}" class="has dropdown-toggle">Trang chủ </a> </li>

                            @foreach ($cate as $item)
                                <li><a href="{{ url('/category', [$item->id]) }}">{{ $item->name }}</a></li>
                            @endforeach

                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-hidden text-center search hidden-mobile">
                <a href="#search" data-toggle="collapse" class="search-icon">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </a>
                <div id="search" class="collapse search-box">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="query" class="form-control" placeholder="Search..." required>
                    </form>
                </div>
            </div>
            
           


            </div>
        </div>
    </div>
</div>
