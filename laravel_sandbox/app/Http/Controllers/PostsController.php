<?php
namespace App\Http\Controllers;

use DB;
use App\Post;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show($slug){
        //$post = DB::table('posts')->where('slug', $slug)->first();
        /*
        $post = Post::where('slug', $slug)->first();
        if(!$post){  
            abort(404);
        }
        */
        //dd($post);
        /*
        $posts = [
            'my-first-post' => 'Hello this is my first blog post',
            'my-second-post' => 'Hello this is my second blog post'
        ];
        if(! array_key_exists($post, $posts)){
            abort(404, 'Sorry this post does not exist');
        }
        return view('post', [
            'post' => $posts[$post]
        ]);
        */
        return view('post', [
            'post' => Post::where('slug', $slug)->firstOrFail()
        ]);
    }
}
