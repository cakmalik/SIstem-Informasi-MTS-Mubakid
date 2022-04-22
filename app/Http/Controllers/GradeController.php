<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGradeRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateGradeRequest;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all();
        $teachers = Teacher::all();
        return view('grades.index', compact('grades', 'teachers'));
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
     * @param  \App\Http\Requests\StoreGradeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGradeRequest $request)
    {
        Grade::create($request->all());
        Alert::success('Success', 'Grade has been added');
        return redirect()->route('grades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        $teachers = Teacher::all();
        return view('grades.edit', compact('grade', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGradeRequest  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        $grade->update($request->all());
        Alert::success('Success', 'Grade has been updated');
        return redirect()->route('grades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();
        Alert::success('Success', 'Grade has been deleted');
        return redirect()->route('grades.index');
    }
    public function apply(Request $request)
    {
        $request->validate([
            'grade_id' => 'required',
            'teacher_id' => 'required',
        ]);
        $grade = Grade::find($request->grade_id)->update(['wali_kelas' => $request->teacher_id]);
        return redirect()->back()->with('success', 'Grade has been assigned to teacher');
    }
}
