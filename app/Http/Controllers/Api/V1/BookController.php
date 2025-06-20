<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return $books;
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'        => 'required',
            'information' => 'required'
        ]);

        $books = Book::create($validate);
        return response()->json($books, 201);
    }


    public function show(string $id)
    {
        $books = Book::findOrFail($id);
        return response()->json($books, 201);
    }


    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'        => 'required',
            'information' => 'required'
        ]);

        $books = Book::findOrFail($id);
        $books->update($validated);

        return response()->json($books);
    }


    public function destroy(string $id)
    {
        $books = Book::findOrFail($id);
        $books->delete();
        return response()->json('Deleted succesfly');
    }
}
