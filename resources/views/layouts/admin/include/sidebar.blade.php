
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="{{url('assets/admin/images/users/avatar-1.jpg')}}" alt="" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{Auth::user()
                    ->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
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
                <li>
                    <a href="{{route('user.dashboard')}}" class="waves-effect {{ Request::is('admin/dashboard') ? 'active' : ''}}"><i class="md md-home"></i><span> Dashboard </span></a>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="ion-android-note"></i><span> Posts </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">

                        <li class="{{ Request::is('admin/post/index') ? 'active' : ''}}"><a href="{{route('admin.post.index')}}"><i class="ion-ios7-arrow-forward"></i>All Posts</a></li>

                        <li class="{{ Request::is('admin/post/create') ? 'active' : ''}}"><a href="{{route('admin.post.create')}}"><i class="ion-ios7-arrow-forward"></i>Add New Post</a></li>

                        <li><a href="{{route('admin.post.pending')}}"><i class="ion-ios7-arrow-forward"></i>Pending
                                Posts</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('admin.category.index')}}" class="waves-effect {{ Request::is('admin/category') ? 'active' : ''}}"><i class="md md-event"></i><span> Categories </span></a>
                </li>
                <li>
                    <a href="{{route('admin.tag.index')}}" class="waves-effect {{ Request::is('admin/tag') ? 'active' : ''}}"><i class="ion-ios7-pricetags"></i><span> Tags </span></a>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-mail"></i><span> Partial </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="inbox.html">Categories</a></li>
                        <li><a href="email-compose.html">Tags</a></li>
                    </ul>
                </li>
                @endif

                @if (Request::is('user*'))
                <li>
                    <a href="{{route('user.dashboard')}}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard
                        </span></a>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-mail"></i><span> Posts </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{route('user.posts.index')}}">All Posts</a></li>
                        <li><a href="{{route('user.posts.create')}}">Create New</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-mail"></i><span> Partial </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="inbox.html">Categories</a></li>
                        <li><a href="email-compose.html">Tags</a></li>
                    </ul>
                </li>
                <li>
                    <a href="calendar.html" class="waves-effect"><i class="md md-event"></i><span> Settings </span></a>
                </li>
                @endif
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->
