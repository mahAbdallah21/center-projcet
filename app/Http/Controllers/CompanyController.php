<?php

namespace App\Http\Controllers;

use App\Mail\NewCompanyMail;
use App\Models\company;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\New_;

class CompanyController extends Controller
{

    public function index(Request $request)
    {


    //   $companies = company::orderBy('name')->get();
    //     return view('companies.index',compact('companies'));

        $companies = company::query();
        if ($request->has("search"))
        {
            $companies->where('name' , 'like' ,'%' .$request->search.'%')-> orWhere('owner' , 'like' , '%' .$request->search.'%');
        }
        return view('companies.index' , ['companies' =>$companies ->orderBy('created_at','desc')->orderBy('name')->paginate(10)]);
    }

    public function create()
    {
           return view('companies.create');
    }
    public function store( Request $request )
    {
        $request->validate([
            'name'=>'required|max:250',
            'owner'=>'required',
            'tax_nubmer'=>'nullable|numeric'
        ],[
            'tax_nubmer.numeric' => 'لازم الرقم الضريبي يكون رقم'
        ]);

        $company = new company();
        $company->name =$request->name;
        $company->owner= $request->owner;
        $company->tax_nubmer =$request->tax_nubmer;
        $company->save();
        Mail::to(auth()->user()->email, auth()->user()->name)->send(New NewCompanyMail($company));
        // return redirect()->to('/resources/views/companies/index.blade.php');
        return redirect()->route('companies.index')->with('added', 'company Add');
    }
    public function edit($id)
    {
        $company = company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'name'=>'required|max:250',
            'owner'=>'required',
            'tax_nubmer'=>'nullable|numeric'
        ],[
            'tax_nubmer.numeric' => 'لازم الرقم الضريبي يكون رقم'
        ]);
        $company = company::findOrFail($id);
        $company->update($request->except('_token'));
        return redirect()->route('companies.index')->with('added', 'company updated');
    }
    public function destroy($id)
    {
        try{
              company::destroy($id);
              return redirect()->route('companies.index')->with('added', 'company Deleted');

        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->route('companies.index');
        }
    }
}
