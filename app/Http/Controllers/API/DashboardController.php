<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return $books;
    }

    public function novel()
    {
        $books = Book::where('category', 'novel')->get();
        return $books;
    }

    public function cerpen()
    {
        $books = Book::where('category', 'cerpen')->get();
        return $books;
    }

    public function komik()
    {
        $books = Book::where('category', 'komik')->get();
        return $books;
    }

    public function ensiklopedia()
    {
        $books = Book::where('category', 'ensiklopedia')->get();
        return $books;
    }

    public function biografi()
    {
        $books = Book::where('category', 'biografi')->get();
        return $books;
    }

    public function dongeng()
    {
        $books = Book::where('category', 'dongeng')->get();
        return $books;
    }

    public function show($id)
    {
        $book = Book::find($id);
        return $book;
    }
}
