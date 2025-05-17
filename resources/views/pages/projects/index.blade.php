@extends('layouts.clients.client')

@section('content')
<main role="main">
	<!-- Section: Recent and Most Viewed Posts -->
	<div class="section">
		<div class="container">
			@include('pages.posts.includes.recents')
			{{-- @include('pages.posts.includes.most') --}}
		</div>
	</div>

	<!-- Section: Featured Posts -->
	{{-- <div class="section section-grey">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title text-center">
						<h2>Featured Posts</h2>
					</div>
				</div>
				@foreach($projects as $project)
					<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="{{ route('projects.show', ['category' => $project->category->slug, 'project' => $project->slug]) }}">
								<img src="{{ asset($project->image_path) }}" alt="{{ ucwords($project->title) }}" width="100%" height="auto">

							</a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category {{ $project->category->class }}" href="{{ route('category.projects', $project->category->slug) }}">
										{{ $project->category->name }}
									</a>
									<span class="post-date">{{ $project->created_at->diffForHumans() }}</span>
								</div>
								<h3 class="post-title">
									<a href="{{ route('projects.show', ['category' => $project->category->slug, 'project' => $project->slug]) }}">
										{{ ucwords($project->title) }}
									</a>
								</h3>
							</div>
						</div>
					</div>
					@if ($loop->iteration === 3)
						@break
					@endif
				@endforeach
			</div>
		</div>
	</div> --}}

	<!-- Section: Most Read Posts -->
			@include('pages.posts.includes.most')
	
</main>
@endsection
