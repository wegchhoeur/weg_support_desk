<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\Contact;
use App\Video;
use App\Faq;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Page Data
        $this->title = 'Dashboard';
        $this->url = 'dashboard';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = $this->title;
        $url = $this->url;

        $articles = Article::all();
        $faqs = Faq::all();
        $videos = Video::all();
        $contacts = Contact::all();

        return view('admin.index', compact('title', 'url', 'articles', 'faqs', 'videos', 'contacts'));
    }
}
