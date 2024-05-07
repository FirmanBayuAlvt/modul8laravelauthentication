<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class EmployeeController extends Controller
{
    // public function index()
    // {
    //     $pageTitle = 'Employee List';
    //     return view('employee.index', ['pageTitle' => $pageTitle]);
    //     return view('employee.index',)->with('pageTitle', $pageTitle);
    // }
    // public function create2()
    // {
    //     $pageTitle = 'Create Employee';
    //     return view('employee.create', compact('pageTitle'));
    // }

    // public function store(Request $request)
    // {

    //     $messages = [
    //         'required' => ':attribute harus diisi.',
    //         'email' => 'Isi :attribute dengan format yang benar',
    //         'numeric' => 'Isi :attribute dengan angka'
    //     ];

    //     $validator = Validator::make($request->all(), [
    //         'firstName' => 'required',
    //         'lastName' => 'required',
    //         'email' => 'required|email',
    //         'age' => 'required|numeric',
    //     ], $messages);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
    //     return $request->all();
    // }

    // public function index()
    // {
    //     $pageTitle = 'Employee List';

    //     // RAW SQL QUERY
    //     $employees = DB::select('select *, employees.id as employee_id, position.name as
    // position_name
    //         from employees
    //         left join positions on employees.position_id = positions.id
    //         ');

    //         return view('employee.index', [
    //             'pageTitle' => $pageTitle,
    //             'employees' => $employees
    //         ]);
    // }

//     public function index()
// {
//     $pageTitle = 'Employee List';

//     // Menggunakan Query Builder untuk menulis query
//     $employees = DB::table('employees')
//         ->leftJoin('positions', 'employees.position_id', '=', 'positions.id')
//         ->select('employees.*', 'employees.id as employee_id', 'positions.name as position_name')
//         ->get();

//     return view('employee.index', [
//         'pageTitle' => $pageTitle,
//         'employees' => $employees
//     ]);
// }

    // public function create()
    // {
    //     $pageTitle = 'Create Employee';
    //     //RAW SQL Query
    //     $positions = DB::select('select * from positions');

    //     return view('employee.create', compact('pageTitle', 'positions'));
    // }

//     public function create()
// {
//     $pageTitle = 'Create Employee';

//     // Menggunakan Query Builder untuk menulis query
//     $positions = DB::table('positions')->get();

//     return view('employee.create', compact('pageTitle', 'positions'));
// }

    // public function store(Request $request)
    // {
    //     $messages = [ 'required' => ':Attribute harus diisi.',
    //     'email' => 'Isi :attribute dengan format yang benar',
    //     'numeric' => 'Isi :attribute dengan angka'
    // ];
    // $validator = Validator::make($request->all(),
    // [
    //     'firstName' => 'required',
    //     'lastName' => 'required',
    //     'email' => 'required|email',
    //     'age' => 'required|numeric',
    // ],
    // $messages); if ($validator->fails())
    // {
    //     return redirect()->back()->withErrors($validator)->withInput();}
    //     // INSERT QUERY
    //      DB::table('employees')->insert
    //      ([
    //         'firstname' => $request->firstName,
    //         'lastname' => $request->lastName,
    //         'email' => $request->email,
    //         'age' => $request->age,
    //         'position_id' => $request->position,
    //     ]);
    //     return redirect()->route('employees.index');
    // }

    // public function show(string $id)
    // {
    //     $pageTitle = 'Employee Detail';
    //     // RAW SQL QUERY
    //     $employee = collect(DB::select
    //     (' select *, employees.id as employee_id,
    //     positions.name as position_name from employees left join positions on employees.position_id = positions.id where employees.id = ? ', [$id]
    //     ))
    //     ->first();
    //     return view('employee.show', compact('pageTitle', 'employee')
    // );
    // }

    // public function destroy(string $id)
    // {
    //     // QUERY BUILDER
    //      DB::table('employees')->where
    //      ('id', $id)->delete();
    //       return redirect()->route('employees.index');
    // }

    public function edit(string $id)
    {
        $pageTitle = 'Edit Employee';

        // Untuk Mengambil data employee berdasarkan ID
        $employee = DB::table('employees')->find($id);
        if (!$employee) {
        // Untuk Tambahkan penanganan jika data tidak ditemukan
        return redirect()->route('employees.index')->with('error', 'Data employee tidak ditemukan.');
        }

        // Untuk Mengambil daftar posisi untuk dropdown
        $positions = DB::table('positions')->get();

        return view('employee.edit', compact('pageTitle', 'employee', 'positions'));
    }

    public function index()
    {
        $pageTitle = 'Employee List';

        // ELOQUENT
        $employees = Employee::all();

        return view('employee.index', [
            'pageTitle' => $pageTitle,
            'employees' => $employees
        ]);
    }

    public function create() { $pageTitle = 'Create Employee'; // ELOQUENT
        $positions = Position::all();
        return view('employee.create', compact('pageTitle', 'positions'));
    }

    public function store(Request $request)
    {
         $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } // ELOQUENT
        $employee = New Employee;
        $employee->firstname = $request->firstName;
        $employee->lastname = $request->lastName;
        $employee->email = $request->email;
        $employee->age = $request->age;
        $employee->position_id =
        $request->position;
        $employee->save();
        return redirect()->route('employees.index');
    }

    public function show(string $id)
    {
        $pageTitle = 'Employee Detail';
        // ELOQUENT
        $employee = Employee::find($id);
        return view('employee.show', compact('pageTitle', 'employee'));
    }

    // public function edit(string $id)
    // {
    //     $pageTitle = 'Edit Employee';

    //     // ELOQUENT
    //     $positions = Position::all();
    //     $employee = Employee::find($id);

    //     return view('employee.edit', compact('pageTitle', 'positions',
    //     'employee'));
    // }

    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $employee = Employee::find($id);
        $employee->firstname = $request->firstName;
        $employee->lastname = $request->lastName;
        $employee->email = $request->email;
        $employee->age = $request->age;
        $employee->position_id = $request->position;
        $employee->save();
        return redirect()->route('employees.index');
    }

    public function destroy(string $id)
    {
        // Mencari karyawan dengan ID yang diberikan
        $employee = Employee::find($id);

        // Memeriksa apakah karyawan ditemukan
        if ($employee) {
            // Jika ditemukan, maka hapus karyawan
            $employee->delete();
        } else {
            // Jika tidak ditemukan, kembalikan pesan kesalahan atau tangani secara sesuai
            return redirect()->back()->with('error', 'Employee not found.');
        }

        // Redirect ke route yang benar
        return redirect()->route('employees.index');
    }

}
