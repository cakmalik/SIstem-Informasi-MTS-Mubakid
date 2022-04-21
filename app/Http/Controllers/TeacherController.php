<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TeacherController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $teachers = Teacher::all();
        
        return view('teachers.index', compact('teachers'));
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('teachers.create');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreTeacherRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StoreTeacherRequest $request)
    {
        $data = $request->all();
        // jika yang input admin, maka masukkan juga sekalian dengan user
        if(Auth::user()->hasRole('admin')){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('password'),
            ]);
            // $roles = $user->getRoleNames();
            // $user->removeRole($roles);
            // $user->roles()->detach();
            $user->syncRoles('guru');
            
            $data['user_id'] = $user->id;
            Teacher::create($data);
            Alert::success('Berhasil','Data berhasil ditambahkan');
            return redirect()->route('teachers.index');
            // jika yang input bukan admin, maka hanya masukkan data guru
        }else{
            $data['user_id'] = Auth::user()->id;
            Teacher::create($data);
            $user = Auth::user();
            $user->syncRoles('guru');
            Alert::success('Berhasil','Data berhasil ditambahkan');
            return redirect()->route('home');
        }
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Teacher  $teacher
    * @return \Illuminate\Http\Response
    */
    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Teacher  $teacher
    * @return \Illuminate\Http\Response
    */
    public function edit(Teacher $teacher)
    {
        //
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateTeacherRequest  $request
    * @param  \App\Models\Teacher  $teacher
    * @return \Illuminate\Http\Response
    */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Teacher  $teacher
    * @return \Illuminate\Http\Response
    */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
