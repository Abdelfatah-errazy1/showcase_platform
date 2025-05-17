<div class="row">	
  <!-- Highlighted Posts -->
  @foreach($projects as $project)
    <div class="col-md-6">
      <div class="post post-thumb" aria-label="Highlighted Post: {{ $project->title }}">
        <a class="post-img" href="{{ route('projects.show', ['category' => $project->category->slug, 'project' => $project->slug]) }}">
          
          <div class="image-container">
           <div style="position: relative; width: 100%; padding-top: 56.25%; overflow: hidden; border-radius: 0.3rem;">
                <img src="{{ asset($project->image_path) }}"
                    alt="{{ ucwords($project->title) }}"
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>
        
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
              {{ ucwords($project->title) }}
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
      <h2>Recent Projects</h2>
    </div>
  </div> 

  <!-- Recent Posts -->
  @foreach($projects as $project)
    @if ($loop->iteration <= 2)
      @continue
    @endif
    <div class="col-md-4">
      <div class="post" aria-label="Recent Post: {{ $project->title }}">
       <a class="post-img" href="{{ route('projects.show', ['category' => $project->category->slug, 'project' => $project->slug]) }}">
            <div style="position: relative; width: 100%; padding-top: 56.25%; overflow: hidden; border-radius: 0.3rem;">
                <img src="{{ asset($project->image_path) }}"
                    alt="{{ ucwords($project->title) }}"
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
            </div>
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
              {{ ucwords($project->title) }}
            </a>
          </h3>
        </div>
      </div>
    </div>
    @if ($loop->iteration === 5)
      <div class="clearfix visible-md visible-lg"></div>
    @endif
    @if ($loop->iteration === 8)
      @break
    @endif
  @endforeach
</div>
