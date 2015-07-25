<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers;
use App\Http\Models;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class BookController extends BaseController
{ 

  public function index() {
    $results = DB::table('books')->get();
    return view('books.index',['results' => $results])
    ->nest('template', 'layout.template');
  }


  public function showForm() {
    return view('books.create')
    ->nest('template', 'layout.template');
  }


  public function insertToBooks(Request $request) {

    DB::table('books')->insert(
      [
       'isbn' => $request->input('form-isbn'),
       'title' => $request->input('form-title'),
       'author' => $request->input('form-author'),
       'publisher' => $request->input('form-publisher'),
       'image' => $request->input('form-image')
       ]
    );
      //DB::insert('insert into books (isbn, title, author, publisher, image) values (?, ?, ?, ?, ?)', ['Dayle','Dayle','Dayle','Dayle','Dayle']);
    return redirect()->action('BookController@index');
  }


  public function showDeleteForm(Request $request, $id) {
    $data = DB::table('books')->where('id', $id)->first();
    return view('books.delete',['data' => $data])->nest('template', 'layout.template');
  }


  public function deleteBook(Request $request, $id) {
      DB::table('books')
      ->where('id', '=', $id)
      ->delete();
      echo "deleted!";
      return redirect()->action('BookController@index');
  }


  public function showUpdateForm(Request $request, $id) {
    $data = DB::table('books')->where('id', $id)->first();
    return view('books.update',['data' => $data])->nest('template', 'layout.template');
  }


  public function updateBook(Request $request, $id) {
      DB::table('books')
      ->where('id', $id)
      ->update(
        [
          'isbn' => $request->input('u-form-isbn'),
          'title' => $request->input('u-form-title'),
          'author' => $request->input('u-form-author'),
          'publisher' => $request->input('u-form-publisher'),
          'image' => $request->input('u-form-image')
        ]);
      return redirect()->action('BookController@index');
  }


  public function getAllBooks() {
      $books=Book::getAllBooks();
      return response()->json($books);
  }
}
