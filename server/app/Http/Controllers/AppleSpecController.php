<?php

namespace App\Http\Controllers;
use App\Models\apple_spec;
use Illuminate\Http\Request;

class AppleSpecController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all records and order by 'id' in descending order to fetch from the last row
        return apple_spec::orderBy('id', 'desc')->get();
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $name)
    {

        $decodedPhoneName = $name;

  
    $product = apple_spec::where('Name', $decodedPhoneName)->first();// Find by phone_name
    
      
    return $product ? response()->json($product) : response()->json(['error' => 'Product not found'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
