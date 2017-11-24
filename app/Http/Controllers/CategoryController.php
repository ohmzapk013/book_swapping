<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.manage_category', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),
            [
                'name' => 'required|unique:categories'
            ],
            [
                'name.required' => 'the Name field is required',
                'name.unique'   => 'Category Name has exist'
            ]
        );

        if ($validate->fails()) {
            return redirect()->route('categories')
                             ->withErrors($validate)
                             ->withInput();
        }else {
            $category = new Category;
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();
            return redirect()->route('categories')
                             ->with('success', 'add category successfull');
        }
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(),
            [
                'name' => 'required'
            ],
            [
                'name.required' => 'the Name field is required',
            ]
        );

        if ($validate->fails()) {
            return redirect()->route('categories')
                             ->withErrors($validate)
                             ->withInput();
        }else {
            $category = Category::findOrFail($id);
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();
            return redirect()->route('categories')
                             ->with('success', 'update category successfull');
        }
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories')->with('success', 'Delete category successfull');
    }
}
