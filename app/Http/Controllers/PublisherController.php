<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;
use App\Book;


class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entity=Publisher::all();
        return view('publisher.index',[
            'publishers'=>$entity,
            'title'=>'PublisherList'
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books=Book::all();
        return view('publisher.create',['books'=>$books]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Publisher::validateRules());

        /*$request->validate([
            'name'=>'required|string|max:255|min:3|unique:name',
            'book_id'=>'required|int|exists:books,id',
            'year_of_publisher'=>'required|int'
        ]);*/



        $request->merge([
            'status'=>'active'
        ]);
     
        
        $publisher=new Publisher([$request->all()

        ]);
        $publisher->save();
        dd($publisher);

        return redirect()->route('publisher.index');
    
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
        $publisher=Publisher::find($id);
        $books = Book::all();
        return view('publisher.edit',compact('publisher','books'));
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
        //Publisher::where('id','=','$id')->update($request->all());
        $publisher=Publisher::find($id);
        $request->validate(Publisher::validateRules());
        $publisher->update($request->all());

        //$publisher=newPublisher();
        return redirect()->route('publisher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Publisher::destroy($id);
        return redirect()->route('publisher.index')->with('success','PublisherDeleated');
    }
}
