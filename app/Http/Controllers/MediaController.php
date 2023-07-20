<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

class MediaController extends Controller
{
    public function getAddMedia(){
        return view('admin.media.media');
    }
    public function postAddMedia(Request $request){
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
        dd($time);
    }
}