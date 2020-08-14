@extends('layouts.admin.master')
@section('title','Dashboard')
@section('contact') active @endsection
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
                        <h4 class="pull-left page-title">All Messages</h4>
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
                                                <th>no.</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Created-at</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($messages as $message)
                                                <tr>
                                                    <td>{{ $loop->index+ 1}}</td>
                                                    <td>{{ $message->name }}</td>
                                                    <td>{{ $message->email }}</td>
                                                    <td>{{ $message->subject }}</td>
                                                    <td>{{ $message->message }}</td>
                                                    <td>{{ $message->created_at }}</td>
                                                    <td>
                                                        <button class="btn btn-danger btn-sm" title="Delete button"
                                                                type="button" onclick="deleteSub({{$message->id}})">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                        <form id="delete-form-{{$message->id}}"
                                                              action="{{route('admin.subscribers.destroy',$message->id)}}" method="POST">
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
