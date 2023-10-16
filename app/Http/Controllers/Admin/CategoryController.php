<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = Category::query()->paginate(10);
        return view('users.admin.category.index', compact(
            'categories'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $category = new Category();
        $isUpdate = false;
        return view('users.admin.category.form', compact(
            'category', 'isUpdate'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $formFields = $request->validated();
        Category::create($formFields);

        return to_route('categories.index')->with('success', 'Category created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $products = $category->products()->get();
        return view('users.admin.category.show', compact(
            'category', 'products'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        $isUpdate = true;
        return view('users.admin.category.form', compact(
            'category', 'isUpdate'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $category->fill($request->validated())->save();
        return to_route('categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return to_route('categories.index')->with('success', 'Category deleted successfully');
    }
}
