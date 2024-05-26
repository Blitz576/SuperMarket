<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\StoreCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Models\Category;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    use UploadImageTrait;

    function __construct()
    {
    }


    public function index()
    {
        $request = request();

        $fields = ['name'];
        $searchQuery = trim($request->query('search'));

        $categories = Category::where(function($query) use($searchQuery, $fields) {
            foreach ($fields as $field)
                $query->orWhere($field, 'like',  '%' . $searchQuery .'%');
        })
            ->orderBy('id', 'DESC')
            ->paginate(30);

        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category();

        return view('dashboard.categories.create' , compact('category'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->except('cover_image' , '_token', '_method');

        $data['cover_image'] = $this->uploadImage($request, 'cover_image', 'categories');

        Category::create($data);

        toastr()->success('Category Add Successfully');

        return redirect()->route('categories.index');
    }


    public function show(Category $category)
    {
        return view('dashboard.categories.show', compact('category' ));
    }


    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request , Category $category)
    {
        $old_cover_image = $category->cover_image;
        $data = $request->except('cover_image' , '_token', '_method');

        $data['cover_image'] = $this->uploadImage($request, 'cover_image', 'categories');

        if(!$request->hasFile('cover_image')){
            unset($data['cover_image']);
        }

        $category->update($data);

        if ($old_cover_image && isset($data['cover_image'])) {
            Storage::disk('public')->delete($old_cover_image);
        }

        toastr()->success('Category Updated Successfully');

        return redirect()->route('categories.index');
    }


    public function destroy(Category $category)
    {
        $category -> delete();
        if ($category->cover_image) {
            Storage::disk('public')->delete($category->cover_image);
        }

        toastr()->success('Category Deleted Successfully');

        return redirect()->route('categories.index');
    }

    public function changeStatus(Request $request, Category $category)
    {
        $request->validate([
            'status' => 'required|string|in:available,unavailable',
        ]);

        try {
            $category->status = $request->status;
            $category->save();

            return response()->json([
                'message' => 'Category status updated successfully.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update user status.',
            ], 500);
        }
    }
}