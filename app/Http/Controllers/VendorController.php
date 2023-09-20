<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::query();
        return view('vendors.index' , ['vendors' => $vendors->orderBy('created_at' , 'desc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'logo'=> 'required|image|max:2048'
        ]);
        try {
             $vendor = Vendor::create([
                'name' => $request->name ,
                'logo' => $request->file('logo')->store('vendor_logo'),
             ]);
             return redirect()->route('vendors.index')->with('added' , 'New Vendor added');
        } catch (Exception $e) {

            Log::info($e->getMessage());
            return back();

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vendor= Vendor::findOrFail($id);
        return view('vendors.edit' ,compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vendor= Vendor::findOrFail($id);
        $request->validate([
            'name'=> 'required',
            'logo'=> 'required|image|max:2048'
        ]);
        $vendor->name= $request->name ;
        if($vendor->logo && $request->file('logo')){
            Storage::delete($vendor->logo);
            $vendor->logo = Storage::put('vendor_logo', $request->file('logo'));

        }else{  $vendor->logo = Storage::put('vendor_logo', $request->file('logo'));

        }
        $vendor->save();
        return redirect()->route('vendors.index')->with('added' , 'Update Vendor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vendor= Vendor::findOrFail($id);
        if ($vendor->log) Storage::delete($vendor->logo);
        $vendor->delete();
        return back();
    }

   }
