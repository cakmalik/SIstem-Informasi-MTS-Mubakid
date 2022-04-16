<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\Malik;
use App\Models\Student;
use App\Models\BillType;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Controllers\Payment\TransactionController;

class StudentController extends Controller
{
    public function index()
    {
        $collection = Student::all();
        $nominal = BillType::where('name','pendaftaran')->first()->amount;
        $malik=  new Malik();
        $kota = $malik->getKota();
        $prov = $malik->getProvinsi();
        return view('students.index', compact('collection','nominal','kota','prov'));
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
        // if hasrole admin
        if(Auth::user()->hasRole('guest')){
            $validatedData = $request->validate([
                'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'foto_wali' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            
            $data =  $request->all();
            $data['user_id'] = auth()->user()->id;
            
            if ($file = $request->file('foto_siswa')) {
                $data['foto_siswa']= $this->storeImgSiswa($file);
            }
            if ($file = $request->file('foto_ortu')) {
                $data['foto_ortu']= $this->storeImgWali($file);
            }
            
            $data['nis']= Malik::generateNis()[0];
            $data['urutan']= Malik::generateNis()[1];

            $student = Student::create($data);
            Auth::user()->syncRoles('siswa');
            Alert::success('Selamat', 'Data berhasil dikirim');
            return redirect()->route('home');
        }else{

            $validatedData = $request->validate([
                'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'foto_wali' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            
            $data =  $request->all();
            if ($file = $request->file('foto_siswa')) {
                $data['foto_siswa']= $this->storeImgSiswa($file);
            }
            if ($file = $request->file('foto_ortu')) {
                $data['foto_ortu']= $this->storeImgWali($file);
            }
            
            $generate = Malik::generateNis();
            $email  = str()->snake($generate[0]) . '@mts2.com';
            $user = User::create([
                'name'=>$request->nama_lengkap,
                'email'=>$email,
                'password'=>bcrypt('password'),
            ]);
            $data['user_id'] = $user->id;
            $data['nis']= $generate[0];
            $data['urutan']= $generate[1];
            $student = Student::create($data);
            $transaction = new TransactionController();
            $transaction->storeManual($student->id,$request->status_pembayaran);
            $user->assignRole('siswa');
            Alert::success('Selamat', 'Siswa baru berhasil ditambah');
            return back();
        }
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
        $student->delete();
        Alert::success('OK', 'Data berhasil dihapus');
        return back();
    }
    public function storeImgSiswa($file)
    {
            $path = 'foto_siswa/';
            $fileName_santri   = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName_santri, File::get($file));
            $file_name  = $file->getClientOriginalName();
            $file_type  = $file->getClientOriginalExtension();
            $filePath   = 'storage/'.$path . $fileName_santri;
            return $fileName_santri;
    }
    public function storeImgWali($file)
    {
        $path = 'foto_wali/';
        $fileName_wali   = time() . $file->getClientOriginalName();
        Storage::disk('public')->put($path . $fileName_wali, File::get($file));
        $file_name  = $file->getClientOriginalName();
        $file_type  = $file->getClientOriginalExtension();
        $filePath   = 'storage/'.$path . $fileName_wali;
        return $fileName_wali;
    }
}