<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view("dashboard.category.index", ['categories' => $category]);
    }
    public function create()
    {
        return view("dashboard.category.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20|unique:categories,name'
        ]);
        Category::create([
            'name' => $request->input("name")
        ]);
        return redirect()->route("category.index")->with([
            'success' => "category has been created successfully"
        ]);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view("dashboard.category.edit", ['category' => $category]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:20|unique:categories'
        ]);
        $data = Category::findOrFail($id);
        $data->name = $request->input("name");
        $data->save();
        return redirect()->route("category.index")->with([
            'success' => "category updated successfully"
        ]);
    }

    public function destroy($id)
    {
        $cats = Category::findOrFail($id);
        $cats->delete();
        return redirect()->route("category.index")->with([
            'success' => 'category deleted successfully'
        ]);
    }
}
