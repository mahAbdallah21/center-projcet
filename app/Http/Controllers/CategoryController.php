<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories= Category::query();
               if ($request->has('search')) {
                $categories->where('name' ,'like', '%'.$request->search. '%');
               }
        return view('categories.index' , ['categories'=>$categories->orderBy('created_at', 'desc')->orderBy('name')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'category_id'=>'required'
        ]);
        Category::create($request->except('_token'));
        return redirect()->route('categories.index')->with('added', 'New category Added');
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
        $category= Category::findOrFail($id);
        return view('categories.edit' ,compact('category'));

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'category_id'=>'required'


        ]);
        $category= Category::findOrFail($id);
        $category->update($request->except('_token'));
        return redirect()->route('categories.index')->with('added', ' category update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Category::destroy($id);
            return redirect()->route('categories.index')->with('added', ' category Delete');
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->route('categories.index');

        }
    }
}
