<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function getAddMedia(){
        return view('admin.media.media');
    }
    public function postAddMedia(Request $request){
         // Validate the request data
    $validator = Validator::make($request->all(), [
        
        'media_icon' => 'image|mimes:png',
        
    ]);

    // Check if the validation fails
    if ($validator->fails()) {
        dd('only png image');
        return redirect()->back()->withErrors($validator)->withInput();
    }
        $media_name=$request->media_name;
        $media_icon=$request->media_icon;
        $media_url=$request->media_url;
        if($media_icon){
            //generate unique name for photo
            $time=md5(time()).'.'.$media_icon->getClientOriginalExtension();
            // to move photo into folder
            $media_icon->move('site/uploads/media/',$time);
            $media=new Media;
            $media->media_name    =   $media_name;
            $media->media_url  =   $media_url;
             $media->media_icon    =   $time;
             // dd($photo);
             
            }
            else{
                $time=Null;
            }
            $media->save();
            return redirect()->route('getManageMedia');
        
        
   
    }
    public function getManageMedia()
    {
        $data = [
            'media' => media::latest()->get(),
        ];
       
        return view('admin.media.managemedia',['media' => media::paginate(5)]); //collection
    }
    
    public function getDeleteMedia (Media $media)
    {
       $media->delete();
      return redirect()->route('getManageMedia');
    }
}