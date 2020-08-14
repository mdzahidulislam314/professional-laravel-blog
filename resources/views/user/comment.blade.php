@extends('layouts.admin.master')
@section('title','Dashboard')
@section('comment') active @endsection
@push('css')

@endpush

@section('content')

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">All Comments</h4>
                        {{-- <span class="badge badge-primary">{{ $comments->count() }}</span> --}}
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
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped ">
                                            <thead>
                                            <tr>
                                                <th>Comments info</th>
                                                <th>Post info</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($posts as $post)
                                                @foreach($post->comments as $comment)
                                                    <tr>
                                                        <td>
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img class="media-object" src="{{ url($comment->user->image) }}" width="64" height="64">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">{{ $comment->user->name }} <small>{{ $comment->created_at->diffForHumans() }}</small>
                                                                    </h4>
                                                                    <p>{{ $comment->comment }}</p>
                                                                    <a target="_blank" href="{{ route('post.details',$comment->post->slug) }}">Reply</a>
                                                                </div>
                                                            </div>
                                                        </td>
            
                                                        <td>
                                                            <div class="media">
                                                                <div class="media-right">
                                                                    <a target="_blank" href="{{ route('post.details',$comment->post->slug) }}">
                                                                        <img class="media-object" src="{{url($comment->post->image)}}" width="64" height="64">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body" style="padding-left: 8px">
                                                                    <a target="_blank" href="{{ route('post.details',$comment->post->slug) }}">
                                                                        <h4 class="media-heading">{{Str::limit($comment->post->title,'40') }}</h4>
                                                                    </a>
                                                                    <p>by <strong>{{ $comment->post->user->name }}</strong></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-danger btn-sm" title="Delete button"
                                                                    type="button" onclick="deleteSub({{$comment->id}})">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                            <form id="delete-form-{{$comment->id}}"
                                                                  action="{{route('user.comment.destroy',$comment->id)}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
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
                       
                    } else {
                        
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
