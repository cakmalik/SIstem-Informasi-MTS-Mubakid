<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportStudents implements FromQuery, WithHeadings
{

    use Exportable;

    // public function __construct(int $id)
    // {
    //     $this->id = $id;
    // }

    public function query()
    {
        // menggunakan query ini tidak perlu get
        return Student::query()->orderBy('nama_lengkap','asc');
    }

    public function headings(): array
    {
        return ["your", "headings", "here"];
    }

    // public function collection()
    // {
    //     return Student::select('nama_lengkap','nis','no_hp','kota')->get();
    // }
}
