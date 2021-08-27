<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function addAuthor(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'age' => 'required|integer',
            'birthday' => 'nullable|date',
            'deathday' => 'date'
        ]);

        $authors = Author::create([
            'name' => $fields['name'],
            'surname' => $fields['surname'],
            'age' => $fields['age'],
            'birthday' => $fields['birthday'],
            'deathday' => $fields['deathday']
        ]);

        $response = [
            'authors' => $authors
        ];

        return response($response, 201);
    }

    public function deleteAuthor(Request $request){
        $fields = $request->validate([
            'id' => 'integer'
        ]);
        $authors = Author::where('id', $fields['id'])->delete();

        return response($authors, 201);
    }

    public function index(Request $request){
        $authors = Author::get();

        return response($authors, 200);
    }
}
