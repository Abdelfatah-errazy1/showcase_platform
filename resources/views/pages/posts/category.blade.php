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
          @if (isset($posts[0]))
            
            <div class="col-md-12">
              <div class="post post-thumb">
                <a class="post-img" href="{{ route('show.post',['category'=>$posts[0]->category->slug,'post'=>$posts[0]->slug])}}">
                  <div style="position: relative; width: 100%; padding-top: 56.25%; overflow: hidden; border-radius: 0.3rem;">
                      <img src="{{ asset($project->image_path) }}"
                          alt="{{ ucwords($project->title) }}"
                          style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                  </div>
                </a>
                <div class="post-body">
                  <div class="post-meta">
                    <a class="post-category {{ $posts[0]->category->class }}" href="{{ route('category.posts',$posts[0]->category->slug) }}">{{ $posts[0]->category->name }}</a>
                    <span class="post-date">March 27, 2018</span>
                  </div>
                  <h3 class="post-title"><a href="{{ route('show.post',['category'=>$posts[0]->category->slug,'post'=>$posts[0]->slug])}}">{{ $posts[0]->title }}</a></h3>
                </div>
              </div>
            </div>
          @else
          <h3>There is no post yet</h3>
          @endif
          <!-- /post -->
          @foreach ($posts as $post )
            <div class="col-md-6">
              <div class="post">
                <a class="post-img" href="{{ route('show.post',['category'=>$post->category->slug,'post'=>$post->slug])}}"><img src="{{ asset($post->img) }}" alt=""></a>
                <div class="post-body">
                  <div class="post-meta">
                    <a class="post-category {{ $post->category->class }}" href="{{ route('category.posts',$post->category->slug) }}">{{ $post->category->name }}</a>
                    <span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
                  </div>
                  <h3 class="post-title"><a href="{{ route('show.post',['category'=>$post->category->slug,'post'=>$post->slug])}}">{{ $post->title }}</a></h3>
                </div>
              </div>
            </div>
            @if ($loop->iteration ===2 || $loop->iteration ===4 )
              <div class="clearfix visible-md visible-lg col-md-12"></div>
            @endif
          @endforeach
          <!-- /post -->
          
          <div class="clearfix visible-md visible-lg"></div>
          
          <!-- ad -->
          <div class="col-md-12">
            <div class="section-row">
              <a href="#">
                <img class="img-responsive center-block" src="./img/ad-2.jpg" alt="">
              </a>
            </div>
          </div>
          <!-- ad -->
          
          @foreach($posts as $post )
            <div class="col-md-12">
                <div class="post post-row">
                    <a class="post-img" href="{{ route('show.post',['category'=>$post->category->slug,'post'=>$post->slug])}}"><img src="{{ asset($post->img) }}" alt="{{ ucwords($post->title) }}"></a>
                    <div class="post-body">
                        <div class="post-meta">
                            <a class="post-category {{ $post->category->class }}" href="{{ route('category.posts',$post->category->slug) }}">{{ $post->category->name }}</a>
                            <span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <h3 class="post-title"><a href="{{ route('show.post',['category'=>$post->category->slug,'post'=>$post->slug])}}">{{ ucwords($post->title) }}</a></h3>
                        <p>{!! str($post->excerpt)->limit(120)  !!}</p>
                    </div>
                </div>
            </div>
            @if ($loop->iteration ===4)
                @break
            @endif
          @endforeach
        </div>
      </div>
      
      <div class="col-md-4">
          @include('pages.posts.includes.featured')
      </div>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
@endsection