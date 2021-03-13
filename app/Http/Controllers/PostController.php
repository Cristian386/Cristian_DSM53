<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\category;
use App\Models\posts_tags;
use App\Models\tags;
use App\Models\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function pantallaInicio(){

    }

    public function PostCategory(){
        $category = Category::findorfail($id);
        $posts = Post::where('category_id', $category->id)
        ->latest('id')
        ->limit(3)
        ->get();
        return response()->json([
            'categoria' => $category,
            'articulo'  => $posts
        ]);
    }
    
    public function categories(){
        $categories = Category::all();
        return response()->json(['Categories' => $categories ]);
    }
    public function unaCategoria($id){
        $category = Category::where('id',$id)->get();
        $posts = Post::where('category_id', $category->id)->get();
             return response()->json([
                'categoria' => $category,
                'articulo'  => $posts
            ]);
    }
    public function cuerpoPost($id){
        $post = Post::where('id',$id)->get();
             return response()->json(['Post'=> $post]);
    }

    public function slider(){
        $posts = Post::all()->take(10);
        return response()->json(['Posts' => $posts]);
    }

    public function examenenpoint2(){
        $category = Category::all()->last()
        ->take(3)
        ->get();
        $posts = Post::where('category_id', '1' || '2' || '3')->latest()
        ->take(3)
        ->get();
        return response()->json([
            'categoria' => $category,
            'post'  => $posts,
            'categoria' => $category,
            'post'  => $posts,
            'categoria' => $category,
            'post'  => $posts
        ]);
    }


    public function exaEnPoint(){
        $categorie1 = Category::where('id', '5')->latest() ->select(['nombre','description']) ->get();
        $post1 = Post::where('category_id', '5')->latest() ->take(3) ->select(['title', 'description', 'slug']) ->get();
        $categorie2 = Category::where('id', '8')->latest() ->select(['nombre','description']) ->get();
        $post2 = Post::where('category_id', '6')->latest() ->take(3) ->select(['title', 'description', 'slug']) ->get();
        $categorie3 = Category::where('id', '12')->latest() ->select(['nombre','description']) ->get();
        $post3 = Post::where('category_id', '8')->latest() ->take(3) ->select(['title', 'description', 'slug']) ->get();
        return response()->json([
            'categoria1' => $categorie1,
            'posts1'  => $post1,
            'categoria2' => $categorie2,
            'posts2'  => $post2,
            'categoria3' => $categorie3,
            'posts3'  => $post3
        ]);
    }
}
