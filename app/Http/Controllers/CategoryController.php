<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function store(Request $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->save();
        return redirect()->route('ShowCategoriesAdminPage');
    }

    public function update(Request $request, Category $category)
    {
        $category->title=$request->title;
        $category->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }

    public function category_update(Request $request, Category $category)
    {
        $request->validate(
            [
                'title' => ['required', 'regex:/[А-ЯЁа-яё]/u'],
            ],
            [
                'title.required' => 'Поле обязательно для заполнения',
                'title.regex' => 'Допустима только кириллица',
            ]);
        $category->title = $request->title;
        $category->update();
        return redirect()->route('ShowCategoriesAdminPage');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

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
    }

    /**
     * Update the specified resource in storage.
     */
}
