<div class="aside-widget" aria-label="Most Read Posts">
  <div class="section-title">
    <h2>Most Read</h2>
  </div>
  @foreach ($mostViewedPosts as $post)
    <div class="post post-widget" aria-label="Post: {{ $post->title }}">
      <a class="post-img" href="{{ route('show.post', ['category' => $post->category->slug, 'post' => $post->slug]) }}">
        <img src="{{ asset($post->img) }}" loading="lazy" alt="Image for {{ $post->title }}" width="100%" height="auto">
      </a>
      <div class="post-body">
        <h3 class="post-title">
          <a href="{{ route('show.post', ['category' => $post->category->slug, 'post' => $post->slug]) }}" aria-label="Read more about {{ $post->title }}">
            {{ $post->title }}
          </a>
        </h3>
      </div>
    </div>
    @if ($loop->iteration >= 4)
      @break
    @endif
  @endforeach
</div>

<div class="aside-widget" aria-label="Featured Posts">
  <div class="section-title">
    <h2>Featured Posts</h2>
  </div>
  @foreach ($posts as $post)
    <div class="post post-thumb" aria-label="Featured Post: {{ $post->title }}">
      <a class="post-img" href="{{ route('show.post', ['category' => $post->category->slug, 'post' => $post->slug]) }}">
        <img src="{{ asset($post->img) }}" loading="lazy" alt="Image for {{ $post->title }}" width="100%" height="auto">
      </a>
      <div class="post-body">
        <div class="post-meta">
          <a class="post-category {{ $post->category->class }}" href="{{ route('category.posts', $post->category->slug) }}" aria-label="View posts in {{ $post->category->name }}">
            {{ $post->category->name }}
          </a>
          <span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
        </div>
        <h3 class="post-title">
          <a href="{{ route('show.post', ['category' => $post->category->slug, 'post' => $post->slug]) }}" aria-label="Read more about {{ $post->title }}">
            {{ $post->title }}
          </a>
        </h3>
      </div>
    </div>
    @if ($loop->iteration >= 3)
      @break
    @endif
  @endforeach
</div>

<div class="aside-widget text-center" aria-label="Advertisement Section">
  <a href="#" style="display: inline-block; margin: auto;" aria-label="Advertisement">
    <img class="img-responsive" src="./img/ad-1.jpg" alt="Advertisement">
  </a>
</div>
