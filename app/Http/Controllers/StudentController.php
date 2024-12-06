<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function fetch_recod()
    {
        $html = '<table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Class</th>
                    <th>Father_name</th>
                    <th>Mother_name</th>
                    <th>Delete</th>
                </tr>
            </thead>
        <tbody>';

        $students = Student::orderBy('id', 'desc')->get();

        foreach ($students as $item) {
            $html .= '<tr>
                    <td>' . $item->id . '</td>
                    <td>' . $item->name . '</td>
                    <td>' . $item->email . '</td>
                    <td>' . $item->mobile . '</td>
                    <td>' . $item->class . '</td>
                    <td>' . $item->father_name . '</td>
                    <td>' . $item->mother_name . '</td>
                    <td>
                        <a href="javascript:;" data-did="' . $item->id . '" class="record_delete_btn">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
            </tr>';
        }

        $html .= '</tbody>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Class</th>
                        <th>Father_name</th>
                        <th>Mother_name</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
        </table>';

        echo json_encode(['data' => $html]);
    }

    public function delete_record(Request $r)
    {
        Student::find($r->id)->delete();

        echo json_encode(['msg' => 'Data deleted successfully.']);
    }

    public function getEmployees(Request $request)
    {

        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Student::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Student::select('count(*) as allcount')
            ->where('name', 'like', '%' . $searchValue . '%')
            ->count();

        // Fetch records
        $records = Student::orderBy($columnName, $columnSortOrder)
            ->where(function ($query) use ($searchValue) {
                $query->where('students.name', 'like', '%' . $searchValue . '%')
                    ->orWhere('students.email', 'like', '%' . $searchValue . '%')
                    ->orWhere('students.mobile', 'like', '%' . $searchValue . '%')
                    ->orWhere('students.class', 'like', '%' . $searchValue . '%')
                    ->orWhere('students.father_name', 'like', '%' . $searchValue . '%')
                    ->orWhere('students.mother_name', 'like', '%' . $searchValue . '%');
            })
            ->select('students.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $name = $record->name;
            $email = $record->email;
            $mobile = $record->mobile;
            $class = $record->class;
            $father_name = $record->father_name;
            $mother_name = $record->mother_name;
            $delete_record = '<a href="javascript:;" data-did="' . $record->id . '" class="record_delete_btn">
                            <i class="fas fa-trash"></i>
                        </a>';

            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "mobile" => $mobile,
                "class" => $class,
                "father_name" => $father_name,
                "mother_name" => $mother_name,
                "delete_record" => $delete_record,
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }
}
