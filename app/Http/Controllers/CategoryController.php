<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recursive;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = $this->category->oldest()->paginate(5);
        return view('category.index', compact('categories'));
    }

    //create
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function create()
    {
        $htmlOption = $this -> getCategory($parentId = '');
        return view('category.add', compact('htmlOption'));
    }

    //store
    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('categories.index');
    }

    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recursive($data);
        $htmlOption = $recusive->categoryRecursive($parentId);
        return $htmlOption;
    }

    public function edit($id)
    {
        $category = $this ->category -> find($id);
        $htmlOption = $this -> getCategory($category -> parent_id);
        return view('category.edit',compact('category','htmlOption'));
    }

    public function update($id,Request $request) {
        $this ->category ->find($id) -> update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        $this -> category ->find($id)->delete();
        return redirect()->route('categories.index');
    }
}
