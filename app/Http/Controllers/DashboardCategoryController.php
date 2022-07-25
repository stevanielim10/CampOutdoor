<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|unique:categories,name',
            'image' => 'image|file|mimes:jpg,png,jpeg|max:4096',
        ]);

        $category = new Category();
        $category->name = $request->category;
        $category->slug = Str::slug($request->category);
        if ($request->file('image')) {
            $category->image = $request->file('image')->store('category-images');
        }
        $request->file('image')->store('public/category-images');
        $category->save();

        return redirect(route('categories.index'))->with('success', 'Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category' => 'required|unique:categories,name,' . $category->id . ',id',
            'image' => 'image|file|mimes:jpg,png,jpeg|max:4096',
        ]);

        $category->name = $request->category;
        $category->slug = Str::slug($request->category);
        if ($request->file('image')) {
            if ($category->image) {
                Storage::delete($category->image);
            }
            $category->image = $request->file('image')->store('category-images');
        }
        $request->file('image')->store('public/category-images');
        $category->save();

        return redirect(route('categories.index'))->with('success', 'Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $beranda = Beranda::where('category_id', $category->id)->first();
        if ($beranda) {
            Beranda::where('category_id', $category->id)->delete();
        }
        $category->delete();

        return back()->with('success', 'Berhasil');
    }
}
