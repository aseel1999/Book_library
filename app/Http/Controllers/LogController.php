<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\Issue;
class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entity =Log::all();
        return view('log.index',[
            'logs'=>$entity,
            'title'=>'LogsList'
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $issues=Issue::all();
        return view('log.create',['issues'=>$issues]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(Log::validateRules());
       /* $request->validate([
            'issue_id'=>'requierd|int|exists:issues,id',
            'status'=>'required|int|in:1,-1'
        ]);*/



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
        $issues=Issue::all();
        $log=Log::find($id);
        return view('log.edit',compact('issues','log'));
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
       // Log::where('id','=','$id')->update($request->all());
        $log=Log::find($id);
        $request->validate(Log::validateRules());
        $log->update($request->all());
        return redirect()->route('log.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::destroy($id);
        return redirect()->route('log.index')->with('success','LogDeleated');
    }
}
