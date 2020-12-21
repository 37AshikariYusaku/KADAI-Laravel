<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;

class NewsController extends Controller
{
    //
    public function index(Request $request) {
        $posts = News::all()->sortByDesc('updated_at');
        
        if(count($posts) > 0) {
            $headline = $posts->shift();
            // $headline = $posts->shift();では、最新の記事を変数$headlineに代入し、$postsは代入された最新の記事以外の記事が格納されている
        } else {
            $headline = null;
        }
        
        return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
