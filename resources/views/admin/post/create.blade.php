@extends('layouts.admin.master')
@section('title','Dashboard')

@section('post') active @endsection
@section('addpost') active @endsection

@push('css')
<link rel="stylesheet" href="/assets/admin/css/bootstrap-select.min.css">
@endpush

@section('content')

<div class="content-page">
  <div class="content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
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
                <div class="panel-heading"><h3 class="panel-title">Basic example</h3></div>
                <div class="panel-body">
                    <form role="form" action="{{route('admin.post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Post Title</label>
                                <input type="text" class="form-control" name="title"  placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Featured Image</label>
                                <input type="file" accept="image/*" onchange="loadFile(event)" class="form-control" name="image">
                                 <img height="80" width="100" id="output"/>
                            </div>
                            <div class="form-group">
                                <div class="checkbox checkbox-primary">
                                    <input name="status" value="1" id="checkbox1" type="checkbox">
                                    <label for="checkbox1">
                                        Publish
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label col-md-4">Select Category</label>
                                <select class="form-control show-tick" name="categories[]" multiple>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4">Select Tags</label>
                                <select class="form-control show-tick" name="tags[]" multiple>
                                    @foreach ($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                               </select>
                            </div>
                        </div>

                </div>
          </div>
      </div>
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Blog Write here</h3></div>
                <div class="panel-body">
                    <textarea name="editor1"></textarea>
                    <button type="submit" class="btn btn-success waves-effect waves-light" style="margin-top:20px">Save & Exit</button>
                </div>
            </div>
        </form>
        </div>
      </div>
  </div>
</div>
@endsection

@push('js')
<script src="/assets/admin/js/sweetalert.min.js"></script>
<script src="/assets/admin/js/bootstrap-select.min.js"></script>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    function deletetag(id) {
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
               
                }
            });
        }

</script>

<script>
$(function () {
    $('select').selectpicker();
});

CKEDITOR.replace( 'editor1' );
</script>

<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>

@endpush
