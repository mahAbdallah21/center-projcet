<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\Manager;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $managers = Manager::query();
              if ($request->has('search')) {
                $managers->where('name','like','%'. $request->search .'%');
              }
        return view('managers.index', ['managers'=> $managers->orderBy('created_at', 'desc')->orderBy('name')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $company_id= Manager::pluck('company_id')->toArray();
        $managers =company::whereNotIn('id' , $company_id)->orderBy('name')->pluck('name', 'id')->toArray();
        return view('managers.create' , compact('managers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'mobile'=>'required',
            'company_id' => 'required',

        ]);
        Manager::create($request->except('_token'));
        return redirect()->route('managers.index')->with('added', 'New Managers added');
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
        $manager = Manager::findOrFail($id);
        return view('managers.edit' , compact('manager'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'mobile'=>'required',
            'company_id' => 'required',

        ]);
        $Manager = Manager::findOrFail($id);
        $Manager->update($request->except('_token'));
        return redirect()->route('managers.index')->with('added', ' Managers Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{

            Manager::destroy($id);
            return redirect()->route('managers.index')->with('added', ' Managers Delete');

        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->route('managers.index');

        }
    }
}
