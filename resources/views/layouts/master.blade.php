<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>Blog template for Bootstrap</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<!-- Blog template -->
		<link href="/css/blog.css" rel="stylesheet">
    </head>
    <body>  
    	@include ('layouts.nav')
        @if ($flash = session('message'))
            <div id="flash-message" class="alert alert-success" role="alert">
                {{ $flash }}
            </div>
        @endif    

    	<div class="blog-header">
      		<div class="container">
        		<h1 class="blog-title">The Bootstrap Blog</h1>
        		<p class="lead blog-description">An example blog template built with Bootstrap.</p>
      		</div>
    	</div>
    	<div class="container">
    		<div class="row">
    			@yield ('content')
    			@include ('layouts.sidebar')
    		</div> <!-- row -->
    	</div> <!-- container -->	

    	@include ('layouts.footer')
    </body>
</html>
