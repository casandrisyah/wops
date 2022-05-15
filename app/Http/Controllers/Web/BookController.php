<?php

namespace App\Http\Controllers\Web;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function novel(Request $request)
    {
        if ($request->ajax()) {
            $books = Book::where('category', 'novel')->where('title', 'like', '%' . $request->keyword . '%')->paginate(4);
            return view('pages.web.books.list', compact('books'));
        }
        return view('pages.web.books.main');
    }

    public function cerpen(Request $request)
    {
        if ($request->ajax()) {
            $books = Book::where('category', 'cerpen')->where('title', 'like', '%' . $request->keyword . '%')->paginate(4);
            return view('pages.web.books.list', compact('books'));
        }
        return view('pages.web.books.main');
    }

    public function komik(Request $request)
    {
        if ($request->ajax()) {
            $books = Book::where('category', 'komik')->where('title', 'like', '%' . $request->keyword . '%')->paginate(4);
            return view('pages.web.books.list', compact('books'));
        }
        return view('pages.web.books.main');
    }

    public function ensiklopedia(Request $request)
    {
        if ($request->ajax()) {
            $books = Book::where('category', 'ensiklopedia')->paginate(4);
            return view('pages.web.books.list', compact('books'));
        }
        return view('pages.web.books.main');
    }

    public function biografi(Request $request)
    {
        if ($request->ajax()) {
            $books = Book::where('category', 'biografi')->paginate(4);
            return view('pages.web.books.list', compact('books'));
        }
        return view('pages.web.books.main');
    }

    public function dongeng(Request $request)
    {
        if ($request->ajax()) {
            $books = Book::where('category', 'dongeng')->paginate(4);
            return view('pages.web.books.list', compact('books'));
        }
        return view('pages.web.books.main');
    }

    public function show(Book $book)
    {
        return view('pages.web.books.show', ['data' => $book]);
    }
}
