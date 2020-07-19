@extends('layouts.admin.master')

@section('title','Dashboard')

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
                  <h4 class="pull-left page-title">All Posts!</h4>
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
                   <a href="{{route('admin.post.create')}}" class="btn btn-primary btn-rounded
                    waves-effect waves-light m-b-5"><i class="fa fa-plus"></i> Add</a>
                  </div>
                  <div class="panel-body">
                      <div class="row">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                              <table id="datatable" class="table table-striped ">
                                  <thead>
                                      <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th><i class="ion-eye"></i></th>
                                        <th>Sataus</th>
                                        <th>Is-Aproved</th>
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
                                            <span class="badge label-success">Publish</span>
                                            @else
                                            <span class="badge label-info">Privet</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($post->is_approved == true)
                                            <span class="badge label-purple">Approved</span>
                                            @else
                                            <span class="badge label-danger">Pending</span>
                                            @endif
                                        </td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>
                                            <a href="{{route('admin.post.edit',$post->id)}}" class="btn btn-sm btn-primary"
                                                title="Edit button">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="{{route('admin.post.show',$post->id)}}" class="btn btn-sm btn-info"
                                                title="View button">
                                                <i class="ion-eye"></i>
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

  </div>
</div>
</div>

  <footer class="footer text-right" style="position:fixed">
      2015 © Moltran.
  </footer>
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
