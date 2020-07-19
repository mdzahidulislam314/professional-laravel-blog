<!-- Start header Area -->
<header id="header">
    <div class="container box_1170 main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="index.html"><img src="assets/site/img/logo.png" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="index.html">Home</a></li>
                    <li><a href="category.html">Category</a></li>
                    <li><a href="archive.html">Archive</a></li>

                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @else
                    <li class="menu-has-children"><a href="">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul>
                            <li><a href="" onclick="event.preventDefault();document
                            .getElementById('logout-form').submit();"
                                >LOGOUT</a></li>
                            @if(Auth::user()->role_id == 1)
                                <li><a href="{{route('admin.dashboard')}}">DASHBOARD</a></li>
                            @endif
                            @if (Auth::user()->role_id == 2)
                                <li><a href="{{route('user.dashboard')}}">DASHBOARD</a></li>
                            @endif
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                    @endguest
                    <li class="menu-has-children"><a href="">Blog</a>
                        <ul>
                            <li><a href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- End header Area -->
