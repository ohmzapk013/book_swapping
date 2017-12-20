<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Book;
use App\City;
use App\District;
use App\Category;
use App\Publisher;
use App\Author;
use App\Book_Category;
use Auth;

class BookController extends Controller
{
    protected $imagePath = "/images/books/";
    /**
     * Update Image from JSON to Array
     *
     * @return Array
     */
    public function updateLinkImages($jsonImages) {
        $images = [];
        $imageList = json_decode($jsonImages, true);
        foreach ($imageList as $image) {
            $images[] = $this->imagePath . $image;
        }
        return $images;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books       = Book::orderBy('created_at', 'desc')->paginate(30); // Want to Swap
        foreach ($books as $book) {
            $book->images = $this->updateLinkImages($book->images);
        }
        $categories  = Category::all();
        foreach ($categories as $category) {
            $category->total_book = Book_Category::where('category_id', $category->id)->count();
        }
        $publishers  = Publisher::all();
        foreach ($publishers as $publisher) {
            $publisher->total_book = Book::where('publisher_id', $publisher->id)->count();
        }
        return view('homepage', [
                                 'books' => $books,
                                 'categories' => $categories,
                                 'publishers' => $publishers
                                ]
                    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities      = City::all();
        $categories  = Category::all();
        foreach ($categories as $category) {
            $category->total_book = Book_Category::where('category_id', $category->id)->count();
        }
        $publishers  = Publisher::all();
        foreach ($publishers as $publisher) {
            $publisher->total_book = Book::where('publisher_id', $publisher->id)->count();
        }
        return view('book.add_edit_book', ['cities' => $cities, 'categories' => $categories, 'publishers' => $publishers]);
    }

    public function filterByCategory($id)
    {
        $category       = Category::findOrFail($id);
        $books = $category->books()->paginate(30);
        foreach ($books as $book) {
            $book->images = $this->updateLinkImages($book->images);
        }
        $categories  = Category::all();
        $categories->activeId = $id;
        foreach ($categories as $cat) {
            $cat->total_book = Book_Category::where('category_id', $cat->id)->count();
        }
        $publishers  = Publisher::all();
        foreach ($publishers as $publisher) {
            $publisher->total_book = Book::where('publisher_id', $publisher->id)->count();
        }
        return view('homepage', [
                                 'books' => $books,
                                 'categories' => $categories,
                                 'publishers' => $publishers
                                ]
                    );
    }

    public function filterByPublisher($id)
    {
        $publisher       = Publisher::findOrFail($id);
        $books = $publisher->books()->paginate(30);
        foreach ($books as $book) {
            $book->images = $this->updateLinkImages($book->images);
        }
        $categories  = Category::all();
        foreach ($categories as $cat) {
            $cat->total_book = Book_Category::where('category_id', $cat->id)->count();
        }
        $publishers  = Publisher::all();
        $publishers->activeId = $id;
        foreach ($publishers as $publisher) {
            $publisher->total_book = Book::where('publisher_id', $publisher->id)->count();
        }
        return view('homepage', [
                                 'books' => $books,
                                 'categories' => $categories,
                                 'publishers' => $publishers
                                ]
                    );
    }

    public function uploadImages(Request $request)
    {
        if($request->hasFile('image_list')) {
           // retrieve all of input data
           $files = $request->file('image_list');
           $imagesName = explode(',', $request->image_name);
           foreach ($files as $index => $file) {
               //Store the file at our public/images
               $file->move(public_path() . '/images/books/', $imagesName[$index]);
           }
        }
    }

    public function deleteImage($imageName)
    {
        unlink(public_path() . '/images/books/' . $imageName);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(),
            [
                'title'   => 'required',
                'name'    => 'required',
                'author'  => 'required',
                'status'  => 'required|numeric',
                'categories.*' => 'required|numeric',
                'publisher' => 'required|numeric',
                'want_to' => 'required|numeric',
                'city_id' => 'required|numeric',
                'image_list_upload' => 'required',
            ],
            [
                'title'   => 'the Title field is required',
                'name'    => 'the Name field is required',
                'author'  => 'the Author field is required',
                'status'  => 'the Status field is required',
                'want_to' => 'the Want_to field is not empty',
                'city_id' => 'Please choose the City',
                'image_list_upload' => 'Please choose at least one image',
            ]
        );
        if ($validate->fails()) {
            return redirect()->route('add_book')
                             ->withErrors($validate)
                             ->withInput();
        } else {
            //check author exists or not
            $author = Author::where('name', $request->author)->first();
            if (is_null($author)) { //not exists
                $author         = new Author;
                $author->name   = $request->author;
                $author->save();
            }
            $book                   = new Book;
            $book->title            = $request->title;
            $book->name             = $request->name;
            $book->description      = $request->description;
            $book->images           = json_encode(explode(',', $request->image_list_upload));
            $book->status           = $request->status;
            $book->want_to          = $request->want_to;
            if($request->want_to == 1) {
                $book->price        = $request->price;
            }
            $book->city_id          = $request->city_id;
            $book->publisher_id     = $request->publisher;
            $book->author_id        = $author->id;
            $book->user_id          = Auth::id();
            $book->save();

            //Update Book_Categories
            foreach ($request->categories as $categoryId) {
                $bookCategory           = new Book_Category;
                $bookCategory->book_id  = $book->id;
                $bookCategory->category_id = $categoryId;
                $bookCategory->save();
            }
            return redirect('/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        $book->images = $this->updateLinkImages($book->images);
        $categories  = Category::all();
        foreach ($categories as $category) {
            $category->total_book = Book_Category::where('category_id', $category->id)->count();
        }
        $publishers  = Publisher::all();
        foreach ($publishers as $publisher) {
            $publisher->total_book = Book::where('publisher_id', $publisher->id)->count();
        }
        return view('book.book_details', [
                                 'book'       => $book,
                                 'categories' => $categories,
                                 'publishers' => $publishers
                                ]
                    );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
