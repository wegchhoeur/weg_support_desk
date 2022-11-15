<?php

namespace App\Http\Controllers\Web;

use App\Faq;
use App\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        // Articles                                
        $articles = Article::where(function($query) use ($search){
                                $query->where('title', 'LIKE', '%'.$search.'%' );
                                $query->orWhere('description', 'LIKE', '%'.$search.'%' );
                            })
                            ->where('status', '1')
                            ->orderBy('id', 'desc')
                            ->paginate(9);
                            
        // Faqs
        $faqs = Faq::where(function($query) use ($search){
                        $query->where('title', 'LIKE', '%'.$search.'%' );
                        $query->orWhere('description', 'LIKE', '%'.$search.'%' );
                    })
                    ->where('status', '1')
                    ->orderBy('id', 'desc')
                    ->get();

        return view('search', compact('articles', 'faqs', 'search'));
    }
}
