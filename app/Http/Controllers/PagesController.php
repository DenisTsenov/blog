<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use Mail;

use Session;
class PagesController extends Controller{
 
    public function getIndex(){
        
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        
       return view('staticPages.welcome')->withPosts($posts);
    }
    
     public function getContact(){
        return view('staticPages.contact');
    }
    
    public function getAbout(){
        $first = 'Denis';
        $last = 'Cenov';
        $email = 'cenovdenis@gmil.com';
        $fullname = $first .' '. $last;
        
        $data = array();
        $data['email'] = $email;
        $data['fullname'] = $fullname;
        return view('staticPages.about')->withData($data);
    } 
    
    public function postContact(Request $request){
        $this->validate($request, array(
            'email' => 'required|email',
            'subject' => 'required|min:3|max:500',
            'mesage' => 'required|min:10|max:5000')   
        );
        
        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'mesage' => $request->mesage);
        
        Mail::send('emails.contact', $data,  function($message) use($data){
            $message->from($data['email']);
            $message->to('cenovdenis@gmail.com');
            $message->subject($data['subject']);
        });
        
        Session::flash('success', 'Your mail was successfully sent!');
        
        return redirect('/');
    }
    
}