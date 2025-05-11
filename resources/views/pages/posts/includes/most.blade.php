<div class="row">
  <div class="col-md-8">
    <div class="row">
      <!-- Main Post -->
      <div class="col-md-12">
        <div class="post post-thumb" aria-label="Featured Post">
          <a class="post-img" href="{{ route('show.post', ['category' => $mosts[0]->category->slug, 'post' => $mosts[0]->slug]) }}">
            <img src="{{ asset($mosts[0]->img) }}" alt="Image for {{ $mosts[0]->title }}" width="100%" height="auto">

          </a>
          <div class="post-body">
            <div class="post-meta">
              <a class="post-category {{ $mosts[0]->category->class }}" href="{{ route('category.posts', $mosts[0]->category->slug) }}" aria-label="Category: {{ $mosts[0]->category->name }}">
                {{ $mosts[0]->category->name }}
              </a>
              <span class="post-date">{{ $mosts[0]->created_at->diffForHumans() }}</span>
            </div>
            <h3 class="post-title">
              <a href="{{ route('show.post', ['category' => $mosts[0]->category->slug, 'post' => $mosts[0]->slug]) }}" aria-label="Read more about {{ $mosts[0]->title }}">
                {{ $mosts[0]->title }}
              </a>
            </h3>
          </div>
        </div>
      </div>
      <!-- /Main Post -->

      @foreach ($mosts as $post)
        @if ($loop->iteration <= 1)
          @continue
        @endif

        @if ($loop->iteration === 2 || $loop->iteration === 4|| $loop->iteration === 6)
          <div class="clearfix visible-md visible-lg col-md-12"></div>
        @endif

        <!-- Secondary Posts -->
        <div class="col-md-6">
          <div class="post" aria-label="Post: {{ $post->title }}">
            <a class="post-img" href="{{ route('show.post', ['category' => $post->category->slug, 'post' => $post->slug]) }}">
              <img src="{{ asset($post->img) }}"loading="lazy" alt="Image for {{ $post->title }}" width="100%" height="auto">
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
                  {{ $post->title }}
                </a>
              </h3>
            </div>
          </div>
        </div>
        <!-- /Secondary Posts -->

      @endforeach
    </div>
  </div>

  <!-- Featured Section -->
  <div class="col-md-4">
    @include('pages.posts.includes.featured')
  </div>
</div>
