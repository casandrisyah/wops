<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $books = Book::where('title', 'like', '%' . $request->keyword . '%')
                ->paginate(10);
            return view('pages.admin.books.list', compact('books'));
        }
        return view('pages.admin.books.main');
    }

    public function create()
    {
        return view('pages.admin.books.input', ['data' => new Book]);
    }

    public function store(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'year' => 'required|string|max:4',
            'publisher' => 'required|string|max:255',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('title')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('title'),
                ]);
            } elseif ($errors->has('author')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('author'),
                ]);
            } elseif ($errors->has('category')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('category'),
                ]);
            } elseif ($errors->has('description')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description'),
                ]);
            } elseif ($errors->has('price')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('price'),
                ]);
            } elseif ($errors->has('stock')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('stock'),
                ]);
            } elseif ($errors->has('year')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('year'),
                ]);
            } elseif ($errors->has('publisher')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('publisher'),
                ]);
            } elseif ($errors->has('cover')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('cover'),
                ]);
            }
        }

        $file = $request->file('cover');
        $filename = $file->getClientOriginalName();
        $file->move('images/books', $filename);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'year' => $request->year,
            'publisher' => $request->publisher,
            'cover' => $filename,
        ]);

        return response()->json([
            'alert' => 'success',
            'message' => 'Berhasil menambahkan buku baru',
        ]);
    }

    public function show(Book $book)
    {
        return view('pages.admin.books.show', ['data' => $book]);
    }

    public function edit(Book $book)
    {
        return view('pages.admin.books.input', ['data' => $book]);
    }

    public function update(Request $request, Book $book)
    {
        $validators = Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:books,title,' . $book->id,
            'author' => 'required|string|max:255',
            'category' => 'required|integer',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'year' => 'required|string|max:4',
            'publisher' => 'required|string|max:255',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validators->fails()) {
            $errors = $validators->errors();
            if ($errors->has('title')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('title'),
                ]);
            } elseif ($errors->has('author')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('author'),
                ]);
            } elseif ($errors->has('category_id')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('category_id'),
                ]);
            } elseif ($errors->has('description')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description'),
                ]);
            } elseif ($errors->has('price')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('price'),
                ]);
            } elseif ($errors->has('stock')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('stock'),
                ]);
            } elseif ($errors->has('year')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('year'),
                ]);
            } elseif ($errors->has('publisher')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('publisher'),
                ]);
            } elseif ($errors->has('cover')) {
                return response()->json([
                    'alert' => 'error',
                ]);
            }
        }

        $file = $request->file('cover');
        $filename = $file->getClientOriginalName();
        $file->move('images/books', $filename);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'year' => $request->year,
            'publisher' => $request->publisher,
            'cover' => $filename,
        ]);
    }

    public function destroy(Book $book)
    {
        $file = public_path('images/books/' . $book->cover);
        if (file_exists($file)) {
            unlink($file);
        }

        $book->delete();

        return response()->json([
            'alert' => 'success',
            'message' => 'Berhasil menghapus buku',
        ]);
    }
}
