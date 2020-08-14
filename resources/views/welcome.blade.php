@extends('layouts.site.master')

@push('css')

@endpush

@section('content')
	<!-- Start banner Area -->
	<section class="banner-area">
		<div class="container box_1170">
			<div class="row fullscreen d-flex align-items-center justify-content-center" style="min-height: 400px">
				<div class="banner-content text-center col-lg-8">
					<h1>
						Learn Code, Enjoy Coding!
					</h1
					>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start Post Silder Area -->
	<section class="post-slider-area">
		<div class="container box_1170">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="owl-carousel active-post-carusel">
						<div class="post-box mb-30">
							<div class="d-flex">
								<div>
									<a href="#">
										<img src="assets/site/img/author/a1.png" alt="">
									</a>
								</div>
								<div class="post-meta">
									<div class="meta-head">
										<a href="#">Marvel Maison</a>
									</div>
									<div class="meta-details">
										<ul>
											<li>
												<a href="#">
													<span class="lnr lnr-calendar-full"></span>
													13th Oct, 2018
												</a>
											</li>
											<li>
												<a href="#">
													<span class="lnr lnr-picture"></span>
													Image Post
												</a>
											</li>
											<li>
												<a href="#">
													<span class="lnr lnr-coffee-cup"></span>
													Food & Travel
												</a>
											</li>
											<li>
												<a href="#">
													<span class="lnr lnr-bubble"></span>
													03 Comments
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
							<div class="post-btn">
								<a href="#" class="primary-btn text-uppercase">Read More</a>
							</div>
						</div>

						<div class="post-box mb-30">
							<div class="d-flex">
								<div>
									<a href="#">
										<img src="assets/site/img/author/a1.png" alt="">
									</a>
								</div>
								<div class="post-meta">
									<div class="meta-head">
										<a href="#">Marvel Maison</a>
									</div>
									<div class="meta-details">
										<ul>
											<li>
												<a href="#">
													<span class="lnr lnr-calendar-full"></span>
													13th Oct, 2018
												</a>
											</li>
											<li>
												<a href="#">
													<span class="lnr lnr-picture"></span>
													Image Post
												</a>
											</li>
											<li>
												<a href="#">
													<span class="lnr lnr-coffee-cup"></span>
													Food & Travel
												</a>
											</li>
											<li>
												<a href="#">
													<span class="lnr lnr-bubble"></span>
													03 Comments
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
								dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
							<div class="post-btn">
								<a href="#" class="primary-btn text-uppercase">Read More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Start Post Silder Area -->

	<!-- Start main body Area -->
	<div class="main-body section-gap mt--30">
		<div class="container box_1170">
			<div class="row">
				<div class="col-lg-8 post-list">
					<!-- Start Post Area -->
					<section class="post-area">
                        @foreach($posts as $post)
						    <div class="single-post-item">
							<figure>
							<img class="post-img" src="{{url($post->image)}}" height="340" width="700"
                                 alt="">
							</figure>
							<h3>
								<a href="">{{$post->title}}</a>
							</h3>
							<p> {!! Str::limit($post->editor1, 250)!!} </p>
							<a href="{{ route('post.details',$post->slug) }}" class="primary-btn text-uppercase mt-15">continue Reading</a>
							<div class="post-box" >
								<div class="d-flex">
									<div>
										<a href="#">
											<img src="{{url($post->user->image)}}" alt="" height="50" width="50">
										</a>
									</div>
									<div class="post-meta">
										<div class="meta-head">
											<a href="#">{{$post->user->name}}</a>
										</div>
										<div class="meta-details">
											<ul>
												<li>
													<a href="#">
														<span class="lnr lnr-calendar-full"></span>
                                                        {{$post->created_at->diffForHumans()}}
													</a>
												</li>
												<li>
													<a href="#">
														<span class="lnr lnr-picture"></span>
														@foreach ($post->categories as $category )
															{{$category->name}},
														@endforeach
													</a>
												</li>
												<li>
													<a href="#">
														<span class="lnr lnr-bubble"></span>
														{{$post->comments->count()}} Comments
													</a>
												</li>
												<li>
													<a href="#">
														<span class="lnr lnr-eye"></span>
														{{$post->view_count}} Views
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
                        @endforeach

						<nav class="blog-pagination justify-content-center d-flex">
							<ul class="pagination">
                                {{$posts->links()}}
							</ul>
						</nav>

					</section>
					<!-- Start Post Area -->
				</div>

				<div class="col-lg-4 sidebar">
					<div class="single-widget search-widget">
						<form class="example" action="#" style="margin:auto;max-width:300px">
							<input type="text" placeholder="Search Posts" name="search2">
							<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>

					 <div class="single-widget popular-posts-widget">
                        <h4 class="title">Recent Posts</h4>
                        <div class="blog-list ">
                            @foreach($latestPost as $post)
                            <div class="single-popular-post d-flex flex-row">
                                <div class="popular-thumb">
                                    <img class="img-fluid" src="{{ url($post->image) }}" width="100" height="60" alt="">
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

					<div class="single-widget popular-posts-widget">
						<h4 class="title">Popular Posts</h4>
						<div class="blog-list ">
							<div class="single-popular-post d-flex flex-row">
								<div class="popular-thumb">
									<img class="img-fluid" src="img/blog/r1.jpg" alt="">
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
									<img class="img-fluid" src="asset/site/img/blog/r2.jpg" alt="">
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
									<img class="img-fluid" src="asset/site/img/blog/r3.jpg" alt="">
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
									<img class="img-fluid" src="asset/site/img/blog/r4.jpg" alt="">
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

					<div class="single-widget category-widget">
						<h4 class="title">All Categories</h4>
						<ul>
                            @foreach($categories as $category)
							<li><a href="{{ route('post.category',$category->slug) }}" class="justify-content-between align-items-center d-flex">
									<p>{{$category->name}}</p> <span>{{$category->posts()->count()}}</span>
								</a></li>
                            @endforeach
						</ul>
					</div>

                    <div class="single-widget category-widget">
                        <h4 class="title">All Tags</h4>
                        <ul>
                            @foreach($tags as $tag)
                                <li><a href="{{ route('post.tag',$tag->slug) }}" class="justify-content-between align-items-center d-flex">
                                        <p>{{$tag->name}}</p> <span>{{$tag->posts()->count()}}</span>
                                    </a></li>
                            @endforeach
                        </ul>
                    </div>

					<div class="single-widget newsletter-widget">
						<h4 class="title">Newsletter</h4>
						<div >
							<form  action="{{route('subscriber.store')}}" method="POST">
                                @csrf
								<div class="form-group" style="width: 100%">
									<input name="email" placeholder="Email Address" required="" type="email">
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
	</div>
@endsection

@push('js')

@endpush
