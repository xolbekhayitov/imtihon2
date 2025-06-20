<?php

namespace App\Http\Controllers\Web;

use App\Models\Venues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class VenueController extends Controller
{
   
    public function index()
    {
        $venues = Cache::remember('venues', 108000, function(){
            return DB::table('venues')->get();
        });
        // $venues = Venues::all();
        return $venues;
    }


    public function create()
    {
        //
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
        return response()->json($venues, 201);
    }


    public function show(string $id)
    {
        $venues = Venues::findOrFail($id);
        return response()->json($venues);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        $venues = Venues::findOrFail($id);
        $venues->delete();
        return response()->json('Deleted succesfly.');
    }
}
