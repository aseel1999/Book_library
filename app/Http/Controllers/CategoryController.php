<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entity=Category::all(['*']);
        return view('category.index',[
            'categories'=>$entity,
            'title'=>'CategoriesList'
        ]);
// $entity=Category::all(['id','name']);
    }
    //dd(compact('entity','title'));

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->all();
       // $request->cat_name;
       // $request->get('cat_name');
       // $request->post('cat_name');
       // $request->input('cat_name');
        //$request->query('cat_name');//?cat_name=value
       
       //1 $category=new Category();
       /* $category->cat_name=$request->post('cat_name');
        $category->save();
        
        
       /* //2
        $category=Category::create([
            $request->all()

        ]);*/
        $request->merge([
            'status'=>'active'
        ]);
     
        //3
        $category=new Category([$request->all()

        ]);
        $category->save();
        dd($category);

        return redirect()->route('category.index');
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
        //Category::where('id','=','$id')->first();
        $category=Category::find($id);
        return view('category.edit',compact('category'));
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
        Category::where('id','=','$id')->update($request->all());
        $category=Category::find($id);
        $category=new Category();
        //1
       /* $category->cat_name=$request->post('cat_name');
        $category->save();*/
       //2
       //$category->update([$request->all()]);
       //3
       //$categoty->fill([$request->all()])->save();
       return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function destroy($id)
    {
        //1
        //$category=Category::find($id)->delete();
        //$category->delete();
        //2
        Category::destroy($id);
        //3
       // Category::where('id','=',$id)->delete();
       return redirect()->route('category.index')->with('success','Category Deleated');

    }
}
