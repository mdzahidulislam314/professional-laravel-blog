@extends('layouts.admin.master')

@section('title','Dashboard')
@section('post') active @endsection

@section('penPost') active @endsection

@push('css')@endpush

@section('content')

<div class="content-page">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">All Pending!</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Moltran</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Views</th>
                                            <th>Published<br>Sataus</th>
                                            <th>Aproved<br>Status</th>
                                            <th>Created-at</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $loop->index+ 1}}</td>
                                                <td>{{ Str::limit($post->title,'20')}}</td>
                                                <td>{{ $post->user->name }}</td>
                                                <td>{{ $post->view_count }}</td>
                                                <td>
                                                    @if($post->status == true)
                                                    <span class="text-success" style="font-size: 23px">
                                                        <i class="md md-remove-red-eye"></i>
                                                    </span>
                                                    @else
                                                        <span class="text-warning" style="font-size: 23px">
                                                            <i class="md md-visibility-off"></i>
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($post->is_approved == true)
                                                    <span  class="text-primary" style="font-size: 22px">
                                                        <i class="fa fa-toggle-on"></i>
                                                    </span>
                                                    @else
                                                        <span class="text-danger" style="font-size: 22px">
                                                            <i class="fa fa-toggle-off"></i>
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>{{ $post->created_at->format('d-m-Y h:i A') }}</td>
                                                <td>
                                                    @if($post->is_approved == false)
                                                        <button type="button" data-toggle="tooltip"
                                                                data-placement="top"
                                                                data-original-title="Click Here For Approve This
                                                                Post!"
                                                                class="btn btn-success btn-sm
                                                        waves-effect" onclick="document.getElementById('form-id').submit()">
                                                        <i class="md md-done-all"></i>
                                                        </button>
                                                        <form method="post" action="{{ route('admin.post.approve',$post->id) }}" id="form-id" style="display: none">
                                                            @csrf
                                                            @method('PUT')
                                                        </form>
                                                    @endif
                                                    <a href="{{route('admin.post.edit',$post->id)}}" class="btn btn-sm btn-primary"
                                                       title="Edit button">
                                                       <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="{{route('admin.post.show',$post->id)}}" class="btn btn-sm btn-info"
                                                       title="View button">
                                                       <i class="md md-remove-red-eye"></i>
                                                    </a>
                                                    <button class="btn btn-danger btn-sm" title="Delete button" type="button" onclick="deletepost({{$post->id}})">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                    <form id="delete-form-{{$post->id}}"
                                                          action="{{route('admin.post.destroy',$post->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
        function deletepost(id) {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                // icon: "warning",
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        } );
    </script>

@endpush
