<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts=Discount::all();

        return view('admin.discounts.index',compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $discount=null;

        return view('admin.discounts.add_edit',compact('discount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "code"=>"required|unique:discounts,code",
            "percentage"=>"required|numeric",
            'start_date'=>'required|date',
            'start_time'=>'required',
            'end_date'=>'required|date',
            'end_time'=>'required',
            'active'=>'nullable',
        ]);

        $startDateTime=$request->start_date." ".$request->start_time;
        $endDateTime=$request->end_date." ".$request->end_time;

        Discount::create([
            "code"=>$request->code,
            "discount_percentage"=>$request->percentage,
            "start_date_time"=>$startDateTime,
            "end_date_time"=>$endDateTime,
            "is_active"=>$request->active == "on" ? 1 : 0,
        ]);

        return redirect()->route('admin.discounts.index')->with('success','Discount code added successfully');

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
        $discount=Discount::findorfail($id);

        $startDateTimeArr=explode(" ",$discount->getRawOriginal('start_date_time'));


        $discount->start_date=$startDateTimeArr[0];
        $discount->start_time=$startDateTimeArr[1];

        $endDateTimeArr=explode(" ",$discount->getRawOriginal('end_date_time'));

        $discount->end_date=$endDateTimeArr[0];
        $discount->end_time=$endDateTimeArr[1];

        return view('admin.discounts.add_edit',compact('discount'));
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
        $discount=Discount::findorfail($id);

        $request->validate([
            "code"=>"required|unique:discounts,code,".$discount->id,
            "percentage"=>"required|numeric",
            'start_date'=>'required|date',
            'start_time'=>'required',
            'end_date'=>'required|date',
            'end_time'=>'required',
            'active'=>'nullable',
        ]);

        $startDateTime=$request->start_date." ".$request->start_time;
        $endDateTime=$request->end_date." ".$request->end_time;

        $discount->update([
            "code"=>$request->code,
            "discount_percentage"=>$request->percentage,
            "start_date_time"=>$startDateTime,
            "end_date_time"=>$endDateTime,
            "is_active"=>$request->active == "on" ? 1 : 0,
        ]);

        return redirect()->route('admin.discounts.index')->with('success','Discount updated successfully');
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
