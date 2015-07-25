<?php

namespace App\Http\Models;
use App\Http\Controllers\Book;
use DB;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public static function getAllBooks(){
      $results = DB::select('SELECT * FROM books');
      return $results;
    }
}
