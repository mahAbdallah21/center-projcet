<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BranchResource;
use App\Models\branch;
use Exception;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       try {
        $branch = BranchResource::collection(branch::all());
        return $branch ;
       } catch ( Exception $e) {
         return response()->json([
            'status' => 'falid'
         ]);
       }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'company_id' => 'required',


        ]);
        try{
            $branch = branch::create($request->all());
            return response()->json([
                'status' => 'created ',
                'Branch' => new BranchResource($branch) ,
                ]);


        }catch ( Exception $e) {
            return response()->json([
               'status' => 'falid'
            ]);
    }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $branch = branch::findOrFail($id);
            return response()->json([

                'massages' => new BranchResource($branch)
            ]);


        }catch ( Exception $e) {
            return response()->json([
               'status' => 'falid'
            ]);
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $branch = branch::findOrFail($id);
            $branch->update($request->all());
            return response()->json([
                'status' => 'update ',
                'massages' => new BranchResource($branch) ,
                ]);


        }catch ( Exception $e) {
            return response()->json([
               'status' => 'falid'
            ]);
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $branch = branch::destroy($id);



        }catch ( Exception $e) {
            return response()->json([
               'status' => 'falid'
            ]);
    }
    }
}
