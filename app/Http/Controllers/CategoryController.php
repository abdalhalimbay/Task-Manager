<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

public function getCategoriesTask($categoryId){
   $tasks = Category::findOrFail($categoryId)->tasks;
   return response()->json($tasks, 200);
}

     public function store(StoreCategoryRequest $request)
    {
        $category =
            Category::create($request->validated());

        return response()->json([
            'message' => 'Category Created Successfully',
            'profile'=>$category,], 201);
    }
}
