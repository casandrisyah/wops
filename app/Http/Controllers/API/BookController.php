<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return $books;
    }

    public function store(Request $request)
    {
        $file = $request->file('cover');
        $fileName = $file->getClientOriginalName();
        $file->move('images/books', $fileName);

        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'year' => $request->year,
            'publisher' => $request->publisher,
            'cover' => $fileName,
        ]);

        return "Data berhasil ditambahkan";
    }

    public function show(Book $book)
    {
        return $book;
    }

    public function update(Request $request, Book $book)
    {

        $file = $request->file('cover');
        $fileName = $file->getClientOriginalName();
        $file->move('images/books', $fileName);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'year' => $request->year,
            'publisher' => $request->publisher,
            'cover' => $fileName,
        ]);

        return "Data berhasil diubah";
    }

    public function destroy(Book $book)
    {
        $file = $book->cover;
        $path = public_path('images/books/' . $file);
        if (file_exists($path)) {
            unlink($path);
        }
        $book->delete();

        return "Berhasil menghapus buku";
    }
}
