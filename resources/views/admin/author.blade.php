@extends('layouts.admin.master')
@section('title','Dashboard')
@section('author') active @endsection
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
                        <h4 class="pull-left page-title">All Authors</h4>
                        <span class="badge badge-primary">{{ $authors->count() }}</span>
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
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Posts</th>
                                                <th>Comments</th>
                                                {{-- <th>Favorite Posts</th> --}}
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($authors as $author)
                                                <tr>
                                                    <td>{{ $loop->index+ 1 }}</td>
                                                    <td>{{ $author->name }}</td>
                                                    <td>{{ $author->posts_count }}</td>
                                                    <td>{{ $author->comments_count }}</td>
                                                    {{-- <td>{{ $author->favorite_posts_count }}</td> --}}
                                                    <td>{{ $author->created_at->toDateString() }}</td>
                                                    <td>
                                                        <button class="btn btn-danger btn-sm" title="Delete button"
                                                                type="button" onclick="deleteSub({{$author->id}})">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                        <form id="delete-form-{{$author->id}}"
                                                              action="{{route('admin.author.destroy',$author->id)}}" method="POST">
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable();
        } );
    </script>

@endpush
