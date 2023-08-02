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
        $request->validate([
            'title'=> 'required',
            'photo'=> 'required',
        ]);
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
        return redirect()->route('getManageGallery')->with('success', 'Product added successfully');
        
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
    
    public function getEditGallery(Gallery $gallery)
    {
      $data = ['gallery' => $gallery];
              return view('admin.gallery.editgallery',$data);
    }
    public function postEditGallery(Request $request, Gallery $gallery){
        $photo = $request->file('photo');
        if($photo){

            $time=md5(time()).'.'.$photo->getClientOriginalExtension();
            $photo->move('site/uploads/gallery/',$time);

            $gallery->title = $request->input('title');
            $gallery->photo = $time;
            $gallery->save();
        }
        else{
            $gallery->title = $request->input('title');
            $gallery->save();
        }
       
        return redirect()->route('getManageGallery');    
    }
    
}