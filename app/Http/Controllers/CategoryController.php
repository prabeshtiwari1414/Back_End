<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;


class CategoryController extends Controller
{
    public function getAddCategory()
    {
        //<!--dd('hello');-->
        return view('admin.category.add');
    }
    public function postAddCategory(Request $request)
    {
        $title=$request->title;
        $photo=$request->photo;
        $details=$request->details;
        //generate unique name for photo
        $time=md5(time()).'.'.$photo->getClientOriginalExtension();
        dd($time);
        $category=new category;
        $category->title=$title;
        $category->photo=$photo;
        // dd($photo);
        $category->details=$details;
        $category->save();
       
    }
}