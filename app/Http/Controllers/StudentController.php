<?php

namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    // list of file containes
    public function listOfUsers()
    {
        $users = DB::table('students')
            ->orderBy('id', 'desc')
            ->whereNotNull('id')
            ->paginate(10);
        return view('welcome', compact('users'));
    }

    public function upload(Request $request)
    {
        Excel::import(new StudentsImport, $request->file('excel_upload'));

        return redirect('/')->with('success', 'All good!');
    }
}
