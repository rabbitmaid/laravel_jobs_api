<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->query('_limit')) {
            $limit = $request->query('_limit');
            return response()->json(Listing::limit($limit)->get());
        }

        return response()->json(Listing::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingRequest $request)
    {
        $validated = $request->validated();

        $create = Listing::create([
            'id' => Str::uuid(),
            'title' => $validated['title'],
            'type' => $validated['type'],
            'description' => $validated['description'],
            'location' => $validated['location'],
            'salary' => $validated['salary'],
            'company' => $validated['company']
        ]);

        return response()->json(['status' => 'success', 'message' => 'Job Created', 'job' => $create]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        $listing = Listing::find($uuid);
        return $listing == false ? response([], 404) : response()->json($listing);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListingRequest $request, string $uuid)
    {
      
        $update = Listing::find($uuid)->update($request->validated());
        return response()->json(['status' => 'success', 'message' => 'Job Updated', 'job' => $update]);
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $delete = Listing::find($uuid)->delete();
        return response()->json(['status' => 'success', 'message' => 'Job Deleted', 'job' => $delete]);
    }
}
