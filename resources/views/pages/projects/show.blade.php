@extends('layouts.clients.client')
@section('meta')
		<meta name="title" content=" {{ $project->title }} - Explore the Latest Posts @foreach($project->tags as $t) , {{ $t->name }} @endforeach ">
    <meta name="description" content="blog related to {{ $project->title }}. ">
		<meta name="keywords" content="{{ is_array($project->keywords) ? implode(',', $project->keywords) : $project->keywords }}">


@endsection
@section('title',$project->title.'-'.$project->category->slug.'- EZD')
@section('header')
{{-- @dd($project) --}}
<div id="post-header" class="page-header">
	<div class="background-img" style="background-image: url('{{asset($project->image_path)}}');"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="post-meta">
					<a class="post-category {{ $project->category->class }}" href="{{ route('category.projects',$project->category->slug) }}">{{ $project->category->name}}</a>
					<span class="post-date">{{ $project->created_at->diffForHumans() }}</span>
				</div>
				<h1>{{ $project->title}}</h1>
			</div>
		</div>
	</div>
</div>
@endsection
@section('content')
	<div class="section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9">
					<div class="section-row sticky-container">
						<div class="main-project">
					
							<div class="">
									{{-- Project Cover --}}
										<div class="project-cover mb-4">
															<a href="{{ asset($project->image_path) }}" target="_blank" style="display: block; aspect-ratio: 16/9; overflow: hidden; border-radius: 12px;">
																	<img src="{{ asset($project->image_path) }}"
																			alt="{{ $project->title }}"
																			style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;"
																			onmouseover="this.style.transform='scale(1.05)'"
																			onmouseout="this.style.transform='scale(1)'"
																	>
															</a>
													</div>
									{{-- Title and Meta --}}
									<div class="mb-4">
											<h1 class="display-5 fw-bold">{{ $project->title }}</h1>
										<div class="post-meta">
											<a class="post-category {{ $project->category->class }}" href="{{ route('category.projects',$project->category->slug) }}">{{ $project->category->name}}</a>
											<span class="post-date">{{ $project->created_at->diffForHumans() }}</span>
										</div>
									</div>

									{{-- Tags and Technologies --}}
									<div class="mb-4">
											@foreach($project->technologies as $tech)
													<span class="badge bg-primary me-2 mb-2"><i class="bi bi-code-slash"></i> {{ $tech->name }}</span>
											@endforeach

											@foreach($project->tags as $tag)
													<span class="badge bg-secondary me-2 mb-2"><i class="bi bi-tag"></i> {{ $tag->name }}</span>
											@endforeach
									</div>

									{{-- Description --}}
									<div class="card shadow-sm border-0 mb-4">
											<div class="card-body">
													<h5 class="card-title">Description</h5>
													<div class="card-text">{!! $project->description !!}</div>
											</div>
									</div>

									{{-- Files / Demo Links (Optional) --}}
									@if($project->demo_url || $project->download_url)
									<div class="mb-4">
											@if($project->demo_url)
													<a href="{{ $project->demo_url }}" target="_blank" class="btn btn-success me-2">
															<i class="bi bi-box-arrow-up-right"></i> Live Demo
													</a>
											@endif
											@if($project->download_url)
													<a href="{{ $project->download_url }}" class="btn btn-primary">
															<i class="bi bi-download"></i> Download
													</a>
											@endif
									</div>
									@endif
							</div>


						</div>
						<div class="post-shares sticky-shares ">
							
						 <!-- Facebook Share -->
							<a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('projects.show', ['category' => $project->category->slug, 'project' => $project->slug])) }}" 
								target="_blank" 
								class="share-facebook" 
								aria-label="Share on Facebook">
								<i class="fab fa-facebook"></i>
							</a>

							<!-- Twitter Share -->
							<a href="https://twitter.com/intent/tweet?url={{ urlencode(route('projects.show', ['category' => $project->category->slug, 'project' => $project->slug])) }}&text={{ urlencode($project->title) }}" 
								target="_blank" 
								class="share-twitter" 
								aria-label="Share on Twitter">
								<i class="fab fa-twitter"></i>
							</a>

							

							<!-- Pinterest Share -->
							<a href="https://www.pinterest.com/pin/create/button/?url={{ urlencode(route('projects.show', ['category' => $project->category->slug, 'project' => $project->slug])) }}&media={{ urlencode($project->image_url) }}&description={{ urlencode($project->title) }}" 
								target="_blank" 
								class="share-pinterest" 
								aria-label="Share on Pinterest">
								<i class="fab fa-pinterest"></i>
							</a>
							<!-- Telegram Share -->
							<a href="https://t.me/share/url?url={{ urlencode(route('projects.show', ['category' => $project->category->slug, 'project' => $project->slug])) }}&text={{ urlencode($project->title) }}" 
								target="_blank" 
								class="share-linkedin" 
								aria-label="Share on Telegram">
								<i class="fab fa-telegram"></i>
							</a>
							<!-- Google+ Share (Note: Google+ is deprecated and may not work anymore) -->
							<a href="https://plus.google.com/share?url={{ urlencode(route('projects.show', ['category' => $project->category->slug, 'project' => $project->slug])) }}" 
								target="_blank" 
								class="share-google-plus" 
								aria-label="Share on Google+">
								<i class="fab fa-google-plus-g"></i>
							</a>

							<!-- LinkedIn Share -->
							<a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('projects.show', ['category' => $project->category->slug, 'project' => $project->slug])) }}&title={{ urlencode($project->title) }}&summary={{ urlencode($project->excerpt) }}" 
								target="_blank" 
								class="share-linkedin" 
								aria-label="Share on LinkedIn">
								<i class="fab fa-linkedin"></i>
							</a>
						
							
						</div>
						<div class="post-tags my-3">
							<h5 class="mb-3">Tags:</h5>
							<div class="d-flex flex-wrap">
									@foreach($project->tags as $tag)
											<a href="{{ route('tag.posts',$tag->name) }}" class="badge badge-success text-decoration-none mx-1 my-1">
													#{{ $tag->name }}
											</a>
									@endforeach
							</div>
					</div>

					<div class="rating-section text-center">
						<h5>Rate this Project</h5>
						<div id="star-rating" class="star-rating">
								<i class="fa fa-star" data-value="1"></i>
								<i class="fa fa-star" data-value="2"></i>
								<i class="fa fa-star" data-value="3"></i>
								<i class="fa fa-star" data-value="4"></i>
								<i class="fa fa-star" data-value="5"></i>
						</div>
						<p id="rating-feedback" class="mt-2"></p>
						<button id="submit-rating" class="btn btn-primary mt-2">Submit Rating</button>
					</div>
				
					</div>
					<div class="section-row text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="/img/ad-2.jpg" alt="">
						</a>
					</div>
					<div class="section-row">
						<div class="post-author">
							<div class="media">
								<div class="media-left">
									<img class="media-object" src="/images/ezd.png" alt="">
								</div>
								<div class="media-body">
									<div class="media-heading">
										<h3>EZD</h3>
									</div>
									<p>
										EZD is a community for self developemnt and earning from web and more thing join us on telegram 
									</p>
									<ul class="author-social">
										<li><a href="https://t.me/ezdcommunity" target="_blank"><i class="fab fa-telegram"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#"><i class="fab fa-google-plus"></i></a></li>
										<li><a href="#"><i class="fab fa-instagram"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="px-md-5">

						<div class="section-row container">
							<div class="section-title">
								<h2> {{ count($project->comments) }} Comments</h2>
							</div>
	
							<div class="post-comments">
								<!-- comment -->
								@foreach ($project->comments as $comment )
									<div class="media">
										<div class="media-left">
											<img class="media-object" src="/images/ezd.png" alt="">
										</div>
										<div class="media-body">
											<div class="media-heading">
												<h4>{{ $comment->auther->name }}</h4>
												<span class="time">{{ $comment->created_at->diffForHumans() }}</span>
												<a href="#" class="reply">Reply</a>
											</div>
											<p>{{ $comment->body }}</p>
										</div>
									</div>
								@endforeach
							</div>
						</div>
						<div class="section-row">
							<div class="section-title">
								<h2>Leave a reply</h2>
							</div>
							@auth
							<form class="post-reply" method="Post" action="{{  route('comments.store',$project->slug) }}">
								@csrf
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											
											<textarea class="input" name="body" placeholder="Message" aria-label="message for comment"></textarea>
										</div>
										<button aria-label="Submit form" class="primary-button">Send</button>
									</div>
								</div>
							</form>
							@else
							<div class="tags-widget">
									<a href="{{ route('auth.register') }}" class="btn btn-success">Register</a> Or
									<a href="{{ route('auth.login') }}" class="btn btn-primary">Login</a>
											to leave a comment !!
							</div>
											
									
							@endauth
							
						</div>
					</div>
				</div>

				<div class="col-md-3">

					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="./img/ad-1.jpg" alt="">
						</a>
					</div>
					@include('pages.posts.includes.featured')
					@include('pages.posts.includes.categories')

				</div>
			</div>
		</div>
	</div>
@endsection
@section('scripts')

<script>
	document.addEventListener('DOMContentLoaded', function () {
			let rating = 0;
			
			// let rating = parseInt(star.getAttribute('data-value'));
			const stars = document.querySelectorAll('#star-rating i');
			const feedback = document.getElementById('rating-feedback');
			const submitButton = document.getElementById('submit-rating');
			
			stars.forEach(star => {
				star.addEventListener('click', function () {
					rating = parseInt(star.getAttribute('data-value'));
					updateStars(rating);
					// displayFeedback(rating);
					document.querySelectorAll('.fa-star').forEach(s => s.classList.remove('text-warning'));

        // Add "checked" class to the clicked star and all previous stars
        // let rating = parseInt(star.getAttribute('data-value'));
        document.querySelectorAll('.fa-star').forEach((s, index) => {
            if (index < rating) {
                s.classList.add('text-warning');
            }
        });
					});
			});
			// let rating = parseInt(star.getAttribute('data-value'));
			function updateStars(rating) {
					stars.forEach(star => {
							if (parseInt(star.getAttribute('data-value')) <= rating) {
									star.classList.add('rated');
							} else {
									star.classList.remove('rated');
							}
					});
			}

			
			submitButton.addEventListener('click', function () {
				if (rating === 0) {
        // Show an error message with SweetAlert
					Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Please select a rating before submitting!',
							showConfirmButton: true,
							confirmButtonText: 'Try Again'
					});
				}

					// Send rating to backend via AJAX
					fetch('/rate-blog', {
							method: 'POST',
							headers: {
									'Content-Type': 'application/json',
									'X-CSRF-TOKEN': '{{ csrf_token() }}'  // Include CSRF token for security
							},
							body: JSON.stringify({
									post_id: {{ $project->id }}, // Pass the project ID
									rating: rating
							})
					})
					.then(response => response.json())
					.then(data => {
						Swal.fire({
            icon: 'success',
            title: 'Thank you!',
            text: `You rated this blog ${rating} stars.`,
            showConfirmButton: true,
            confirmButtonText: 'OK'
        });
					})
					.catch(error => console.error('Error:', error));
			});
	});

</script>

@endsection