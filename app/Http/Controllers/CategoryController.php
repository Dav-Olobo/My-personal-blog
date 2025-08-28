<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all()->sortByDesc('created_at');
        return view('categories.category-list', compact('categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categories.create-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $data = $request->validate([
            'name' => 'required | unique:categories',
            ],[
            'name.required' => 'Please Enter the Category Name.',
        ]);

         $name = $request->input('name');
    
        $category = new Category();
         $category->name = $name;
    

        $category->save();
        // Redirect or return a response after saving the post
        return redirect()->back()->with('status', 'Category created successfully!');  

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        $category = Category::find($category->id);
        return view('categories.edit-category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
            $data = $request->validate([
                'name' => 'required | unique:categories,name,'.$category->id,
                ],[
                'name.required' => 'Please Enter the Category Name.',
            ]);
    
            $name = $request->input('name');
        
            $category = Category::find($category->id);
            $category->name = $name;
            $category->save();
            // Redirect or return a response after saving the post
            return redirect()->back()->with('status', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category = Category::find($category->id);
        $category->delete();
        return redirect()->route('categories.index')->with('status', 'Category deleted successfully!');
    }
}
