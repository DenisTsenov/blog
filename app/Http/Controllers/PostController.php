<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Tag;
use App\Category;
use Session;
use Purifier;
use Image;
use Storage;
class PostController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //create  a  variable  and  store all  the blog posts in it  from  db
        $posts = Post::orderBy('id', 'desc')->Paginate(3);
        
        //return  a view  and pass  the varaiable  to it
        return  view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //validate  the incoming  data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required',
            'featured_image' => 'sometimes|image'
        ));
        
        //store  the  data in db
        $post =  new Post;
        
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);
        
        //save image
        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            
            $post->image = $filename;
        }
        
        $post->save();
        
        $post->tags()->sync($request->tags, false);
        
        //return flash  message if success
        Session::flash('success', 'The  blog  was successfully save!');
        
        //redirect to  another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //store  the  id for  the  curent post
        $post = Post::find($id);
        
        //return  view  with the id for the post
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //find the post in  the  db  and save it sa a varaiable
        $posts = Post::find($id);
        $categories = Category::all();
        $cats = array();
        
        $tags = Tag::all();
        $tags2 = array();
        foreach($tags as $tag){
            $tags2[$tag->id] = $tag->name;
        }
        
        foreach($categories as $category){
            $cats [$category->id] = $category->name;  
        }
        //return  the  view with  the  var
        return view('posts.edit')->withPosts($posts)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //validate the data
        $post = Post::find($id);
        
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
                'category_id' => 'required|integer',
                'body' => 'required',
                'featured_image' => 'image'
            ));
        //save  the  data  to  db
        //$post = Post::find($id);
        
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = Purifier::clean($request->input('body'));
                
        if($request->hasFile('featured_image')){
            //add new  photo
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $oldFilename = $post->image;
            
            //update datbase
            $post->image = $filename; 
            
            //delete the old  photo
            Storage::delete($oldFilename);
        }
        
        $post->save();
        if(isset($request->tags)){
            $post->tags()->sync($request->tags);
        }else{
            $post->tags()->sync(array());
        }
        
        //set flash success message 
        Session::flash('success', 'The post was succeesufully changed!');
        
        //redirect with  flash  data  to  the  posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //find the post in db
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        //delete  the  post with  the value of  the  $id var
        $post->delete();
        
        //add flash  message for  successuflly delete
        
        Session::flash('success', ' You delete the post successfully!');
        
        //redirect the user
        return redirect()->route('posts.index');
    }
}
