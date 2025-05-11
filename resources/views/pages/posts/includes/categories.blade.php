<div class="aside-widget text-center" aria-label="Advertisement section">
  <a href="#" style="display: inline-block; margin: auto;" aria-label="Advertisement">
    <img class="img-responsive" src="./img/ad-1.jpg" alt="Advertisement image">
  </a>
</div>

<div class="aside-widget" aria-label="Categories section">
  <div class="section-title">
    <h2>Categories</h2>
  </div>
  <div class="category-widget">
    <ul>
      @foreach ($categories as $category)
        <li>
          <a href="{{ route('category.posts', $category->slug) }}" 
             class="{{ $category->class }}" 
             aria-label="View category: {{ $category->name }}">
            {{ $category->name }}
            <span aria-label="Number of posts in {{ $category->name }}">{{ $category->posts_count }}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</div>

<div class="aside-widget" aria-label="Tags section">
  <div class="tags-widget">
    <ul>
      @foreach ($cat as $item)
        <li>
          <a href="#" aria-label="View posts tagged with {{ $item->name }}">{{ $item->name }}</a>
        </li>
      @endforeach
    </ul>
  </div>
</div>
