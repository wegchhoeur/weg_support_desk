<?php

namespace App\Http\Controllers\Web;

use App\Article;
use App\ArticleCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Article Categories
        $article_categories = ArticleCategory::where('status', '1')
                                            ->orderBy('title', 'ASC')
                                            ->paginate(9);

        // Articles                                
        $articles = Article::where('status', '1')
                            ->orderBy('id', 'desc')
                            ->get();

        return view('articles', compact('article_categories', 'articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function category($slug)
    {
        // Article Category
        $article_category = ArticleCategory::where('slug', $slug)
                                            ->where('status', '1')
                                            ->firstOrFail();

        // Articles                                
        $articles = Article::where('category_id', $article_category->id)
                            ->where('status', '1')
                            ->orderBy('id', 'desc')
                            ->paginate(9);

        return view('article-category', compact('article_category', 'articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Article Categories
        $article_categories = ArticleCategory::where('status', '1')
                                            ->orderBy('title', 'ASC')
                                            ->get();

        // Article                                
        $article = Article::where('slug', $slug)
                            ->where('status', '1')
                            ->firstOrFail();

        return view('article', compact('article_categories', 'article'));
    }
}
