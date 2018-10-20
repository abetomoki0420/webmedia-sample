<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Image;

class MediaController extends Controller
{

    function index(){

      $posts = Post::latest()->paginate(8);

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

      $user = Auth::user();
      $user_id = $user->id ;

      $post = new Post();
      $post->user_id = $user_id ;
      $post->title = $title ;
      $post->body = $body ;
      $post->save();

      if( $request->has('image') && $request->file('image')->isValid() ){
        $image = new Image();
        $image->user_id = $user_id ;
        $image->post_id = $post->id ;
        $image_name = $post->id . ".jpg" ;
        $image->name = $image_name ;
        $image->save();
        Storage::putFileAs('public/images' , $request->file('image') , $image_name );
      }

      return redirect('/resultPost');
    }

    function resultPost(){
      return view('resultPost');
    }

    function editPost( $id ){
      $post = Post::find( $id );

      return view('editPost')->with('post' , $post );
    }

    function edit( Request $request ){
      $post_id = $request->input('post_id');
      $editted_title = $request->input('title');
      $editted_body = $request->input('body');
      $post = Post::find( $post_id );
      $post->title = $editted_title ;
      $post->body = $editted_body;
      $post->save();

      return redirect('/resultEdit');
    }

    function resultEdit(){
      return view('resultEdit');
    }

    function deletePost( $id ){
      $post = Post::find($id);

      $post->delete();

      return redirect('/resultDelete');
    }

    function resultDelete(){
      return view('resultDelete');
    }
}
