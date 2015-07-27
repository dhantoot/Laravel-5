<?php

namespace App\Http\Models;
use DB;
use App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Book extends Model
{

    public static function _getAllBooks() {
      $results = DB::table('books')->get();
      return $results;
    }
    public static function _insertToBooks(Request $request){
      $data = [ 'status' => 'inserted successfully',
                'isbn' => $request->input('form-isbn'),
                'title' => $request->input('form-title'),
                'author' => $request->input('form-author'),
                'publisher' => $request->input('form-publisher'),
                'image' => $request->input('form-image')
              ];

      $result = DB::table('books')->insert(
        [
          'isbn' => $data['isbn'],
          'title' => $data['title'],
          'author' => $data['author'],
          'publisher' => $data['publisher'],
          'image' => $data['image'],
         ]
      );
      if($result) return $data;
      else return ['status' => 'failed'];
    }

    public static function _updateBook(Request $request,$id){
      $data = [ 'status' => 'updated successfully',
                'isbn' => $request->input('u-form-isbn'),
                'title' => $request->input('u-form-title'),
                'author' => $request->input('u-form-author'),
                'publisher' => $request->input('u-form-publisher'),
                'image' => $request->input('u-form-image')
              ];
      $result = DB::table('books')
      ->where('id', $id)
      ->update([
          'isbn' => $data['isbn'],
          'title' => $data['title'],
          'author' => $data['author'],
          'publisher' => $data['publisher'],
          'image' => $data['image'],
        ]);

        if($result) return $data;
        else return ['status' => 'failed'];
    }
    public static function _deleteBook(Request $request, $id){
      $data = ['status'=> 'deleted successfully',
               'id' => $id
             ];
      $result = DB::table('books')
      ->where('id', '=', $id)
      ->delete();
      if($result) return $data;
      else return ['status' => 'failed'];
    }
}
