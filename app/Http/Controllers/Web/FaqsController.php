<?php

namespace App\Http\Controllers\Web;

use App\Faq;
use App\FaqCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Faq Categories
        $faq_categories = FaqCategory::where('status', '1')
                                    ->orderBy('title', 'ASC')
                                    ->get();

        // Faqs                                
        $faqs = Faq::where('status', '1')
                    ->orderBy('id', 'desc')
                    ->paginate(10);

        return view('faqs', compact('faq_categories', 'faqs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function category($slug)
    {
        // Faq Categories
        $faq_categories = FaqCategory::where('status', '1')
	                                ->orderBy('title', 'ASC')
	                                ->get();

        $current_category = FaqCategory::where('slug', $slug)->firstOrFail();

        // Faqs                                
        $faqs = Faq::where('category_id', $current_category->id)
        			->where('status', '1')
                    ->orderBy('id', 'desc')
                    ->paginate(10);

        return view('faq-category', compact('faq_categories', 'faqs', 'current_category'));
    }
}
