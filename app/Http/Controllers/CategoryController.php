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
    public function getManageCategroy()
    {
        //<!--dd('hello');-->
       
        return view('admin.category.manage');
    }
    

    public function postAddCategory(Request $request)
    {
        $title=$request->title;
        $photo=$request->photo;
        $details=$request->details;
        if($photo){
            //generate unique name for photo
            $time=md5(time()).'.'.$photo->getClientOriginalExtension();
             // to move photo into folder
            $photo->move('site/uploads/category/',$time);
            $category=new category;
             $category->title    =   $title;
             $category->photo    =   $time;
             // dd($photo);
        }
        else{
             $time=Null;
        }
        $category->details  =   $details;
        $category->save();
        dd($time);
        
    }
}