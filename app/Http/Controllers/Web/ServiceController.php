<?php

namespace App\Http\Controllers\Web;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Cache::remember('services', 108000, function(){
            return DB::table('services')->get();
        });
        // $services = Service::all();
        return $services;
    }


    public function create()
    {
        //
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

        $services = Service::create($validate);
        return $services;
    }


    public function show(string $id)
    {
        $services = Service::findOrFail($id);
        return $services;
    }


    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {

    }


    public function destroy(string $id)
    {
        $services = Service::findOrFail($id);
        $services->delete();
        return 'deleted';
    }
}
