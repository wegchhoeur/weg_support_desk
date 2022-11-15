<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use App\Social;
use App\User;
use Toastr;
use Image;
use File;
use Auth;
use Hash;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Page Data
        $this->title = 'Setting';
        $this->url = 'setting';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $row = Setting::where('status', 1)->first();
        $social = Social::where('status', 1)->first();

        $title = $this->title;
        $url = $this->url;

        return view('admin.'.$url.'.index', compact('row', 'social', 'title', 'url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function siteInfo(Request $request)
    {
        // Field Validation
        $request->validate([
            'title' => 'required|max:250',
        ]);

        $id = $request->id;


        // Logo upload, fit and store inside public folder 
        if($request->hasFile('logo')){

            //Delete Old Image
            $old_file = Setting::find($id);

            if(isset($old_file->logo_path)){
                $file_path = public_path('uploads/'.$this->url.'/'.$old_file->logo_path);
                if(File::isFile($file_path)){
                    File::delete($file_path);
                }
            }

            //Upload New Image
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('logo')->getClientOriginalExtension();
            $logoNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$this->url.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            //Resize And Crop as Fit image here (auto width, 80 height)
            $thumbnailpath = $path.$logoNameToStore;
            $img = Image::make($request->file('logo')->getRealPath())->resize(null, 80, function ($constraint) { $constraint->aspectRatio(); })->save($thumbnailpath);
        }
        else{

            $old_file = Setting::find($id);

            if(isset($old_file->logo_path)){
                $logoNameToStore = $old_file->logo_path; 
            }
            else {
                $logoNameToStore = Null;
            }
            
        }



        // Favicon upload, fit and store inside public folder 
        if($request->hasFile('favicon')){

            //Delete Old Image
            $old_file = Setting::find($id);

            if(isset($old_file->favicon_path)){
                $file_path = public_path('uploads/'.$this->url.'/'.$old_file->favicon_path);
                if(File::isFile($file_path)){
                    File::delete($file_path);
                }
            }

            //Upload New Image
            $filenameWithExt = $request->file('favicon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file('favicon')->getClientOriginalExtension();
            $faviconNameToStore = $filename.'_'.time().'.'.$extension;

            //Crete Folder Location
            $path = public_path('uploads/'.$this->url.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            //Resize And Crop as Fit image here (64 width, 64 height)
            $thumbnailpath = $path.$faviconNameToStore;
            $img = Image::make($request->file('favicon')->getRealPath())->fit(64, 64, function ($constraint) { $constraint->upsize(); })->save($thumbnailpath);
        }
        else{

            $old_file = Setting::find($id);

            if(isset($old_file->favicon_path)){
                $faviconNameToStore = $old_file->favicon_path; 
            }
            else {
                $faviconNameToStore = Null;
            }
            
        }



        // -1 means no data row found
        if($id == -1){
            // Insert Data
            $data = new Setting;
            $data->title = $request->title;
            $data->description = $request->details;
            $data->keywords = $request->keywords;
            $data->logo_path = $logoNameToStore;
            $data->favicon_path = $faviconNameToStore;
            $data->footer_text = $request->footer_text;
            $data->status = 1;
            $data->created_by = Auth::user()->id;
            $data->save();
        }
        else{
            // Update Data
            $data = Setting::find($id);
            $data->title = $request->title;
            $data->description = $request->details;
            $data->keywords = $request->keywords;
            $data->logo_path = $logoNameToStore;
            $data->favicon_path = $faviconNameToStore;
            $data->footer_text = $request->footer_text;
            $data->status = 1;
            $data->updated_by = Auth::user()->id;
            $data->save();
        }


        Toastr::success('Updated Successfully!', 'success');

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contactInfo(Request $request)
    {
        // Field Validation
        $request->validate([
            'phone_no' => 'required|max:50',
            'phone_no2' => 'nullable|max:50',
            'email_address' => 'required|max:250',
            'email_address2' => 'nullable|max:250',
            'contact_address' => 'required',
            'contact_mail' => 'required|max:250',
        ]);

        $id = $request->id;


        // -1 means no data row found
        if($id == -1){
            // Insert Data
            $data = new Setting;
            $data->phone_one = $request->phone_no;
            $data->phone_two = $request->phone_no2;
            $data->email_one = $request->email_address;
            $data->email_two = $request->email_address2;
            $data->contact_address = $request->contact_address;
            $data->contact_mail = $request->contact_mail;
            $data->status = 1;
            $data->created_by = Auth::user()->id;
            $data->save();
        }
        else{
            // Update Data
            $data = Setting::find($id);
            $data->phone_one = $request->phone_no;
            $data->phone_two = $request->phone_no2;
            $data->email_one = $request->email_address;
            $data->email_two = $request->email_address2;
            $data->contact_address = $request->contact_address;
            $data->contact_mail = $request->contact_mail;
            $data->status = 1;
            $data->updated_by = Auth::user()->id;
            $data->save();
        }


        Toastr::success('Updated Successfully!', 'success');

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changeMail(Request $request)
    {
        // Field Validation
        $request->validate([
            'email' => 'required|email',
        ]);

        // Check
        if($request->email != Auth::user()->email){
            $user = User::find(Auth::user()->id);
            $user->email = $request->email;
            $user->save();
            Auth::logout();
            
            Toastr::success('Updated Successfully!', 'success');

            return redirect()->route('login');
        }
        else{
            Toastr::error('You are entered same email address!', 'error');

            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changePass(Request $request)
    {
        // Field Validation
        $request->validate([
            'old_password' => 'required',
            'password' => 'nullable|confirmed|min:8',
        ]);

        $oldPassword = $request->old_password;
        $hashedPassword = Auth::user()->password;

        // Check old password for validation
        if(Hash::check($oldPassword, $hashedPassword)){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            
            Toastr::success('Password Change Successfully!', 'success');

            return redirect()->route('login');
        }
        else{
            Toastr::error('Current Password Is Invalid!', 'error');

            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function socialInfo(Request $request)
    {
        $id = $request->id;


        // -1 means no data row found
        if($id == -1){
            // Insert Data
            $input = $request->all();
            $data = Social::create($input);
        }
        else{
            // Update Data
            $data = Social::find($id);

            $input = $request->all();
            $data->update($input);
        }


        Toastr::success('Updated Successfully!', 'success');

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function customCode(Request $request)
    {
        $id = $request->id;


        // -1 means no data row found
        if($id == -1){
            // Insert Data
            $data = new Setting;
            $data->custom_css = $request->custom_css;
            $data->save();
        }
        else{
            // Update Data
            $data = Setting::find($id);
            $data->custom_css = $request->custom_css;
            $data->save();
        }


        Toastr::success('Updated Successfully!', 'success');

        return redirect()->back();
    }
}
