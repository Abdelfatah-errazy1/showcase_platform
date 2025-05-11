<div class="row">	
  <!-- Highlighted Posts -->
  @foreach($posts as $post)
    <div class="col-md-6">
      <div class="post post-thumb" aria-label="Highlighted Post: {{ $post->title }}">
        <a class="post-img" href="{{ route('show.post', ['category' => $post->category->slug, 'post' => $post->slug]) }}">
          
          <div class="image-container">
            <img src="{{ asset($post->img) }}" alt="{{ ucwords($post->title) }}" width="100%" height="auto" class="lazy-load" loading='lazy'>
          
        </div>
        
        </a>
        <div class="post-body">
          <div class="post-meta">
            <a class="post-category {{ $post->category->class }}" href="{{ route('category.posts', $post->category->slug) }}" aria-label="Category: {{ $post->category->name }}">
              {{ $post->category->name }}
            </a>
            <span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
          </div>
          <h3 class="post-title">
            <a href="{{ route('show.post', ['category' => $post->category->slug, 'post' => $post->slug]) }}" aria-label="Read more about {{ $post->title }}">
              {{ ucwords($post->title) }}
            </a>
          </h3>
        </div>
      </div>
    </div>
    @if ($loop->iteration === 2)
      @break
    @endif
  @endforeach
</div>

<div class="row">
  <div class="col-md-12">
    <div class="section-title">
      <h2>Recent Posts</h2>
    </div>
  </div> 

  <!-- Recent Posts -->
  @foreach($posts as $post)
    @if ($loop->iteration <= 2)
      @continue
    @endif
    <div class="col-md-4">
      <div class="post" aria-label="Recent Post: {{ $post->title }}">
        <a class="post-img" href="{{ route('show.post', ['category' => $post->category->slug, 'post' => $post->slug]) }}">
          <img src="{{ asset($post->img) }}" alt="{{ ucwords($post->title) }}" width="100%" height="auto">

        </a>
        <div class="post-body">
          <div class="post-meta">
            <a class="post-category {{ $post->category->class }}" href="{{ route('category.posts', $post->category->slug) }}" aria-label="Category: {{ $post->category->name }}">
              {{ $post->category->name }}
            </a>
            <span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
          </div>
          <h3 class="post-title">
            <a href="{{ route('show.post', ['category' => $post->category->slug, 'post' => $post->slug]) }}" aria-label="Read more about {{ $post->title }}">
              {{ ucwords($post->title) }}
            </a>
          </h3>
        </div>
      </div>
    </div>
    @if ($loop->iteration === 5)
      <div class="clearfix visible-md visible-lg"></div>
    @endif
  @endforeach
</div>
