<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Insecticide;

class InsecticideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insecticides = Insecticide::all();

        return view('admin.insecticide.all-insecticide')->with('allInsecticide',$insecticides);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.insecticide.insecticide-add');
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
            'Name' =>'bail | required | min:2',
            'PricePerUnit' =>'bail | required | min:2',
            'InsectName' =>'bail | required | min:2',
            'DiseaseName' =>'bail | required | min:2',
            ]);
        $insecticide = new Insecticide;
        $insecticide->Name = $request->Name;
        $insecticide->PricePerUnit = $request->PricePerUnit;
        $insecticide->InsectName = $request->InsectName;
        $insecticide->DiseaseName = $request->DiseaseName;

        $insecticide->save();
        $request->session()->flash('successMessage', 'Data Insert Successfully');
        return redirect()->route('insecticide.index');

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
        $insecticide = Insecticide::find($id);
        return view('admin.insecticide.insecticide-edit')->with('insecticide',$insecticide);
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
            'Name' =>'bail | required | min:2',
            'PricePerUnit' =>'bail | required | min:2',
            'InsectName' =>'bail | required | min:2',
            'DiseaseName' =>'bail | required | min:2',
            ]);
        $insecticide = Insecticide::find($id);
        $insecticide->Name = $request->Name;
        $insecticide->PricePerUnit = $request->PricePerUnit;
        $insecticide->InsectName = $request->InsectName;
        $insecticide->DiseaseName = $request->DiseaseName;

        $insecticide->save();
        $request->session()->flash('successMessage', 'Data Update Successfully');
        return redirect()->route('insecticide.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $insecticide = Insecticide::find($id);

        $insecticide->delete();
        Session()->flash('successMessage', 'Data Delete Successfully');
        return redirect()->route('insecticide.index');
    }
}
