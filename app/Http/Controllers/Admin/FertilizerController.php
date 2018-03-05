<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Fertilizer;

class FertilizerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allFertilizer = Fertilizer::all();
        return view('admin.fertilizer.all-fertilizer')->with('allFertilizer',$allFertilizer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fertilizer.fertilizer-add');
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
           'Name'=>'bail | required | min:2',
           'PricePerUnit' =>'bail | required | min:2'
        ]);
        $fertilizer = new Fertilizer;
        
        $fertilizer->Name = $request->Name;
        $fertilizer->PricePerUnit = $request->PricePerUnit;

        $fertilizer->save();
        $request->session()->flash('successMessage', 'Data Insert Successfully');
        return redirect()->route('fertilizer.index');


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
        $fertilizer = Fertilizer::find($id);
        return view('admin.fertilizer.fertilizer-edit')->with('fertilizer',$fertilizer);
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
           'Name'=>'bail | required | min:2',
           'PricePerUnit' =>'bail | required | min:2'
        ]);
        $fertilizer = Fertilizer::find($id);
        
        $fertilizer->Name = $request->Name;
        $fertilizer->PricePerUnit = $request->PricePerUnit;

        $fertilizer->save();
        $request->session()->flash('successMessage', 'Data Insert Successfully');
        return redirect()->route('fertilizer.index');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fertilizer = Fertilizer::find($id);
        $fertilizer->delete();
        Session()->flash('successMessage', 'Data Delete Successfully');
        return redirect()->route('fertilizer.index');
    }
}
