<?php

namespace App\Http\Livewire;

use App\Models\Grade;
use App\Models\Student;
use Livewire\Component;

class EachStudyGroup extends Component
{
    public $selectedGrade;
    public $students;
   
    // protected $listeners = [
    //     'gradeSelected' => 'handleGradeSelected',
    // ];

    // public function mount()
    // {
    //     $students = Student::where('status','aktif')->orderBy('created_at', 'desc')->get();
    //     $this->students = $students;  
    // }
    public function render()
    {   
        $grades = Grade::all();  
        return view('livewire.each-study-group', compact('grades'));
    }
    public function updatedSelectedGrade($grade_id)
    {
        $this->students = Student::where('grade_id',$grade_id)
        ->orderBy('nama_lengkap', 'asc')
        ->get();
        // $this->emitSelf('gradeSelected');
    }
    // public function handleGradeSelected()
    // {
    //     $this->emit('gradeSelected');
    // }
}
