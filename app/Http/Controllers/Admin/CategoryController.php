<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.categories.index' , compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $image = $request->file('image')->getClientOriginalName();
        // $request->file('image')->storeAs('public/image', $image);
        // $img = $request->file('image')->storeAs('public/image', $image);
        // return $image;
        // return $img;
        $category = new Category;

        $image = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/image', $image);
        $category->image = $image;
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->tables_number = $request->input('tables_number');


        $category->save();


        // ::create([
        //     'name'=>$request->input('name'),
        //     'description'=>$request->input('description'),
        //     'image'=>'111',
        //     'tables_number'=>$request->input('tables_number'),
        // ]);

        return redirect('/admin/restaurant');


        // $image = response()->json([
        //     'file' => $request->file('image')->getClientOriginalName()
        //  ]);
        //  return $image;

        // $image = $request->file('image')->getClientOriginalName();
        //  return $image;

        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
