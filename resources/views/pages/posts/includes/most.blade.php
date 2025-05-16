<div class="row">
  <div class="col-md-8">
    <div class="row">
      <!-- Main Post -->
      <div class="col-md-12">
        <div class="post post-thumb" aria-label="Featured Post">
          <a class="post-img" href="{{ route('projects.show', ['category' => $projects[0]->category->slug, 'project' => $projects[0]->slug]) }}">
            <img src="{{ asset($projects[0]->image_path) }}" alt="Image for {{ $projects[0]->title }}" width="100%" height="auto">

          </a>
          <div class="post-body">
            <div class="post-meta">
              <a class="post-category {{ $projects[0]->category->class }}" href="{{ route('category.projects', $projects[0]->category->slug) }}" aria-label="Category: {{ $projects[0]->category->name }}">
                {{ $projects[0]->category->name }}
              </a>
              <span class="post-date">{{ $projects[0]->created_at->diffForHumans() }}</span>
            </div>
            <h3 class="post-title">
              <a href="{{ route('projects.show', ['category' => $projects[0]->category->slug, 'project' => $projects[0]->slug]) }}" aria-label="Read more about {{ $projects[0]->title }}">
                {{ $projects[0]->title }}
              </a>
            </h3>
          </div>
        </div>
      </div>
      <!-- /Main Post -->

      @foreach ($projects as $project)
        @if ($loop->iteration <= 1)
          @continue
        @endif

        @if ($loop->iteration === 2 || $loop->iteration === 4|| $loop->iteration === 6)
          <div class="clearfix visible-md visible-lg col-md-12"></div>
        @endif

        <!-- Secondary Posts -->
        <div class="col-md-6">
          <div class="post" aria-label="Post: {{ $project->title }}">
            <a class="post-img" href="{{ route('projects.show', ['category' => $project->category->slug, 'project' => $project->slug]) }}">
              <img src="{{ asset($project->image_path) }}"loading="lazy" alt="Image for {{ $project->title }}" width="100%" height="auto">
            </a>
            <div class="post-body">
              <div class="post-meta">
                <a class="post-category {{ $project->category->class }}" href="{{ route('category.projects', $project->category->slug) }}" aria-label="Category: {{ $project->category->name }}">
                  {{ $project->category->name }}
                </a>
                <span class="post-date">{{ $project->created_at->diffForHumans() }}</span>
              </div>
              <h3 class="post-title">
                <a href="{{ route('projects.show', ['category' => $project->category->slug, 'project' => $project->slug]) }}" aria-label="Read more about {{ $project->title }}">
                  {{ $project->title }}
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
