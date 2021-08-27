<?php

namespace App\Http\Controllers;

use App\Models\Rents;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function addRent(Request $request){
        $fields = $request->validate([
            'userid' => 'required|integer',
            'bookid' => 'required|integer', 
            'bookName' => 'required|string',
            'rentName' => 'required|string',
            'rentPrice' => 'required|integer'
        ]);

        $rents = Rents::create([
            'userid' => $fields['userid'],
            'bookid' => $fields['bookid'],
            'bookName' => $fields['bookName'],
            'rentName' => $fields['rentName'],
            'rentPrice' => $fields['rentPrice']
        ]);

        $response = [
            'rents' => $rents
        ];

        return response($response, 201);
    }

    public function index(Request $request){
        return Rents::all();
    }

    public function isRent(Request $request){
        $results = Rents::join('users', 'rents.userid', '=', 'users.id')
        ->get();
    }
}
