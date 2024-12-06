<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use App\Models\Student;

class HomeController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(Student::select('*'))
                ->addColumn('action', 'action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('student');
    }

    public function delete(Request $request)
    {
        $company = Student::where('id', $request->id)->delete();
        return Response()->json($company);
    }
}
