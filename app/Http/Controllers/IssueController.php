<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Issue;
use App\Book;
class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entity=Issue::all();
        return view('issue.index',[
            'issues'=>$entity,
            'title'=>'IssueList'
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
        return view("issue.create",compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Issue::validateRules());
      /*  $request->validate([
            'issue_on'=>'required|date_formate:d/m/y',
            'return_date'=>'required|date|after_or_equal:issue_on',
            'book_id'=>'required|int|max:3|exists:books,id'
        ]);*/

        
    $request->merge([
            'status'=>'active'
        ]);
     
        
        $issue=new Issue($request->all()

        );
        $issue->save();
        dd($issue);

        return redirect()->route('issue.index');
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
        
        $books=Book::all();
        $issue=Issue::find($id);
        return view('issue.edit',compact('issue','books'));
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
       // Issue::where('id','=','$id')->update($request->all());
        $issue=Issue::find($id);
        $request->validate(Issue::validateRules());
        $issue->update($request->all());
        //$issue=newissue();
        return redirect()->route('issue.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Issue::destroy($id);
        return redirect()->route('issue.index')->with('success','issueDeleated');
    }
}
