<?php

namespace App\Http\Controllers;
use App\Book;
use App\Category;
use App\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $entity=Book::all();
        return view('book.index',[
            'books'=>$entity,
            'title'=>'BooksList'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $publishers= Publisher::all();
        return view('book.create',compact('categories','publishers'));
         

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(Book::validateRules());
       /* $request->validate([
            'title'=>'required|string|max:255|min:3|unique:title',
             'author'=>'required|string|max:255|min:3|unique:author',
             'description'=>'nullable|min:5',
             'category_id'=>'required|int|exists:categories,id',
             'available'=>'required|int|in:1,0'
        ]);*/
       
        $request->merge([
            'status'=>'active'
        ]);
     
        
        $book=new Book($request->all()

        );
        $book->save();
        dd($book);

        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $publishers= Publisher::all();
        $book=Book::find($id);
        return view('book.edit',compact('book','categories','publishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Book::where('id','=','$id')->update($request->all());
        $book=Book::find($id);
        $request->validate(Book::validateRules());
        $book->update($request->all());
        //$book=new Book();
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Book::destroy($id);
        return redirect()->route('book.index')->with('success','Book Deleated');
    }
    public function trash(){
        $books=Book::onlyTrashed()->paginate();
        return view('book.trash',[
            'books'=>$books,
        ]);
    }
    public function restore(Request $request,$id=null){
        if($id){
        $book=Book::onlyTrashed()->findOrFail($id);
        $book->restore();
        return redirect()->route('book.index')->with('success','Book Restored');
    }
    Book::onlyTrashed()->restore();
    return redirect()->route('book.index')->with('success','All Books Restored');
}
public function forceDelete($id=null){
    if($id){
        $book=Book::onlyTrashed()->findOrFail($id);
        $book->forceDelete();
        return redirect()->route('book.index')->with('success','Book deleted');
    }
    Book::onlyTrashed()->forceDelete();
    return redirect()->route('book.index')->with('success','All Books deleted');

}
public function search(Request $request){

$search = $request->input('search');


$books = Book::all()
    ->where('title', 'LIKE', "%{$search}%")
    ->orWhere('Author', 'LIKE', "%{$search}%")
    ->get();
    return view('layout.search', compact('books'));
        
}}
