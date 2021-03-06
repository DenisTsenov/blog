<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class BlogController extends Controller
{
    
    public function getIndex() {
        
        $posts = Post::orderBy('id', 'desc')->paginate(3);
        
        return view('blog.index')->withPosts($posts);
        
    }
    
    public function getSingle($slug){
       //take from  the  db based on  slug
        $post =  Post::where('slug', '=', $slug)->first();
        
        return view('blog/single')->withPost($post);
        //return  the  view with  the object
    }
}
