<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\View\View;


class BlogController extends Controller
{
    public function create():view
    {
        $data=Category::all();
        $countries=Country::all();


        return view('create' ,compact('data','countries'));
    }

    public function showByCategory($id)
{
    $category = Form::where('cat_id', $id)->get();
    // dd($category);
    // $data = $category->data;
    // $blogs=$category->blogs;

    return view('blogs.index', compact('category'));
}

    public function store(Request $request)
    {
        $data = new Form();
        $data->name = $request->name;
        $data->cat_id = $request->cat_id;
        $data->cname = $request->cname;

        $images = [];

        if ($request->hasFile('image')) {
            $files = $request->file('image');

            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('upload/blog', $name);
                $images[] = $name;
            }
        }
        // dd($images);
        $data->images = implode("|", $images);

        $data->save();

        return redirect()->route('table')->with('success', 'Data Stored');
    }



    public function table():View
    {
        $data=Form::all();

        return view('table',compact('data'));
    }
    public function edit($id){
        $data=Form::find($id);
        $data1=Category::all();
        return view('edit',compact('data','data1'));
    }
    public function update(Request $request, $id)
{
    // $request->validate([
    //     'name' => 'required',
    //     'cname' => 'required',
    //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    // ],[
    //     'name.required' => 'Product Name is required.',
    //     'cname.required' => 'Description is required.', ] );

    $data = Form::find($id);
    $data->name = $request->name;
    $data->cat_id = $request->cat_id;
    $data->cname = $request->cname;

    if ($request->hasFile('image')) {
        $files = $request->file('image');

        foreach ($files as $file) {
            $name = $file->getClientOriginalName();
            $file->move('upload/blog', $name);
            $images[] = $name;
        }
    }
    $data->images = implode("|", $images);

    $data->save();

    return redirect()->route('table')->with('success', 'Data Updated');
}

    public function delete($id)
    {
        $data=Form::find($id);
        $data->delete();
        session()->flash('msg', 'Form deleted successfully!');

        return redirect()->route('table')->with('error','Data Deleted');;

    }
    public function show($id){

        $form = Form::find($id);


        $data = Form::with('category')->find($id);
        // dd($data);
        return view('show', compact('data','form'));
    }


}
