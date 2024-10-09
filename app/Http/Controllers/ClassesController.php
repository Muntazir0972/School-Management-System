<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.class.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $data)
    {
        $data->validate([
            'class'=>'required'
        ]);
        $class = new Classes();
        $class->name = $data->class;
        $class->save();
        return redirect()->route('class.read')->with('success','Class Added Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $classes)
    {
        $data = Classes::get();
        return view('admin.class.list',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Classes::find($id);
        return view('admin.class.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $data)
    {
        $class = Classes::find($data->id);
        $class->name = $data->class;
        $class->update();
        return redirect()->route('class.read')->with('success','Record Updated Succesfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $class = Classes::find($id);
        $class->delete();
        return redirect()->route('class.read')->with('success','Record Deleted Succesfully');
    }
}
