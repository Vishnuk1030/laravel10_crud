<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(6);
        //Log::info("query executed");
        return view("category.index", compact("categories"));
    }

    public function create()
    {
        return view("category.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255|string',
            'is_active' => 'sometimes',
        ]);
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active == true ? 1 : 0,
        ]);
        return redirect('/create')->with('status', 'Category created..');
    }

    public function edit($id)
    {
        $category = Category::findOrFail(decrypt($id));
        //return $category;
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255|string',
            'is_active' => 'sometimes',
        ]);
        Category::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active == true ? 1 : 0,
        ]);
        return redirect()->back()->with('status', 'Category Updated..');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/categories');
    }
}
