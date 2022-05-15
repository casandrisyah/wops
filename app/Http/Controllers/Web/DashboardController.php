<?php

namespace App\Http\Controllers\Web;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $books = Book::where('title', 'like', '%' . $request->keyword . '%')->paginate(4);
            return view('pages.web.dashboard.list', compact('books'));
        }
        return view('pages.web.dashboard.main');
    }
}
