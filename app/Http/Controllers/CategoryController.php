<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Form;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){


        return view('category.catcreate');
    }
    public function store(Request $request){
        $request->validate([
            'catname' => 'required',
        ], [
            'catname.required' => 'Category Name is required.',
        ]);

        $data = new Category();
        $data->catname = $request->catname;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('category.table')->with('success', 'Data Stored ');
    }

public function table(){
    $data = Category::all();
    return view('category.cattable', compact('data'));
}


public function edit($id){
    $data=Category::find($id);
    return view('category.catedit',compact('data'));
}
public function update(Request $request,$id){
    $request->validate([
        'catname' => 'required',
    ], [
        'catname.required' => 'Category Name is required.',
    ]);

    $data=Category::find($id);
    $data->catname = $request->catname;
    $data->status = $request->status;
    $data->save();

    return redirect()->route('category.table')->with('success', 'Data Updated ');

}
public function delete($id){
    $data = Category::find($id);
    if (!$data) {
        return redirect()->route('category.table')->with('error', 'Category not found');
    }

    $data->delete();

     session()->flash('delete', 'Form submitted successfully!');
    return redirect()->route('category.table')->with('error','Data Deleted');
}

public function welcome(){

    $data = Category::all();
    $data1 = Form::latest()->first();
    // dd($data1);
    $blog = Form::paginate(2);
    // dd($blog);
    return view('welcome',compact('data','blog','data1'));
}



}
