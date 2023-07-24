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
        $data = [
            'categories' => category::latest()->get(),
        ];
       
        return view('admin.category.manage',['categories' => category::paginate(5)]); //collection
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
      return redirect()->route('getManageCategroy');
        // dd($time);
    }

    
    public function editcategory($id)
    {
        $data = [
            'category' => category::find($id),
        ];
        return view('admin.category.edit', $data);
    }

    
    public function index()
    {
        return view('category.index',['categories' => category::all()]); //collection
    }
    
}