<?php

namespace App\Http\Controllers\Web;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VidoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Videos                                
        $videos = Video::where('status', '1')
                        ->orderBy('id', 'desc')
                        ->paginate(9);

        return view('videos', compact('videos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Video                                
        $video = Video::where('slug', $slug)
                        ->where('status', '1')
                        ->firstOrFail();

        // Video Lists                                
        $video_lists = Video::where('status', '1')
                        ->inRandomOrder()
                        ->take(15)
                        ->get();

        return view('video', compact('video', 'video_lists'));
    }
}
