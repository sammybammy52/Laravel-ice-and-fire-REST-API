<?php

namespace App\Http\Controllers;
use App\Models\Book;

//This Controller holds special methods or computations that might be needed by the BookController

class CrudFunctions extends Controller
{

    public function createBook($data)
    {
        return Book::create($data);
    }

    public function retrieveBook($search, $year)
    {
        if ($search !== null && $year !== null) {
            return Book::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('country', 'LIKE', "%{$search}%")
            ->orWhere('publisher', 'LIKE', "%{$search}%")
            ->whereYear('release_date', $year)
            ->get();
        }elseif ($search !== null) {
            return Book::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('country', 'LIKE', "%{$search}%")
            ->orWhere('publisher', 'LIKE', "%{$search}%")
            ->get();
        }elseif ($year !== null) {
            return Book::query()
            ->whereYear('release_date', $year)
            ->get();

        }
        else {
            return Book::all();
        }

    }

    public function updateBook($data,$id)
    {
        $book = Book::find($id);
        $book->update($data);

        return $book;
    }

    public function deleteBook($id)
    {
        $bookName = Book::where('id', $id)->get(['name']);

        $book = Book::destroy($id);

        return $bookName;
    }

    public function showBook($id)
    {
        return Book::find($id);
    }


}

