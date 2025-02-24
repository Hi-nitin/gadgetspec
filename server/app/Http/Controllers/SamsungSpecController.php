<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\samsung_spec;


class samsungspecController extends Controller
{
  
 public function index()
{
    // Fetch all data from the samsung_specs table
    $specs = samsung_spec::all();

    // Return the data to a view, if needed
    return response()->json($specs);
}

    
  
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

  
    $product = samsung_spec::where('Name', $decodedPhoneName)->first();// Find by phone_name
    
      
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
