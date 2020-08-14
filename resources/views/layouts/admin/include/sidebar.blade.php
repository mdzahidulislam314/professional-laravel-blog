
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="{{url(Auth::user()->image)}}" alt="" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{Auth::user()
                    ->username}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{Auth::user()->role->id == 1 ? route('admin.settings') : route('user.settings') }}"><i class="md md-face-unlock"></i> Profile<div
                                    class="ripple-wrapper"></div></a></li>
                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="md md-settings-power"></i>
                                 Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                @if (Request::is('admin*'))
                <li class="">
                    <a href="{{route('user.dashboard')}}" class="waves-effect @yield('dashboard')"><i class="md md-home"></i><span>Dashboard</span></a>
                </li>

                <li class="">
                    <a href="{{route('home')}}" target="_blank" class="waves-effect"><i class="md md-remove-red-eye"></i><span>View Site</span></a>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect @yield('post')"><i class="md md-speaker-notes"></i><span> Posts </span><span class="pull-right"><i class="md md-add" id="icon"></i></span></a>
                    <ul class="list-unstyled">

                        <li class="@yield('allpost')"><a href="{{route('admin.post.index')}}"><i class="md md-arrow-forward" id="icon"></i>All Posts</a></li>

                        <li class="@yield('addpost')"><a href="{{route('admin.post.create')}}"><i class="md md-arrow-forward" id="icon"></i>Add New</a></li>

                        <li class="@yield('penPost')"><a href="{{route('admin.post.pending')}}"><i class="md md-arrow-forward" ></i>Pending Posts</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('admin.category.index')}}" class="waves-effect @yield('cat')"><i class="md md-event"></i><span> Categories </span></a>
                </li>
                <li>
                    <a href="{{route('admin.tag.index')}}" class="waves-effect @yield('tag')"><i class="md md-local-offer"></i><span> Tags </span></a>
                </li>

                <li>
                    <a href="{{route('admin.subscribers.index')}}" class="waves-effect @yield('subscriber')"><i class="md md-mail"></i><span> Subscribers </span></a>
                </li>  
                <li>
                    <a href="{{route('admin.author.index')}}" class="waves-effect @yield('author')"><i class="md md-timer-auto"></i><span> Authors </span></a>
                </li>     
                <li>
                    <a href="{{route('admin.comment.index')}}" class="waves-effect @yield('comment')"><i class="md md-comment"></i><span> Comments </span></a>
                </li>
                <li>
                    <a href="{{route('admin.contact.index')}}" class="waves-effect @yield('contact')"><i class="md md-comment"></i><span> Message </span></a>
                </li>
                <li>
                    <a href="{{route('admin.subscribers.index')}}" class="waves-effect @yield('')"><i class="md md-favorite"></i><span> Favorite </span></a>
                </li>

                @endif

                @if (Request::is('user*'))
                <li>
                    <a href="{{route('user.dashboard')}}" class="waves-effect @yield('dashboard')"><i class="md md-home"></i><span> Dashboard
                        </span></a>
                </li>
                
                <li class="">
                    <a href="{{route('home')}}" target="_blank" class="waves-effect"><i class="md md-remove-red-eye"></i><span>View Site</span></a>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect @yield('post')"><i class="md md-speaker-notes"></i><span> Posts </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li class="@yield('allpost')"><a href="{{route('user.posts.index')}}">All Posts</a></li>
                        <li class="@yield('addpost')"><a href="{{route('user.posts.create')}}">Add New</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('user.comment.index')}}" class="waves-effect @yield('comment')"><i class="md md-event"></i><span> Comments </span></a>
                </li>

                <li>
                    <a href="" class="waves-effect"><i class="md md-event"></i><span> Favorite Post </span></a>
                </li>

                <li>
                    <a href="" class="waves-effect"><i class="md md-event"></i><span> Settings </span></a>
                </li>
                @endif
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->
