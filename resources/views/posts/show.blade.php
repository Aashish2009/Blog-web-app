@extends ('layouts.master')
@section ('content')
	<div class="col-sm-8 blog-main">
		<h1> {{ $post->title }}</h1>
		{{ $post->body }}
		<hr>
		<div class="comments">
			<ul class="list-group">
				<span class="text-danger"> Comments: </span>
				@foreach ($post->comments as $comment)
					<li class="list-group-item">
						<strong> {{ $comment->created_at->diffForHumans() }},
						{{ $comment->user->name }} : &nbsp</strong>
						{{ $comment->body }}
					</li>
				@endforeach	
			</ul>
		</div>
		<div class="card">	
			<div class="card-block">
				@if (! Auth::check())
					<p class= "text-danger">You must be signed in to post comments.</p>
					<form method="GET" action="/login">
						<div class="form-group">
							<button type="submit" class="btn btn-primary"> Login </button>
						</div>
					</form>	
				@else
					<form method="POST" action="/posts/{{ $post->id }}/comments" >
						{{ csrf_field() }}
						<div class="form-group">
							<textarea name="body" placeholder="Your comments here." class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary"> Add Comment </button>
						</div>
					</form>
				@endif
				@include ('layouts.errors')
			</div> 
		</div>

	</div>	
@endsection