<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Crop;

class CropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crops = Crop::all();
        return view('admin.crop.all-crop')->with('allCrop',$crops);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.crop.crop-add');
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
             'cropName'=>'bail | required | min:2 | max:20',
             'TotalWeeks'=>'bail | required | integer | min:1 ',
             'TotalCost' =>'bail | required | numeric | min:2',
             'EstimatedProduction'=>'bail | required | min:2',
            ]);

         $crop = new Crop;

         $crop->Name = $request->cropName;
         $crop->CropGroupName = $request->CropGroupName;
         $crop->TimePeriod = $request->TimePeriodStart."-".$request->TimePeriodEnd;
         $crop->TotalWeeks = $request->TotalWeeks;
         $crop->TotalCost = $request->TotalCost;
         $crop->EstimatedProduction = $request->EstimatedProduction." ".$request->unit;
         $crop->LandType = $request->LandType;
         $crop->WaterSource = $request->WaterSource;

         $crop->save();
         $request->session()->flash('successMessage', 'Data Insert Successfully');
         return redirect()->route('crop.index');
         
          
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
        $crop = Crop::where('CropId',$id)->first(); 
        $TimePeriod = explode("-",$crop->TimePeriod); 
        $EstimatedProduction = explode(" ",$crop->EstimatedProduction); 
        return view('admin.crop.crop-edit')
                    ->with('crop',$crop)
                    ->with('timePeriod',$TimePeriod)
                    ->with('EstimatedProduction',$EstimatedProduction);
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
             'cropName'=>'bail | required | min:2 | max:20',
             'TotalWeeks'=>'bail | required | integer | min:1 ',
             'TotalCost' =>'bail | required | numeric | min:2',
             'EstimatedProduction'=>'bail | required | min:2',
            ]);

         $crop = Crop::find($id);

         $crop->Name = $request->cropName;
         $crop->CropGroupName = $request->CropGroupName;
         $crop->TimePeriod = $request->TimePeriodStart."-".$request->TimePeriodEnd;
         $crop->TotalWeeks = $request->TotalWeeks;
         $crop->TotalCost = $request->TotalCost;
         $crop->EstimatedProduction = $request->EstimatedProduction." ".$request->unit;
         $crop->LandType = $request->LandType;
         $crop->WaterSource = $request->WaterSource;

         $crop->save();
         $request->session()->flash('successMessage', 'Data Update Successfully');
         return redirect()->route('crop.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crop = Crop::find($id);

        $crop->delete();
        Session()->flash('successMessage', 'Data Delete Successfully');
        return redirect()->route('crop.index');
    }
}
