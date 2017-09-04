<?php

namespace App\Http\Controllers;
use App\Task;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['home','show']);
    }
    public function home(){
       $posts = Post::latest();
        if($month = request('month')){
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }
        if($year = request('year')){
            $posts->whereYear('created_at', $year);
        }
        $posts=$posts->get();
    	return view('posts.index', compact('posts'));
    }
    public function create(){
        $tag = Tag::all();
        return view('posts.create', compact('tag'));
    }
    public function show(Post $post){
        return view('posts.show', compact('post'));
    }
    public function store(Request $request){
        //dd(request('title'));
        //dd(request()->all());
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required'
        ]);
        $c = Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);
        $tag_ids = $request->input('tag_ids');
        foreach ($tag_ids as $tagid) {
            # code...
            $c->tags()->attach($tagid);
        }
        return redirect('/');
    }
 
}
