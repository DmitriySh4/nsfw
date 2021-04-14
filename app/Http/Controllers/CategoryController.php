<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index() {
    	return view('category.index', ['data' => Category::withCount('advertisement')->orderby('id')->get()]);
    }

    public function submit(CategoryRequest $data) {
    	$category = new Category();
    	$category->fill($data->input());
    	
        $file = $data->file('image');
        $name = $file->getClientOriginalName();
        $uploadDir = 'public/categories/' . $data->name;
        $file->storeAs($uploadDir, $name);
        $category->path = $uploadDir . '/' . $name;
    	$category->save();
    	return redirect()->route('categoryIndex');
    }

    public function delete($id) {
    	Category::where('id', $id)->delete();
    	
    	return redirect()->route('categoryIndex');
    }

    public function getCategorySingle($id) {
    	return view('category.single', ['advs' => Advertisement::where('category_id', $id)->get()]);
    }
}
