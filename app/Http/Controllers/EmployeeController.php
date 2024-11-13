<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    // Metode index untuk menampilkan data employees
    public function index() {
        // Mengambil semua data employee
        $employees = Employee::all();

        if($employees->isNotEmpty()) {
            $data = [
                'message' => 'Get All Resource',
                'data' => $employees
            ];
        } else {
            $data = [
                'message' => 'Data is empty'
            ];
        }

        // mengembalikan respon JSON
        return response()->json($data, 200);
    }

    // Methode untuk menambah data employees
    public function store(Request $request) {
        // Validasi input
        $validator = Validator::make(
            $request->all(), [
                'name' => 'required',
                'gender' => 'required|max:1',
                'phone' => 'required|numeric',
                'address' => 'required',
                'email' => 'required|email',
                'status' => 'required',
                'hired_on' => 'required|date'
            ]
        );

        if($validator->fails()) {
            $data = [
                'message' => 'Errors Validation',
                'error' => $validator->errors()
            ];

            return response()->json($data, 422);
        } else {
            // menambah data
            $employees = Employee::create($request->all());

            $data = [
                'message' => 'Resource is added successfully',
                'data' => $employees
            ];

            return response()->json($data, 201);
        }
    }

    // Methode untuk menambah data employees
    public function show($id) {
        // mencari id employee
        $employees = Employee::find($id);

        if($employees) {
            $data = [
                'message' => 'Get Detail Resource',
                'data' => $employees
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];
            return response()->json($data, 404);
        }
    }

    // Metode untuk mengubah data employees
    public function update($id, Request $request) {
        // validasi apakah input kosong
        $validator = Validator::make(
            $request->all(), [
                'name' => 'nullable',
                'gender' => 'nullable|max:1',
                'phone' => 'nullable|numeric',
                'address' => 'nullable',
                'email' => 'nullable|email',
                'status' => 'nullable',
                'hired_on' => 'nullable|date'
            ]
        );

        if($validator->fails()) {
            $data = [
                'message' => 'Errors Validation',
                'error' => $validator->errors()
            ];

            return response()->json($data, 422);
        }

        // mencari id employee
        $employees = Employee::find($id);

        if($employees) {
            // mengedit inputan
            $employees->update([
                'name' => $request->name ?? $employees->name,
                'gender' => $request->gender ?? $employees->gender,
                'phone' => $request->phone ?? $employees->phone,
                'address' => $request->address ?? $employees->address,
                'email' => $request->email ?? $employees->email,
                'status' => $request->status ?? $employees->status,
                'hired_on' => $request->hired_on ?? $employees->hired_on
            ]);

            $data = [
                'message' => 'Resource is update successfully',
                'data' => $employees
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }

    // Metode untuk menghapus data employees
    public function destroy($id) {
        // mencari data berdasarkan id
        $employees = Employee::find($id);

        if($employees) {
            // menghapus data
            $employees->delete();

            $data = [
                'message' => 'Resource is deleted successfully',
                'data' => $employees
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }

    // Methode untuk mencari data employees
    public function search($name) {
        // mencari data berdasarkan nama
        $employees = Employee::where('name', $name)->get();

        if($employees){
            $data = [
                'message' => 'Get Searched Resource',
                'data' => $employees
            ];
    
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];
            return response()->json($data, 404);
        }
    }

    // Methode untuk mencari data employees
    public function active() {
        // mencari data berdasarkan nama
        $employees = Employee::where('status', 'Active')->get();

        if($employees){
            $data = [
                'message' => 'Get Searched Resource',
                'data' => $employees
            ];
    
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];
            return response()->json($data, 404);
        }
    }

    // Methode untuk mencari data employees
    public function inactive() {
        // mencari data berdasarkan nama
        $employees = Employee::where('status', 'Inactive')->get();

        if($employees){
            $data = [
                'message' => 'Get Searched Resource',
                'data' => $employees
            ];
    
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];
            return response()->json($data, 404);
        }
    }

    // Methode untuk mencari data employees
    public function terminate() {
        // mencari data berdasarkan nama
        $employees = Employee::where('status', 'Terminate')->get();

        if($employees){
            $data = [
                'message' => 'Get Searched Resource',
                'data' => $employees
            ];
    
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];
            return response()->json($data, 404);
        }
    }
}
