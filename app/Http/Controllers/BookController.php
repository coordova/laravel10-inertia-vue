<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Book::paginate(10);

        // $data = Book::query()->paginate(20);

        // dd($data);
        return Inertia::render('books', [
            'books' => Book::paginate(10)->through(fn($book) => [
                'id' => $book->id,
                'title' => $book->title,
                'author' => $book->author,
                'image' => $book->image
            ])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',

        ])->validate();

        Book::create($request->all());

        $this->processImage($request, );

        return redirect()->back()
            ->with('message', 'Book created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',

        ])->validate();

        $book->update($request->all());

        $this->processImage($request, $book);

        return redirect()->back()
            ->with('message', 'Book updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->back()
            ->with('message', 'Book deleted');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('imageFilepond')) {
            return $request->file('imageFilepond')->store('uploads/books', 'public');
        }
        return '';
    }

    public function uploadRevert(Request $request)
    {
        if ($image = $request->get('image')) {
            $path = storage_path('app/public/' . $image);
            if(file_exists($path)){
                unlink($path);
            }
        }
        return '';
    }

    protected function processImage(Request $request, Book $book = null)
    {
        if ($image = $request->get('image')) {
            $path = storage_path('app/public/' . $image);
            // dd($image, storage_path(), $path, public_path(), public_path($image));
            // dd($path);
            if (file_exists($path)) {
                copy($path, public_path('storage/' . $image));
                // unlink($path);
            }
        }

        if ($book) {
            if (!$request->get('image')) {
                if ($book->image) {
                    if (file_exists(public_path($book->image))) {
                        unlink(public_path($book->image));
                    }
                }
            }
            $book->update([
                'image' => $request->get('image')
            ]);
        }
    }
}
