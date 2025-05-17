<div class="aside-widget" aria-label="Most Read Posts">
  <div class="section-title">
    <h2>Top Projects</h2>
  </div>
  @foreach ($projects as $project)
    <div class="post post-widget" aria-label="Post: {{ $project->title }}">
      <a class="post-img" href="{{ route('projects.show', ['category' => $project->category->slug, 'project' => $project->slug]) }}">
        <div style="position: relative; width: 100%; padding-top: 56.25%; overflow: hidden; border-radius: 0.3rem;">
                <img src="{{ asset($project->image_path) }}"
                    alt="{{ ucwords($project->title) }}"
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
            </div></a>
      <div class="post-body">
        <h3 class="post-title">
          <a href="{{ route('projects.show', ['category' => $project->category->slug, 'project' => $project->slug]) }}" aria-label="Read more about {{ $project->title }}">
            {{ $project->title }}
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
    <h2>Featured  Projects</h2>
  </div>
  @foreach ($projects as $project)
    <div class="post post-thumb" aria-label="Featured Post: {{ $project->title }}">
      <a class="post-img" href="{{ route('projects.show', ['category' => $project->category->slug, 'project' => $project->slug]) }}">
        <div style="position: relative; width: 100%; padding-top: 56.25%; overflow: hidden; border-radius: 0.3rem;">
                <img src="{{ asset($project->image_path) }}"
                    alt="{{ ucwords($project->title) }}"
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
            </div>
      </a>
      <div class="post-body">
        <div class="post-meta">
          <a class="post-category {{ $project->category->class }}" href="{{ route('category.projects', $project->category->slug) }}" aria-label="View posts in {{ $project->category->name }}">
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
    @if ($loop->iteration >= 3)
      @break
    @endif
  @endforeach
</div>

{{-- <div class="aside-widget text-center" aria-label="Advertisement Section">
  <a href="#" style="display: inline-block; margin: auto;" aria-label="Advertisement">
    <img class="img-responsive" src="./img/ad-1.jpg" alt="Advertisement">
  </a>
</div> --}}
