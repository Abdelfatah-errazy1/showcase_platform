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
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2>Most Read</h2>
							</div>
						</div>
						@foreach($projects as $project)
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="{{ route('projects.show', ['category' => $project->category->slug, 'project' => $project->slug]) }}">
										<div style="position: relative; width: 100%; padding-top: 56.25%; overflow: hidden; border-radius: 0.3rem;">
												<img src="{{ asset($project->image_path) }}"
														alt="{{ ucwords($project->title) }}"
														style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
										</div>
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
										<p>{!! str($project->excerpt)->limit(120) !!}</p>
									</div>
								</div>
							</div>
							@if ($loop->iteration === 4)
								@break
							@endif
						@endforeach
						<div class="col-md-12">
							<div class="section-row text-center">
								<button aria-label="Load more posts" class="primary-button center-block">Load More</button>
							</div>
						</div>
					</div>
				</div>

				<!-- Sidebar: Categories and Tags -->
				<div class="col-md-4">
					@include('pages.posts.includes.categories')
				</div>
			</div>
		</div>
	</div>
</main>
@endsection
