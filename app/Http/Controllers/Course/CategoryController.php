<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories() {

        $categories = Category::limit(9)->get();

        return response()->json([
            'success' => true,
            'categories' => $categories,
        ]) ;
    }

    public function index($name){
         return view('courses.category-courses'); 
    }
}
