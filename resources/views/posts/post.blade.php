<div class="blog-post">
    <h2 class="blog-post-title">
      <a href="/posts/{{ $p->id }}">
        {{ $p->title }}
      </a>  
    </h2>
    <p class="blog-post-meta">
    	By, {{ $p->user->name }}
      {{ $p->created_at->toFormattedDateString() }}
    	
    </p>
    <p> {{ $p->body }} </p>

            
</div><!-- /.blog-post -->