<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
class GalleryController extends Controller
{
    public function getAddGallery()
    {
        //<!--dd('hello');-->
        return view('admin.gallery.addgallery');
    }
    public function postAddGallery(Request $request)
    {
        $title=$request->title;
        $photo=$request->photo;
       
        if($photo){
            //generate unique name for photo
            $time=md5(time()).'.'.$photo->getClientOriginalExtension();
             // to move photo into folder
            $photo->move('site/uploads/gallery/',$time);
            $gallery=new Gallery;
             $gallery->title    =   $title;
             $gallery->photo    =   $time;
             // dd($photo);
        }
        else{
             $time=Null;
        }
        
        $gallery->save();
        return redirect()->route('getManageGallery');
        
    }
    public function getManageGallery()
    {
        $data = [
            'galleries' => gallery::latest()->get(),
        ];
       
        return view('admin.gallery.managegallery',['galleries' => Gallery::paginate(3)]); //collection
    }
    public function getDeleteGallery (Gallery $gallery)
    {
       $gallery->delete();
      return redirect()->route('getManageGallery');
    }
}