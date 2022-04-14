<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        //
    }
    public function imageStore($foto, $foto_wali, $nama_foto = null, $nama_foto_wali = null)
    {
        if ($file = $foto) {
            $path = 'foto_santri/';
            $fileName_santri   = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName_santri, File::get($file));
            $file_name  = $file->getClientOriginalName();
            $file_type  = $file->getClientOriginalExtension();
            $filePath   = 'storage/'.$path . $fileName_santri;
            $data['foto']=$fileName_santri;
        }
        if ($file = $foto_wali) {
            $path = 'foto_wali/';
            $fileName_wali   = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName_wali, File::get($file));
            $file_name  = $file->getClientOriginalName();
            $file_type  = $file->getClientOriginalExtension();
            $filePath   = 'storage/'.$path . $fileName_wali;
            $data['foto_wali']=$fileName_wali;
        }
        $user = Auth::user()->id;
        if ($user!=1|$user!=2|$user!=3) {
            if ($nama_foto!=null) {
                Student::where('id', Auth::user()->student->id)->update([
                    'foto'=>$nama_foto,
                ]);
            }
            if ($nama_foto_wali!=null) {
                Student::where('id', Auth::user()->student->id)->update([
                    'foto_wali'=>$nama_foto_wali,
                ]);
            }
        }
    }

    public function store(StoreStudentRequest $request)
    {
        $validatedData = $request->validate([
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'foto_wali' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $data =  $request->all();
        $data['user_id'] = auth()->user()->id;
        
        if ($file = $request->file('foto')) {
            $path = 'foto_siswa/';
            $fileName_santri   = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName_santri, File::get($file));
            $file_name  = $file->getClientOriginalName();
            $file_type  = $file->getClientOriginalExtension();
            $filePath   = 'storage/'.$path . $fileName_santri;
            $data['foto_siswa']=$fileName_santri;
        }
        if ($file = $request->file('foto_wali')) {
            $path = 'foto_wali/';
            $fileName_wali   = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName_wali, File::get($file));
            $file_name  = $file->getClientOriginalName();
            $file_type  = $file->getClientOriginalExtension();
            $filePath   = 'storage/'.$path . $fileName_wali;
            $data['foto_ortu']=$fileName_wali;
        }
        $student = Student::create($data);
        Auth::user()->syncRoles('siswa');
        Alert::success('Selamat', 'kamu berhasil');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    public function edit(Student $student)
    {
        //
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    public function destroy(Student $student)
    {
        //
    }
}