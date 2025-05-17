@extends('layouts.clients.client')
@section('header')
<div class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <ul class="page-header-breadcrumb">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li>{{ $category->name }}</li>
        </ul>
        <h1>{{ $category->name }}</h1>
      </div>
    </div>
  </div>
</div>
@endsection
@section('content')

<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <div class="col-md-8">
        <div class="row">
          @if (isset($projects[0]))
            
            <div class="col-md-12">
              <div class="post post-thumb">
                <a class="post-img" href="{{ route('projects.show',['category'=>$projects[0]->category->slug,'project'=>$projects[0]->slug])}}">
                  <div style="position: relative; width: 100%; padding-top: 56.25%; overflow: hidden; border-radius: 0.3rem;">
                      <img src="{{ asset($projects[0]->image_path) }}"
                          alt="{{ ucwords($projects[0]->title) }}"
                          style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                  </div>
                </a>
                <div class="post-body">
                  <div class="post-meta">
                    <a class="post-category {{ $projects[0]->category->class }}" href="{{ route('category.projects',$projects[0]->category->slug) }}">{{ $projects[0]->category->name }}</a>
                    <span class="post-date">March 27, 2018</span>
                  </div>
                  <h3 class="post-title"><a href="{{ route('projects.show',['category'=>$projects[0]->category->slug,'project'=>$projects[0]->slug])}}">{{ $projects[0]->title }}</a></h3>
                </div>
              </div>
            </div>
          @else
          <h3>There is no post yet</h3>
          @endif
          <!-- /post -->
          @foreach ($projects as $project )
            <div class="col-md-6">
              <div class="post">
                <a class="post-img" href="{{ route('projects.show',['category'=>$project->category->slug,'project'=>$project->slug])}}"><img src="{{ asset($project->image_path) }}" alt=""></a>
                <div class="post-body">
                  <div class="post-meta">
                    <a class="post-category {{ $project->category->class }}" href="{{ route('category.projects',$project->category->slug) }}">{{ $project->category->name }}</a>
                    <span class="post-date">{{ $project->created_at->diffForHumans() }}</span>
                  </div>
                  <h3 class="post-title"><a href="{{ route('projects.show',['category'=>$project->category->slug,'project'=>$project->slug])}}">{{ $project->title }}</a></h3>
                </div>
              </div>
            </div>
            @if ($loop->iteration ===2 || $loop->iteration ===4 )
              <div class="clearfix visible-md visible-lg col-md-12"></div>
            @endif
          @endforeach
          <!-- /post -->
          
          <div class="clearfix visible-md visible-lg"></div>
          
          
        </div>
      </div>
      
      <div class="col-md-4">
          @include('pages.posts.includes.featured')
      </div>
      <div class="col-md-12">

				@include('pages.posts.includes.most')
				</div>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
@endsection