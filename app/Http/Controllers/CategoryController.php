<?php

namespace App\Http\Controllers;
use Validator;
use App\Category;
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
        $categs=Category::all();
        return view('category.index',[
            'categories'=>$categs,
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
        $request->validate(Category::validateRules());
        
        /*$rules=[
            'cat_name'=>'required|string|max:255|min:3|unique:cat_name',
        ];*/
     /*  $clean = $request->validate($rules,[
            'required'=>"The :attribute required",
        ]);*/
        //$clean=$this-validate($request,$rules);
       /* $cat=new Category();
       $data = $request->all();
        $validator = Validator::make($data,$cat->rules);*/
        //$clean=$validator->validate();
        // throw exception
        /*try{
            
           $clean=$validator->validated();
         }catch(Throwable $e){
             return $validator->failed();//returns field
            return redirect()->back()->withErrors($validator);

         }*/

       /*if($validator->fails()){
            //$errors=$validator->errors();
            return redirect()->back()->withErrors($validator)->withInput();
        }*/

        $request->merge([
            'status'=>'active',
        ]);
        $category = new Category($request->all());
        $category->save();
        dd($category);

        return redirect()->route('category.index')->with('success','Category Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::findOrFail($id);
        return view('category.show',[
            'category'=>$category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Category::where('id','=','$id')->whereNull('deleted_at')first();
        $category=Category::findOrFail($id);
       
        return view('category.edit',[
            'category'=>$category
        ]);
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
        /*$rules=[
            'cat_name'=>'required|string|max:255|min:3|unique:cat_name',
        ];
        $clean=$request->validate($rules);*/
        
        $category=Category::find($id);
        $request->validate(Category::validateRules());
        $category->update($request->all());
        
        //1
       /* $category->cat_name=$request->post('cat_name');
        $category->save();*/
       //2
       //$category->update([$request->all()]);
       //3
       //$categoty->fill([$request->all()])->save();
       return redirect()->route('category.index')->with('success','Category Updated');

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
