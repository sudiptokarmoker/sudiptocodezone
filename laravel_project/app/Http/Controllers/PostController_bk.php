<?php

namespace App\Http\Controllers;

class PostController{
    public function show($post){
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
    }
}

?>