<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return Book::with('stores')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'isbn' => 'required|numeric',
            'value' => 'required|numeric',
        ]);

        return Book::create($validated);
    }

    public function show(Book $book)
    {
        return $book->load('stores');
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'name' => 'required',
            'isbn' => 'required|numeric',
            'value' => 'required|numeric',
        ]);

        $book->update($validated);

        return $book;
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return response()->noContent();
    }
}
