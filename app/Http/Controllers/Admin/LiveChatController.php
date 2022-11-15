<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LiveChat;
use Toastr;

class LiveChatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Page Data
        $this->title = 'Live Chat';
        $this->url = 'livechat';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $row = LiveChat::first();

        $title = $this->title;
        $url = $this->url;

        return view('admin.'.$url.'.index', compact('row', 'title', 'url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;

        // Status
        if($request->status == null || $request->status != 1){
            $status = 0; 
        }
        else {
            $status = 1; 
        }

        $request->request->add(['status' => $status]); //add request

        // -1 means no data row found
        if($id == -1){
            // Insert Data
            $input = $request->all();
            $data = LiveChat::create($input);
        }
        else{
            // Update Data
            $data = LiveChat::find($id);

            $input = $request->all();
            $data->update($input);
        }


        Toastr::success('Updated Successfully!', 'success');

        return redirect()->back();
    }
}
