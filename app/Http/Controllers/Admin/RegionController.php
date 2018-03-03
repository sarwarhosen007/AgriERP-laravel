<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Region;
use Session;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::all();
        return view('admin.region.all-region')->with('allRegion',$regions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.region.region-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Validate the request...
        $request->validate([
            
            'RegionNumber'=>'bail| required | max:9 | numeric | ',
            'Area' => 'bail | required | string | max:10'

        ]);

        $region = new Region;
        $region->RegionNumber = $request->RegionNumber;
        $region->Area = $request->Area;

        $region->save();
        $request->session()->flash('successMessage', 'Data Insert Successfully');
        return redirect()->route('region.index');
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
        $region = Region::where('RegionId',$id)->first();   
        return view('admin.region.region-edit')->with('region',$region);
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
            
            'RegionNumber'=>'bail| required | max:9 | numeric',
            'Area' => 'bail | required | string | max:10'

        ]);

        $region = Region::where('RegionId',$id)->first();

        $region->RegionNumber = $request->RegionNumber;
        $region->Area = $request->Area;
        $region->save();

        $request->session()->flash('successMessage', 'Data Update Successfully');
        return redirect()->route('region.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $region = Region::find($id);

        $region->delete();
        Session()->flash('successMessage', 'Data Delete Successfully');
        return redirect()->route('region.index');
    }
}
