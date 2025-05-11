@extends('layouts.clients.client')

@section('content')
    
		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				
				<div class="row">
          <div class="col-md-12">
            <div class="section-title">
              <h2>Blogs found</h2>
            </div>
          </div> 
          @foreach($posts as $post ) 
            <div class="col-md-4">
              <div class="post">
                <a class="post-img" href="{{ route('show.post',['category'=>$post->category->slug,'post'=>$post->slug])}}"><img src="{{ asset($post->img) }}" alt=""></a>
                <div class="post-body">
                  <div class="post-meta">
                    <a class="post-category {{ $post->category->class }}" href="{{ $post->category->slug }}">{{ $post->category->name }}</a>
                    <span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
                  </div>
                  <h3 class="post-title"><a href="{{ route('show.post',['category'=>$post->category->slug,'post'=>$post->slug])}}">{{ ucwords($post->title) }}</a></h3>
                </div>
              </div>
            </div>
            @if ($loop->iteration ===3)
              <div class="clearfix visible-md visible-lg"></div>
            @endif
            <!-- /post -->
          @endforeach
          
          
        
        </div>
        <div class="d-block">

          <div class="d-flex  justify-content-center mx-auto">

            @include('vendor.pagination.custom-pagination', ['paginator' => $posts])
          </div>
        </div>
			</div>
		</div>
		

@endsection