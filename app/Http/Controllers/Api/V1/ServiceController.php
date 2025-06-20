<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{

    function index()
    {
        $services = Service::all();
        return $services;
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

        $services = Service::create($validate);
        return response()->json($services, 201);
    }


    public function show(string $id)
    {
        $services = Service::findOrFail($id);
        return response()->json($services);
    }


    public function destroy(string $id)
    {
        $services = Service::findOrFail($id);
        $services->delete();
        return response()->json('Deleted succesfly');
    }
}
