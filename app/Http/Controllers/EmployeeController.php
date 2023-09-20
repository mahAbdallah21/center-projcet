<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PgSql\Lob;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::query();

        return view('employees.index', ['employees'=> $employees->orderBy('created_at', 'desc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

     {
        $users_ids = Employee::pluck('user_id')->toArray();
         $employee =  user::whereNotIn('id',$users_ids)->orderBy('name')->pluck('name', 'id')->toArray();
                return view('employees.create', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Job_title'=>'required',
            'salary'=>'required|numeric',
            'user_id' => 'required',

        ]);
        Employee::create($request->except('_token'));
        return redirect()->route('employees.index')->with('added', 'New employees added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {


        $employee = Employee::findOrFail($id);


        return view('employees.edit' , ['employee'=>$employee ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Job_title'=>'required',
            'salary'=>'required|numeric',
            'user_id' => 'required',

        ]);
        $Employee = Employee::findOrFail($id);

        $Employee->update($request->except('_token'));
        return redirect()->route('employees.index')->with('added', ' employees Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{

            Employee::destroy($id);
            return redirect()->route('employees.index')->with('added', ' employees Delete');

        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->route('employees.index');

        }
    }
}
