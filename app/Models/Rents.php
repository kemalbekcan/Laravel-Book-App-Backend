<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rents extends Model
{
    use HasFactory;

    protected $table = "rents";

    public $timestamps = true;

    protected $fillable = [
        'userid',
        'bookid',
        'bookName',
        'rentName',
        'rentPrice'
    ];
    
}
