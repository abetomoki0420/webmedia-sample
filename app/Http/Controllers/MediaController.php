<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Image;

class MediaController extends Controller
{

    function index(){

      $posts = Post::all();

      return view('index')->with('posts' , $posts );
    }

    function detail($id){
      $post = Post::find( $id );

      $image = $post->image ;
      if( $image != null ){
        $imageUrl = Storage::url( 'public/images/' . $image->name );
        return view('detail')
          ->with(['post' => $post ,
                  'imageUrl' => $imageUrl ]);
      }else{
        return view('detail')
          ->with(['post' => $post ,
                  'imageurl' => null] );
      }

    }

    function createPost(){
      return view('createPost');
    }

    function post(Request $request ){
      $request->validate([
        'title' => 'required' ,
        'body' => 'required' ,
        'image' => 'image'
      ]);

      $title = $request->input('title');
      $body = $request->input('body');

      $user_id = 1 ; //Dummy

      $post = new Post();
      $post->user_id = $user_id ;
      $post->title = $title ;
      $post->body = $body ;
      $post->save();

      // $request->file('image')->store('public/images');
      if( $request->has('image') && $request->file('image')->isValid() ){
        $image = new Image();
        $image->user_id = $user_id ;//Dummy
        $image->post_id = $post->id ;
        $image_name = $post->id . ".jpg" ;
        $image->name = $image_name ;
        $image->save();
        Storage::putFileAs('public/images' , $request->file('image') , $image_name );
      }

      return view('resultPost');
    }
}
