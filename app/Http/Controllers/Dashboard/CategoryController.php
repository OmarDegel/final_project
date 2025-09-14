<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;

use App\Http\Requests\Dashboard\CategoryRequest;

class CategoryController extends MainController
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->setClass('categories');
    }
    public function index()
    {
        $categories = Category::paginate(20);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return redirect()->route('categories.index')->with("success", __("site.added_successfully"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('categories.index')->with("success", __("site.updated_successfully"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')->with("success", __("site.deleted_successfully"));
    }
    public function categoryActive(Category $category)
    {
        $category->status = !$category->status;
        $category->save();
        return redirect()->back();
    }
}
