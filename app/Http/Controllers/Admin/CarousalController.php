<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carousal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarousalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $carousal=Carousal::find($id);

        return view("admin.carousals.add_edit",compact("carousal"));
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
        $request->validate([
              "title"=>"required",
              "subtitle"=>"required",
              "description"=>"required",
              "image"=>"nullable|image",

        ]);

        $carousal=Carousal::findorfail($id);

        $carousal->update([
            "title"=>$request->title,
            "subtitle"=>$request->subtitle,
            "description"=>$request->description,
        ]);

        if($request->hasFile("image")){
            if($carousal->image){
               Storage::delete($carousal->image);
            }

            $file=$request->file("image")->store("carousals");

            $carousal->update([
                "image"=>$file,
            ]);

        }

        return redirect()->back()->with("success","Carousal updated successfully");

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
