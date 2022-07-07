<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recursive;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        return view('category.index');
    }

    //create
    private $category;
    public function __construct(Category $category){
        $this ->category = $category;
    }
    public function create(){
        $data = $this->category->all();
        $recusive = new Recursive($data);
        $htmlOption = $recusive -> categoryRecursive();
        return view('category.add',compact('htmlOption'));
    }

    //store
    public function store(Request $request) {
        $this ->category->create([
            'name' =>$request->name,
            'parent_id'=>$request ->parent_id,
            'slug'=>Str::slug($request->name)
        ]);

        return redirect() -> route('categories.index');
    }
}
