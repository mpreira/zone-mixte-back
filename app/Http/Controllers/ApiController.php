<?php

namespace App\Http\Controllers;

use App\Models\Sports;
use App\Models\Article;
use App\Models\Video;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     *
     */
    public function listUsers(){
        return response()->json(User::all());
    }

    public function uniqueUser($id){
        return response()->json(User::find($id));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * sports
     */
    public function listSports(){
        return response()->json(Sports::all());
    }

    public function uniqueSport($id){
        return response()->json(Sports::find($id));
    }

    /**
     * articles
     */
    public function listArticles(){
        return response()->json(Article::all());
    }

    public function uniqueArticle($id){
        return response()->json(Article::find($id));
    }

    /**
     * videos
     */
    public function listVideos(){
        return response()->json(Video::all());
    }

    public function uniqueVideo($id){
        return response()->json(Video::find($id));
    }

    /**
     * comments
     */
    public function listComments(){
        return response()->json(Comment::all());
    }

    public function uniqueComment($id){
        return response()->json(Comment::find($id));
    }
}
