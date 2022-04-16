<?php

namespace App\Http\Controllers;

use Whoops\Run;
use Illuminate\Http\Request;
use App\Exports\ExportStudents;
use App\Imports\ImportStudents;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function index()
    {
        return view('import.index');
    }
    public function importStudents(Request $request)
    {
        Excel::import(new ImportStudents, $request->file('file_students')->store('file_students'));
        return redirect()->back();
    }
    public function exportStudents(Request $request)
    {
        return Excel::download(new ExportStudents, 'students.xlsx');
    }
}
