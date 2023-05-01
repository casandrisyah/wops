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
        $validators = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'year' => 'required',
            'publisher' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

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

        return response()->json([
            'alert' => 'success',
            'message' => 'Berhasil menambahkan buku',
            'data' => $book,
        ]);
    }

    public function show(Book $book)
    {
        return $book;
    }

    public function update(Request $request, Book $book)
    {
        $validators = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'year' => 'required',
            'publisher' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

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

        return response()->json([
            'alert' => 'success',
            'message' => 'Berhasil mengubah buku',
            'data' => $book,
        ]);
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return "Berhasil menghapus buku";
    }
}
