<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PageSetup;
use Toastr;

class PageSetupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Page Data
        $this->title = 'Page Setup';
        $this->url = 'page-setup';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = PageSetup::orderBy('id', 'asc')->get();

        $title = $this->title;
        $url = $this->url;

        return view('admin.'.$url.'.index', compact('rows', 'title', 'url'));
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
            'title' => 'required|max:191|unique:page_setups,title,'.$id,
        ]);

        if($request->status == 1){
            $status = 1;
        }
        else{
            $status = 0;
        }

        // Update Data
        $data = PageSetup::findOrFail($id);
        $data->title = $request->title;
        $data->meta_title = $request->meta_title;
        $data->meta_description = $request->meta_description;
        $data->meta_keywords = $request->meta_keywords;
        $data->status = $status;
        $data->save();


        Toastr::success('Updated Successfully!', 'success');

        return redirect()->back();
    }
}
