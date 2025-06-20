<?php

namespace App\Http\Controllers\Web;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;

class BookController extends Controller
{

    public function index()
    {
        $books = Cache::remember('books', 108000, function(){
            return DB::table('books')->get();
        });
        // $books = Book::all();
        return $books;
    }



    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'        => 'required',
            'information' => 'required'
        ]);

        $books = Book::create($validate);
        return $books;
    }



    public function edit(string $id)
    {

    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        $books = Book::findOrFail($id);
        $books->delete();
        return response()->json('Deleted succesfly');
    }
}
