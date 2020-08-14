@extends('layouts.site.master') @push('css') @endpush @section('content')
<section class="banner-area relative" style="height: 330px;">
    <div class="overlay overlay-bg"></div>
    <div class="container box_1170">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12" style="margin-top: 10px;">
                <h1 class="text-white">
                    {{ $categories->name }}
                </h1>
                <p class="text-white link-nav"><a href="index.html">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="category.html"> Category</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start main body Area -->
<div class="main-body section-gap">
    <div class="container box_1170">
        <div class="row">
            <div class="col-lg-8 post-list">
                <!-- Start Post Area -->
                <section class="post-area">
                    <div class="row">
                        @if($posts->count() > 0) @foreach($posts as $post)
                        <div class="col-lg-6 col-md-6">
                            <div class="single-post-item short">
                                <figure>
                                    <img class="post-img img-fluid" src="{{ url($post->image) }}" alt="" />
                                </figure>
                                <h3>
                                    <a href="{{ route('post.details',$post->slug) }}">{{ $post->title }}</a>
                                </h3>
                                <p>{!! Str::limit($post->editor1,'100') !!}</p>
                                <a href="{{ route('post.details',$post->slug) }}" class="primary-btn text-uppercase mt-15">continue Reading</a>
                                <div class="post-box" id="post-box">
                                    <div class="d-flex">
                                        <div>
                                            <a href="#">
                                                <img src="{{ url($post->user->image) }}" height="50" width="50" />
                                            </a>
                                        </div>
                                        <div class="post-meta">
                                            <div class="meta-head">
                                                <a href="#">{{ $post->user->name }}</a>
                                            </div>
                                            <div class="meta-details">
                                                <ul>
                                                    <li>
                                                        <a href="#">
                                                            <span class="lnr lnr-calendar-full"></span>
                                                            {{ $post->created_at->diffForHumans() }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <span class="lnr lnr-bubble"></span>
                                                            {{ $post->comments->count() }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach 
                        
                        @else
                        <div class="col-lg-12 col-md-12">
                            <div class="single-post-item short text-center" style="background: #ddd;">
                                <strong style="padding: 20px;">No Post Found :(</strong>
                            </div>
                        </div>
                        @endif

                        <div class="col-lg-12">
                            <nav class="blog-pagination justify-content-center d-flex">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Previous">
                                            <span aria-hidden="true">
                                                <span class="lnr lnr-arrow-left"></span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a href="#" class="page-link">01</a></li>
                                    <li class="page-item active"><a href="#" class="page-link">02</a></li>
                                    <li class="page-item"><a href="#" class="page-link">03</a></li>
                                    <li class="page-item"><a href="#" class="page-link">04</a></li>
                                    <li class="page-item"><a href="#" class="page-link">09</a></li>
                                    <li class="page-item">
                                        <a href="#" class="page-link" aria-label="Next">
                                            <span aria-hidden="true">
                                                <span class="lnr lnr-arrow-right"></span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-lg-4 sidebar">
                <div class="single-widget search-widget">
                    <form class="example" action="#" style="margin: auto; max-width: 300px;">
                        <input type="text" placeholder="Search Posts" name="search2" />
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <div class="single-widget category-widget">
                    <h4 class="title">All Categories</h4>
                    <ul>
                        @foreach($cat as $row)
                        <li>
                            <a href="{{ route('post.category',$row->slug) }}" class="justify-content-between align-items-center d-flex">
                                <p>{{ $row->name }}</p>
                                <span>{{ $row->posts()->count() }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection @push('js') @endpush
