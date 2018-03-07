<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fertilizer;
use App\Insecticide;
use App\CropWeeklyTask;
use App\Crop;

class CropWeeklyTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $request->validate([
            'FertilizerTask'=>'bail | required | min: 3',
            'InsecticideTask'=>'bail | required | min: 3',
            'OtherTask'=>'bail | required | min: 3',
            ]);
        $cropweeklytask = new CropWeeklyTask;
        $cropweeklytask->WeekNumber = $request->WeekNumber;
        $cropweeklytask->CropId = $request->CropId;
        $cropweeklytask->CropInsectSysId = $request->CropInsectSysId;
        $cropweeklytask->CropFertSysId = $request->CropFertSysId;
        $cropweeklytask->FertilizerTask = $request->FertilizerTask;
        $cropweeklytask->InsecticideTask = $request->InsecticideTask;
        $cropweeklytask->OtherTask = $request->OtherTask;

        $cropweeklytask->save();
        $request->session()->flash('successMessage', 'Data Insert Successfully');
        return redirect()->route('cropweeklytask.show',$request->CropId);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crop = Crop::find($id);

        $ferlizers = Fertilizer::all();
        $insecticides = Insecticide::all();
        $cropWeeklytasks = CropWeeklyTask::paginate(1); 
        return view('admin.cropweeklytask.all-weeklytask')
                    ->with('ferlizers',$ferlizers)
                    ->with('cropWeeklytasks',$cropWeeklytasks)
                    ->with('insecticides',$insecticides)
                    ->with('crop',$crop);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cropweeklytask = CropWeeklyTask::find($id);
        $ferlizers = Fertilizer::all();
        $insecticides = Insecticide::all();
        return view('admin.cropweeklytask.cropweeklytask-edit')
                    ->with('cropweeklytask',$cropweeklytask)
                    ->with('ferlizers',$ferlizers)
                    ->with('insecticides',$insecticides);
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
            'FertilizerTask'=>'bail | required | min: 3',
            'InsecticideTask'=>'bail | required | min: 3',
            'OtherTask'=>'bail | required | min: 3',
            ]);
        $cropweeklytask = CropWeeklyTask::find($id);
        $cropweeklytask->WeekNumber = $request->WeekNumber;
        $cropweeklytask->CropId = $request->CropId;
        $cropweeklytask->CropInsectSysId = $request->CropInsectSysId;
        $cropweeklytask->CropFertSysId = $request->CropFertSysId;
        $cropweeklytask->FertilizerTask = $request->FertilizerTask;
        $cropweeklytask->InsecticideTask = $request->InsecticideTask;
        $cropweeklytask->OtherTask = $request->OtherTask;

        $cropweeklytask->save();
        $request->session()->flash('successMessage', 'Data Insert Successfully');
        return redirect()->route('cropweeklytask.show',$cropweeklytask->CropId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $cropId = $request->CropId;
        $cropweeklytask = CropWeeklyTask::find($id);

        $cropweeklytask->delete();
        Session()->flash('successMessage', 'Data Delete Successfully');
        return redirect()->route('cropweeklytask.show',$cropId);
    }
}
