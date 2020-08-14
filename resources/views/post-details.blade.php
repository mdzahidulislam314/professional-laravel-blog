@extends('layouts.site.master')

@push('css')

@endpush

@section('content')

<section class="banner-area relative" style="height: 330px;">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12" style="margin-top: 10px;">
                <h1 class="text-white">
                    Blog Details
                </h1>
                <p class="text-white link-nav"><a href="index.html">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="blog-details.html"> Blog Details</a></p>
            </div>
        </div>
    </div>
</section>

<section class="blog_area section-gap single-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="main_blog_details">
                    <img class="img-fluid" src="{{ url($post->image) }}" alt="" />
                    <h4>{{ $post->title }}</h4>
                    <div class="user_details">
                        <div class="float-left">
                            @foreach($post->categories as $category)
                            <a href="{{ route('post.category',$category->slug) }}">{{$category->name}}</a>
                            @endforeach
                        </div>
                        <div class="float-right">
                            <div class="media">
                                <div class="media-body">
                                    <h5>{{ $post->user->name }}</h5>
                                <p>{{$post->created_at->format('jS F Y h:i A')}}</p>
                                </div>
                                <div class="d-flex">
                                    <img src="{{ url($post->user->image) }}" height="30" width="30" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>{!! $post->editor1 !!}</p>
                    <div class="news_d_footer">
                        <a href="#" style="margin-right: 10px"><i class="lnr lnr lnr-heart"></i>4 likes</a>
                        <a href="#"><i class="lnr lnr lnr-eye"></i>{{$post->view_count}} Views</a>
                        <a class="justify-content-center ml-auto" href="#">
                            <i class="lnr lnr lnr-bubble"></i>{{$post->comments()->count()}} Comments</a>
                        <div class="news_socail ml-auto">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-rss"></i></a>
                        </div>
                    </div>
                </div>
                <div class="navigation-area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                            <div class="thumb">
                                <a href="#"><img class="img-fluid" src="/assets/site/img/blog/prev.jpg" alt="" /></a>
                            </div>
                            <div class="arrow">
                                <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
                            </div>
                            <div class="detials">
                                <p>Prev Post</p>
                                <a href="#">
                                    <h4>A Discount Toner</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                            <div class="detials">
                                <p>Next Post</p>
                                <a href="#">
                                    <h4>Cartridge Is Better</h4>
                                </a>
                            </div>
                            <div class="arrow">
                                <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
                            </div>
                            <div class="thumb">
                                <a href="#"><img class="img-fluid" src="/assets/site/img/blog/next.jpg" alt="" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comments-area">
                    <h4>{{$post->comments()->count()}} Comments</h4>

                    @if ($post->comments()->count() > 0)
                        @foreach ($post->comments as $comment)
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="{{url($comment->user->image)}}" height="60" width="60" />
                                    </div>
                                    <div class="desc">
                                    <h5><a href="#">{{$comment->user->name}}</a></h5>
                                        <p class="date">{{$comment->created_at->format('jS F Y h:i A')}}</p>
                                        <p class="comment">
                                            {{$comment->comment}}
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <p>No Comment This Post</p>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="comment-form">
                    @guest
                        <div class="comment" style="background: #ddd; color:#8050FA;padding:5px">
                            <p>For post a new comment. You need to login first. <a href="{{ route('login') }}">Login</a></p>
                        </div>
                    @else
                    <h4>Leave a Comment</h4>
                    <form method="POST" action="{{route('comment.store',$post->id)}}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control mb-10" rows="5" name="comment" placeholder="Type your Comment here...." required=""></textarea>
                        </div>
                        <button type="submit" class="primary-btn submit_btn text-uppercase">Submit Comment</button>
                    </form>
                    @endguest
                </div>
            </div>

            <div class="col-lg-4 sidebar">
                <div class="single-widget search-widget">
                    <form class="example" action="#" style="margin: auto; max-width: 300px;">
                        <input type="text" placeholder="Search Posts" name="search2" />
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <div class="single-widget popular-posts-widget">
                    <h4 class="title">Popular Posts</h4>
                    <div class="blog-list">
                        <div class="single-popular-post d-flex flex-row">
                            <div class="popular-thumb">
                                <img class="img-fluid" src="/assets/site/img/blog/r1.jpg" alt="" />
                            </div>
                            <div class="popular-details">
                                <a href="blog-details.html">
                                    <h4>Space Final Frontier</h4>
                                </a>
                                <p class="text-uppercase">02 hours ago</p>
                            </div>
                        </div>
                        <div class="single-popular-post d-flex flex-row">
                            <div class="popular-thumb">
                                <img class="img-fluid" src="/assets/site/img/blog/r2.jpg" alt="" />
                            </div>
                            <div class="popular-details">
                                <a href="blog-details.html">
                                    <h4>The Amazing Hubble</h4>
                                </a>
                                <p class="text-uppercase">02 hours ago</p>
                            </div>
                        </div>
                        <div class="single-popular-post d-flex flex-row">
                            <div class="popular-thumb">
                                <img class="img-fluid" src="/assets/site/img/blog/r3.jpg" alt="" />
                            </div>
                            <div class="popular-details">
                                <a href="blog-details.html">
                                    <h4>Astronomy Astrology</h4>
                                </a>
                                <p class="text-uppercase">02 hours ago</p>
                            </div>
                        </div>
                        <div class="single-popular-post d-flex flex-row">
                            <div class="popular-thumb">
                                <img class="img-fluid" src="/assets/site/img/blog/r4.jpg" alt="" />
                            </div>
                            <div class="popular-details">
                                <a href="blog-details.html">
                                    <h4>Asteroids telescope</h4>
                                </a>
                                <p class="text-uppercase">02 hours ago</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="single-widget popular-posts-widget">
                    <h4 class="title">Recent Posts</h4>
                    <div class="blog-list">
                        @foreach($latestPost as $post)
                        <div class="single-popular-post d-flex flex-row">
                            <div class="popular-thumb">
                                <img class="img-fluid" src="{{ url($post->image) }}" width="100" height="60" alt="" />
                            </div>
                            <div class="popular-details">
                                <a href="{{ route('post.details',$post->slug) }}">
                                    <h4>{{ Str::limit($post->title, 15)}}</h4>
                                </a>
                                <p class="text-uppercase">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="single-widget category-widget">
                    <h4 class="title">Post Tags</h4>
                    <ul>
                        @foreach($post->tags as $tag)
                        <li>
                            <a href="{{ route('post.tag',$tag->slug) }}" class="justify-content-between align-items-center d-flex">
                                <p>{{ $tag->name }}</p>
                                <span>{{ $tag->posts()->count() }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="single-widget newsletter-widget">
                    <h4 class="title">Newsletter</h4>
                    <div>
                        <form action="{{route('subscriber.store')}}" method="POST">
                            @csrf
                            <div class="form-group" style="width: 100%;">
                                <input name="email" placeholder="Email Address" required="" type="email" />
                                <button type="submit" class="primary-btn text-uppercase">
                                    Subscribe Now
                                    <span class="lnr lnr-arrow-right"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('js')

@endpush
