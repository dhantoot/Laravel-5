<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers;
use App\Http\Models\Book;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
class BookController extends BaseController
{

  public function index() {
    $results=Book::_getAllBooks();
    return view('books.index',['results' => $results])
    ->nest('template', 'layout.template');
  }

  public function getAllBooks() {
      $results=Book::_getAllBooks();
      return view('books.index',['results' => $results])
      ->nest('template', 'layout.template');
  }

  public function showForm() {
    return view('books.create')->nest('template', 'layout.template');
  }


  // public function insertToBooks(Request $request) {
  //
  //   $result = Book::_insertToBooks($request);
  //   if($result) return redirect()->action('BookController@index');
  //   else echo 'error';
  // }


  public function showDeleteForm(Request $request, $id) {
    $data = DB::table('books')->where('id', $id)->first();
    return view('books.delete',['data' => $data])->nest('template', 'layout.template');
  }


  // public function deleteBook(Request $request, $id) {
  //     DB::table('books')
  //     ->where('id', '=', $id)
  //     ->delete();
  //     echo "deleted!";
  //     return redirect()->action('BookController@index');
  // }


  public function showUpdateForm(Request $request, $id) {
    $data = DB::table('books')->where('id', $id)->first();
    return view('books.update',['data' => $data])->nest('template', 'layout.template');
  }


  // public function updateBook(Request $request, $id) {
  //     DB::table('books')
  //     ->where('id', $id)
  //     ->update(
  //       [
  //         'isbn' => $request->input('u-form-isbn'),
  //         'title' => $request->input('u-form-title'),
  //         'author' => $request->input('u-form-author'),
  //         'publisher' => $request->input('u-form-publisher'),
  //         'image' => $request->input('u-form-image')
  //       ]);
  //     return redirect()->action('BookController@index');
  // }


  public function showCommentForm(){
    return view('books.comment')->nest('template', 'layout.template');
  }


  //========================== API =======================>

  public function getAllBooksAPI() {
      $results=Book::_getAllBooks();
      return response()->json($results);
  }
  public function insertToBooksAPI(Request $request){
      $results = Book::_insertToBooks($request);
      return view('books.successform',['data'=> $response()->json($results)])->nest('template', 'layout.template');
      //return response()->json($result);
  }
 public function updateBookAPI(Request $request,$id){
     $results = Book::_updateBook($request,$id);
     return view('books.successform',['data'=> response()->json($results)])->nest('template', 'layout.template');
     //return response()->json($results);
 }
 public function deleteBookAPI(Request $request,$id){
     $results = Book::_deleteBook($request,$id);
     return view('books.successform',['data'=> response()->json($results)])->nest('template', 'layout.template');
     //return response()->json($results);
 }

}
