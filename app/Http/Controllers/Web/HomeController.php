<?php

namespace App\Http\Controllers\Web;

use App\Faq;
use App\Video;
use App\Article;
use App\ArticleCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Article Categories
        $article_categories = ArticleCategory::where('home_flag', '1')
                                            ->where('status', '1')
                                            ->orderBy('title', 'asc')
                                            ->get();

        // Articles                                
        $articles = Article::where('status', '1')
                            ->orderBy('id', 'desc')
                            ->get();


        // Videos
        $videos = Video::where('home_flag', '1')
                        ->where('status', '1')
                        ->orderBy('id', 'desc')
                        ->take(5)
                        ->get();


        // Faqs
        $faqs = Faq::where('home_flag', '1')
                    ->where('status', '1')
                    ->orderBy('id', 'desc')
                    ->take(5)
                    ->get();

        return view('index', compact('article_categories', 'articles', 'videos', 'faqs'));
    }
}
