<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\company;
use Exception;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $commpanies = CompanyResource::collection(company::all());
            return $commpanies;
        } catch (Exception $e) {
           return response()->json([
            'status' => 'falid',
             'error'=>$e->getMessage()],
              401);

        }


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"  =>"required|string|max:250",
            'owner' => 'required|string|max:250',
            'tax_nubmer' =>'required'
       ]);
       try {
              $company = company::create($request->all());
              return response()->json([
                'status' => 'Company Created' ,
                'company' => new CompanyResource($company),

              ]);
       } catch (Exception $e) {
          return response()->json([
            'status'=>'failed to create company ',
            'message' => $e->getMessage()
          ]);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
               $company = new CompanyResource(company::findOrFail($id));
               return response()->json([
                'status'=>'Company returned',
                'company'=>$company
               ]);
        } catch (Exception $e) {
            return response()->json([
                'status'=>'faild  ',
                'message' => $e->getMessage()
              ]);

        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $company = company::findOrFail($id);
            $company->update($request->all());
            return response()->json([
              'status' => 'Company Update' ,
              'company' => new CompanyResource($company),

            ]);
     } catch (Exception $e) {
        return response()->json([
          'status'=>'failed to Update company ',
          'message' => $e->getMessage()
        ]);
     }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
               company::destroy($id);
            return response()->json([
             'status'=>'Company Deleted',

            ]);
     } catch (Exception $e) {
         return response()->json([
             'status'=>'faild  ',
             'message' => $e->getMessage()
           ]);

     }
    }
}
