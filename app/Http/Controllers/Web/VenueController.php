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



    public function store(Request $request)
    {
        $validate = $request->validate([
            'type_service'  => 'required|unique',
            'general_information' => 'required|unique',
            'workflows'     => 'required|unique',
            'trends'        => 'required|unique',
            'lifehacks'     => 'required|unique'
        ]);
        $venues = Venues::create($validate);
        return response()->json($venues, 201);
    }


    public function show(string $id)
    {
        $venues = Venues::findOrFail($id);
        return response()->json($venues);
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
