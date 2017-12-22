<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Publisher;
use App\Book_Category;
use App\Book;
use Auth;

class SwapController extends Controller
{
    public function index()
    {
        $books = Book::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(30);
        foreach ($books as $book) {
            $book->images = app('App\Http\Controllers\BookController')->updateLinkImages($book->images);
        }
        $categories  = Category::all();
        foreach ($categories as $category) {
            $category->total_book = Book_Category::where('category_id', $category->id)->count();
        }
        $publishers  = Publisher::all();
        foreach ($publishers as $publisher) {
            $publisher->total_book = Book::where('publisher_id', $publisher->id)->count();
        }
        return view('swap.index', [
                                 'books' => $books,
                                 'categories' => $categories,
                                 'publishers' => $publishers
                                ]);
    }
}
