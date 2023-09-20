<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::query();

        return view('Courses.index', ['courses'=> $courses->orderBy('created_at', 'desc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

     {

                return view('Courses.create', compact('Course'));
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
        Course::create($request->except('_token'));
        return redirect()->route('Courses.index')->with('added', 'New Courses added');
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


        $Course = Course::findOrFail($id);


        return view('Courses.edit' , ['Course'=>$Course ]);
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
        $Course = Course::findOrFail($id);

        $Course->update($request->except('_token'));
        return redirect()->route('Courses.index')->with('added', ' Courses Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{

            Course::destroy($id);
            return redirect()->route('Courses.index')->with('added', ' Courses Delete');

        }catch(Exception $e){
           Log::info($e->getMessage());
            return redirect()->route('Courses.index');

        }
    }
}
