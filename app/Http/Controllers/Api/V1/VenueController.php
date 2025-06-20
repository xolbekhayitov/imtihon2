<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Venues;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venues = Venues::all();
        return $venues;
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'type_service'  => 'required',
            'general_information' => 'required',
            'workflows'     => 'required',
            'trends'        => 'required',
            'lifehacks'     => 'required'
        ]);

        $venues = Venues::create($validate);
        return response()->json($$venues, 201);
    }


    public function show(string $id)
    {
        $venues = Venues::findOrFail($id);
        return response()->json($venues);
    }



    public function destroy(string $id)
    {
        $venues = Venues::findOrFail($id);
        $venues->delete();
        return response()->json('Deleted succesfly.');
    }
}
