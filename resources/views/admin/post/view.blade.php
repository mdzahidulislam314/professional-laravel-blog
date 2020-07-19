@extends('layouts.admin.master')

@section('title','Dashboard')

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endpush

@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
      <div class="container">
          <!-- Page-Title -->
          <div class="row">
              <div class="col-md-12">
                  <a href="{{route('admin.post.index')}}" class="btn btn-primary btn-rounded waves-effect waves-light
                  m-b-5">Back</a>
                  <ol class="breadcrumb pull-right">
                      <li><a href="#">Moltran</a></li>
                      <li class="active">Dashboard</li>
                  </ol>
              </div>
          </div>
      </div>
      <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-default panel-fill">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{$post->title}}
                        </h3>
                        <small>Posted By <strong><a href="">{{$post->user->name}}</a></strong> on
                            {{$post->created_at}}</small>
                    </div>
                    <div class="panel-body">
                        <img src="{{url($post->image)}}" alt="" class="img-responsive thumbnail">
                      {!! $post->editor1 !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-border panel-purple">
                    <div class="panel-heading">
                        <h3 class="panel-title">Categories</h3>
                    </div>
                    <div class="panel-body">
                        @foreach($post->categories as $category)
                            <span class="badge label-purple">{{$category->name}}</span>
                        @endforeach
                    </div>
                </div>
                <div class="panel panel-border panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tags</h3>
                    </div>
                    <div class="panel-body">
                        @foreach($post->tags as $tag)
                            <span class="badge label-info">{{$tag->name}}</span>
                        @endforeach
                    </div>
                </div>
            </div>
      </div>
  </div>
</div>
</div>

@endsection

@push('js')

@endpush
