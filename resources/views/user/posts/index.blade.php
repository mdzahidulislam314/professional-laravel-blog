@extends('layouts.admin.master')

@section('title','Dashboard')

@section('post') active @endsection
@section('allpost') active @endsection

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
                  <h4 class="pull-left page-title">All Posts</h4>
                  <a href="{{route('user.posts.create')}}" class="btn btn-primary btn-rounded
                    waves-effect waves-light m-b-5"><i class="fa fa-plus"></i> Add New</a>
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
                                        <th>Views</th>
                                        <th>Status</th>
                                        <th>Is-Approved</th>
                                        <th>Created-at</th>
                                        <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $loop->index+ 1}}</td>
                                        <td>{{ Str::limit($post->title,'20')}}</td>
                                        <td>{{ $post->view_count }}</td>
                                        <td class="text-center">
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
                                        <td class="text-center">
                                            @if($post->is_approved == true)
                                                <span class="text-primary" style="font-size: 22px">
                                                    <i class="fa fa-toggle-on"></i>
                                                </span>
                                            @else
                                                <span class="text-danger" style="font-size: 22px">
                                                    <i class="fa fa-toggle-off"></i>
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $post->created_at }}</td>
                                        <td class="text-center">
                                            <a href="{{route('user.posts.edit',$post->id)}}" class="btn btn-sm btn-primary"
                                                title="Edit button">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="{{route('user.posts.show',$post->id)}}" class="btn btn-sm btn-info"
                                                title="View button">
                                                <i class="md md-remove-red-eye"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm" title="Delete button" type="button" onclick="deletepost({{$post->id}})">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                            <form id="delete-form-{{$post->id}}"
                                                action="{{route('user.posts.destroy',$post->id)}}" method="POST">
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
