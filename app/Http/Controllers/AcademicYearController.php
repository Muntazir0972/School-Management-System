<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.academic_year');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $data)
    {
        $data->validate([
            'academic_year' => 'required',
        ]);

        $academic_year = new AcademicYear();
        $academic_year->name = $data->academic_year;
        $academic_year->save();
        return redirect()->route('academic-year.create')->with('success','Academic Year Added Successfully');
    }   

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data['academic_year']=AcademicYear::get();
        return view('admin.academic_year_list',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = AcademicYear::find($id);
        return view('admin.edit_academic_year',compact('data')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $data)
    {
        $academic_year = AcademicYear::find($data->id);
        $academic_year->name = $data->academic_year;
        $academic_year->update();
        return redirect()->route('academic-year.read')->with('success','Record Updated Successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = AcademicYear::find($id);
        $data->delete();
        return redirect()->route('academic-year.read')->with('success','Record Deleted Successfully.');
    }
}
