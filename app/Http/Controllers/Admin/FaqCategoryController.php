<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\FaqCategory;
use Toastr;
use Auth;

class FaqCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Page Data
        $this->title = 'FAQ Category';
        $this->url = 'faq-category';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = FaqCategory::orderBy('id', 'desc')->get();

        $title = $this->title;
        $url = $this->url;

        return view('admin.'.$url.'.index', compact('rows', 'title', 'url'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:faq_categories,title',
        ]);

        // Insert Data
        $data = new FaqCategory;
        $data->title = $request->title;
        $data->slug = Str::slug($request->title, '-');
        $data->description = $request->details;
        $data->status = 1;
        $data->created_by = Auth::user()->id;
        $data->save();

        
        Toastr::success($this->title.' Created Successfully!', 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:191|unique:faq_categories,title,'.$id,
        ]);

        // Update Data
        $data = FaqCategory::find($id);
        $data->title = $request->title;
        $data->slug = Str::slug($request->title, '-');
        $data->description = $request->details;
        $data->status = $request->status;
        $data->updated_by = Auth::user()->id;
        $data->save();


        Toastr::success($this->title.' Updated Successfully!', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete Data
        $data = FaqCategory::find($id);
        $data->delete();

        Toastr::success($this->title.' Deleted Successfully!', 'success');

        return redirect()->back();
    }
}
