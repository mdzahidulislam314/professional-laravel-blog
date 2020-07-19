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
                              <h4 class="pull-left page-title">All Categories !</h4>
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
                                <button type="button" data-toggle="modal" data-target="#store" class="btn btn-primary btn-rounded waves-effect waves-light m-b-5"><i class="fa fa-plus"></i> Add</button>
                              </div>
                              <div class="panel-body">
                                  <div class="row">
                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                          <table id="datatable" class="table table-striped">
                                              <thead>
                                                  <tr>
                                                    <th>SL.</th>
                                                    <th>Category Name</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                @foreach ($categories as $category)
                                                <tr>
                                                    <td>{{ $loop->index+ 1}}</td>
                                                    <td>{{$category->name}}</td>
                                                    <td>{{$category->created_at}}</td>
                                                    <td>
                                                        <button data-toggle="modal" data-catename="{{ $category->name }}"
                                                          data-id="{{$category->id}}" data-target="#update" class="btn btn-sm btn-primary"
                                                            title="Edit button">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                        <button class="btn btn-danger btn-sm" type="button"
                                                            onclick="deletecategory({{$category->id}})">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                        <form id="delete-form-{{$category->id}}"
                                                            action="{{route('admin.category.destroy',$category->id)}}" method="POST">
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
              <!-- Modal -->

        <div id="store" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"         aria-hidden="true" style="display: none;">
            <form action="{{route('admin.category.store')}}" method="POST">
              @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Post Category</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Category Name</label>
                                    <input type="text" name="name" class="form-control" id="field-1" placeholder="Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>

      <div id="update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <form action="" method="POST">
            @csrf
            @method('PUT')
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Add New Post Category</h4>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="field-1" class="control-label">Category Name</label>
                                  <input type="text" name="name" class="form-control" id="cat_name" placeholder="Name">
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                  </div>
                </form>
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
    function deletecategory(id) {
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

    $('#update').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var name = button.data('catename');
            var desc = button.data('desc');
            var modal = $(this);
            var url = '/admin/category/' + button.data('id');
            modal.find('.modal-body #cat_name').val(name);
            modal.find('form').attr('action', url);
        });

</script>

<script type="text/javascript">
  $(document).ready(function() {
      $('#datatable').dataTable();
  } );
</script>

@endpush
