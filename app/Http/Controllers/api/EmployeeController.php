<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeCollection;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
                // $employees = EmployeeResource::collection(Employee::all());
                $employees = new EmployeeCollection(Employee::all());
                return $employees;

        } catch (Exception  $e) {
            return response()->json([
                'status' => 'falid',
                'Error' =>$e->getMessage()

            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required' ,
            'Job_title'=>'required',
            'salary'=>'required|numeric|max:50000'
        ]);
        try {
              $employee = Employee::create($request->all());
              return response()->json([
                'status' =>'Employee created ',
                'Employee'=>new EmployeeResource($employee)
              ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'falid',
                'Error' =>$e->getMessage()

            ]);


        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
