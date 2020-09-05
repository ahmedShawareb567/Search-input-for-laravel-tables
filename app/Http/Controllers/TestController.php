<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $posts = Post::paginate(5);
    return view('welcome' ,[
        'posts' => $posts
    ]);
    }
    public function search(Request $request){
        if($request['data'] != '' ){
            $data = Post::where('title', 'like', '%'.$request['data'].'%')->get();
            $elements = view('ajax.ajax')->with([
                'posts' => $data
            ])->renderSections();
            return response()->json([
                'status' => true,
                'msg'    => 'success',
                'data'   => $elements['content']
            ]);
        }else{
            $mainData = Post::paginate(5);
            $elements = view('ajax.ajax')->with([
                'posts' => $mainData
            ])->renderSections();
            return response()->json([
                'status' => true,
                'msg'    => 'success',
                'data'   => $elements['content']
            ]);
        }
    }
}
