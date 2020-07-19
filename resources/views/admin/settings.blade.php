
@extends('layouts.admin.master')

@section('title','Dashboard')

@push('css')

@endpush

@section('content')

<div class="content-page">

<div class="content">
    <div class="wraper container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="bg-picture text-center" style="background-image:url
                ('../../images/big/bg.jpg')">
                    <div class="bg-picture-overlay"></div>
                    <div class="profile-info-name">
                        <img src="images/avatar-1.jpg" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                        <h3 class="text-white">John Deon</h3>
                    </div>
                </div>
                <!--/ meta -->
            </div>
        </div>
        <div class="row user-tabs">
            <div class="col-lg-6 col-md-9 col-sm-9">
                <ul class="nav nav-tabs tabs">
                    <li class="active tab">
                        <a href="#home-2" data-toggle="tab" aria-expanded="false" class="active">
                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                            <span class="hidden-xs">About Me</span>
                        </a>
                    </li>
                    <li class="tab">
                        <a href="#messages-2" data-toggle="tab" aria-expanded="true">
                            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                            <span class="hidden-xs">Update Password</span>
                        </a>
                    </li>
                    <li class="tab" >
                        <a href="#settings-2" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-cog"></i></span>
                            <span class="hidden-xs">Update Profile</span>
                        </a>
                    </li>
                    <div class="indicator"></div></ul>
            </div>
            <div class="col-lg-6 col-md-3 col-sm-3 hidden-xs">
                <div class="pull-right">
                    <div class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle btn-rounded btn btn-primary waves-effect waves-light" href="#"> Following <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li><a href="#">Poke</a></li>
                            <li><a href="#">Private message</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Unfollow</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <div class="tab-content profile-tab-content">
                    <div class="tab-pane active" id="home-2">
                        <div class="row">
                            <div class="col-md-4">
                                <!-- Personal-Information -->
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Personal Information</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="about-info-p">
                                            <strong>Full Name</strong>
                                            <br/>
                                            <p class="text-muted">{{Auth::user()->name}}</p>
                                        </div>
                                        <div class="about-info-p">
                                            <strong>Full Name</strong>
                                            <br/>
                                            <p class="text-muted">{{Auth::user()->username}}</p>
                                        </div>
                                        <div class="about-info-p">
                                            <strong>Mobile</strong>
                                            <br/>
                                            <p class="text-muted">(123) 123 1234</p>
                                        </div>
                                        <div class="about-info-p">
                                            <strong>Email</strong>
                                            <br/>
                                            <p class="text-muted">{{Auth::user()->email}}</p>
                                        </div>
                                        <div class="about-info-p m-b-0">
                                            <strong>Location</strong>
                                            <br/>
                                            <p class="text-muted">USA</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Personal-Information -->
                            </div>

                            <div class="col-md-8">
                                <!-- Personal-Information -->
                                <div class="panel panel-default panel-fill">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">About</h3>
                                    </div>
                                    <div class="panel-body">
                                      <p>{{Auth::user()->about}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="messages-2">
                        <!-- Personal-Information -->
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading">
                                <h3 class="panel-title">My Projects</h3>
                            </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="Password">Old Password</label>
                                        <input type="password" placeholder="8 - 15 Characters" id="Password"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Password">New Password</label>
                                        <input type="password" placeholder="8 - 15 Characters" id="Password"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="RePassword">Re-Password</label>
                                        <input type="password" placeholder="8 - 15 Characters" id="RePassword"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Personal-Information -->
                    </div>


                    <div class="tab-pane" id="settings-2">
                        <!-- Personal-Information -->
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading">
                                <h3 class="panel-title">Edit Profile</h3>
                            </div>
                            <div class="panel-body">
                                <form  action="{{route('admin.update.profile')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" value="{{Auth::user()->name}}" name="name" id="name"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input type="email" value="{{Auth::user()->email}}" name="email" id="Email"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="Username">Username</label>
                                        <input type="text" name="username" value="{{Auth::user()->username}}"
                                               id="Username"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="RePassword">Profile Image</label>
                                        <input type="file"  id="image" name="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="about">About Me</label>
                                        <textarea style="height: 125px;" id="about"
                                                  class="form-control" name="about">{{Auth::user()->about}}</textarea>
                                    </div>
                                    <button class="btn btn-primary waves-effect waves-light w-md"
                                            type="submit">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

@endsection

@push('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function deleteSub(id) {
    swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
                swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                });
            } else {
                swal("Your imaginary file is safe!");
            }
        });
}

</script>

@endpush
