@extends('layouts.admin.master')
@section('title','Dashboard')
@section('tag') active @endsection
@push('css') @endpush
@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container">
      <!-- Page-Title -->
      <div class="row">
        <div class="col-sm-12">
          <div class="head-title">
            <h4 class="">All Tags</h4>
          </div>
          <button type="button" data-toggle="modal" data-target="#store" class="btn btn-primary btn-rounded waves-effect waves-light m-b-5"><i class="fa fa-plus"></i> Add New</button>
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
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($tags as $tag)
                      <tr>
                        <td>{{ $loop->index+ 1 }}</td>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->created_at}}</td>
                        <td>
                          <button data-toggle="modal" data-name="{{ $tag->name }}"
                          data-id="{{$tag->id}}" data-target="#update" class="btn btn-sm btn-primary"
                          title="Edit button">
                          <i class="fa fa-pencil"></i>
                          </button>
                          <button class="btn btn-danger btn-sm" type="button"
                          onclick="deletetag({{$tag->id}})">
                          <i class="fa fa-trash-o"></i>
                          </button>
                          <form id="delete-form-{{$tag->id}}"
                            action="{{route('admin.tag.destroy',$tag->id)}}" method="POST">
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
  
  <div id="store" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <form action="{{route('admin.tag.store')}}" method="POST">
      @csrf
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add New Tag</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="field-1" class="control-label">Tag Name</label>
                  <input type="text" name="name" class="form-control" id="field-1" placeholder="Name">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Cancle</button>
            <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
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
            <h4 class="modal-title">Add New Tag</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="field-1" class="control-label">Tag Name</label>
                  <input type="text" name="name" class="form-control" id="tag_name" placeholder="Name">
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
</div>
@endsection
@push('js')

<script type="text/javascript">
  $(document).ready(function() {
      $('#datatable').dataTable();
  } );
</script>
@endpush