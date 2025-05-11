@extends('layouts.clients.client')
@section('meta')
		<meta name="title" content=" {{ $post->title }} - Explore the Latest Posts @foreach($tags as $t) , {{ $t->name }} @endforeach ">
    <meta name="description" content="blog related to {{ $post->title }}. ">
		<meta name="keywords" content="{{ is_array($post->keywords) ? implode(',', $post->keywords) : $post->keywords }}">


@endsection
@section('title',$post->title.'-'.$post->category->slug.'- EZD')
@section('header')
<div id="post-header" class="page-header">
	<div class="background-img" style="background-image: url('{{asset($post->img)}}');"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<div class="post-meta">
					<a class="post-category {{ $post->category->class }}" href="{{ route('category.posts',$post->category->slug) }}">{{ $post->category->name}}</a>
					<span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
				</div>
				<h1>{{ $post->title}}</h1>
			</div>
		</div>
	</div>
</div>
@endsection
@section('content')
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="section-row sticky-container">
						<div class="main-post">
							{!! $post->body !!}
						</div>
						<div class="post-shares sticky-shares ">
							
						 <!-- Facebook Share -->
							<a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('show.post', ['category' => $post->category->slug, 'post' => $post->slug])) }}" 
								target="_blank" 
								class="share-facebook" 
								aria-label="Share on Facebook">
								<i class="fab fa-facebook"></i>
							</a>

							<!-- Twitter Share -->
							<a href="https://twitter.com/intent/tweet?url={{ urlencode(route('show.post', ['category' => $post->category->slug, 'post' => $post->slug])) }}&text={{ urlencode($post->title) }}" 
								target="_blank" 
								class="share-twitter" 
								aria-label="Share on Twitter">
								<i class="fab fa-twitter"></i>
							</a>

							

							<!-- Pinterest Share -->
							<a href="https://www.pinterest.com/pin/create/button/?url={{ urlencode(route('show.post', ['category' => $post->category->slug, 'post' => $post->slug])) }}&media={{ urlencode($post->image_url) }}&description={{ urlencode($post->title) }}" 
								target="_blank" 
								class="share-pinterest" 
								aria-label="Share on Pinterest">
								<i class="fab fa-pinterest"></i>
							</a>
							<!-- Telegram Share -->
							<a href="https://t.me/share/url?url={{ urlencode(route('show.post', ['category' => $post->category->slug, 'post' => $post->slug])) }}&text={{ urlencode($post->title) }}" 
								target="_blank" 
								class="share-linkedin" 
								aria-label="Share on Telegram">
								<i class="fab fa-telegram"></i>
							</a>
							<!-- Google+ Share (Note: Google+ is deprecated and may not work anymore) -->
							<a href="https://plus.google.com/share?url={{ urlencode(route('show.post', ['category' => $post->category->slug, 'post' => $post->slug])) }}" 
								target="_blank" 
								class="share-google-plus" 
								aria-label="Share on Google+">
								<i class="fab fa-google-plus-g"></i>
							</a>

							<!-- LinkedIn Share -->
							<a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('show.post', ['category' => $post->category->slug, 'post' => $post->slug])) }}&title={{ urlencode($post->title) }}&summary={{ urlencode($post->excerpt) }}" 
								target="_blank" 
								class="share-linkedin" 
								aria-label="Share on LinkedIn">
								<i class="fab fa-linkedin"></i>
							</a>
						
							
						</div>
						<div class="post-tags my-3">
							<h5 class="mb-3">Tags:</h5>
							<div class="d-flex flex-wrap">
									@foreach($post->tags as $tag)
											<a href="{{ route('tag.posts',$tag->name) }}" class="badge badge-success text-decoration-none mx-1 my-1">
													#{{ $tag->name }}
											</a>
									@endforeach
							</div>
					</div>

					<div class="rating-section text-center">
						<h5>Rate this Blog</h5>
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
					<div class="section-row">
						<div class="section-title">
							<h2> {{ count($post->comments) }} Comments</h2>
						</div>

						<div class="post-comments">
							<!-- comment -->
							@foreach ($post->comments as $comment )
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
						<form class="post-reply" method="Post" action="{{  route('store.comment',$post->slug) }}">
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
								<a href="{{ route('register.create') }}" class="btn btn-success">Register</a> Or
								<a href="{{ route('sessions.create') }}" class="btn btn-primary">Login</a>
										to leave a comment !!
						</div>
										
								
						@endauth
						
					</div>
				</div>

				<div class="col-md-4">

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
									post_id: {{ $post->id }}, // Pass the post ID
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