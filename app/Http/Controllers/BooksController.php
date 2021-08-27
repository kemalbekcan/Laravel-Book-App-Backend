<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(){
        return Book::all();
    }

    public function addBook(Request $request){
        $fields = $request->validate([
            'bookName' => 'required|string',
            'barcodeNo' => 'required|string',
            'pageNumber' => 'required|integer',
            'image' => 'required|string',
            'price' => 'required|integer'
        ]);

        $books = Book::create([
            'bookName' => $fields['bookName'],
            'barcodeNo' => $fields['barcodeNo'],
            'pageNumber' => $fields['pageNumber'],
            'image' => $fields['image'],
            'price' => $fields['price']
        ]);

        $response = [
            'books' => $books
        ];

        return response($response, 201);
    }
}
