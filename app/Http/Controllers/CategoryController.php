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
            $category= new category;
            // dd($photo);
        }
        else{
            $time=Null;
        }
        $category->title    =   $title;
        $category->photo    =   $time;
        $category->details  =   $details;
        $category->save();
      return redirect()->route('getManageCategroy')->with('success', 'Category added successfully');
        // dd($time);
    }

    

    
    
    
    public function getDeleteCategory(category $category)
    {
       $category->delete();
      return redirect()->route('getManageCategroy');
    }
    public function getEditCategory(category $category)
    {
      $data = ['category' => $category];
              return view('admin.category.edit',$data);
    }
   
    public function postEditCategory(Request $request, category $category){
            $photo = $request->file('photo');
            if($photo){
    
                $time=md5(time()).'.'.$photo->getClientOriginalExtension();
                $photo->move('site/uploads/category/',$time);
    
                $category->title = $request->input('title');
                $category->details = $request->input('details');
                $category->photo = $time;
                $category->save();
            }
            else{
                $category->title = $request->input('title');
                $category->details = $request->input('details');
                $category->save();
            }
           
            return redirect()->route('getManageCategroy');    
        }
}