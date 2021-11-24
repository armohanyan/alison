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
    public function index($categoryId){

        return view('courses.category-courses')->with([
            'categoryId' => $categoryId,
         ]) ;
    }

    public function getSearchResult(Request $request){
        $searchResult = Category::where('name', 'LIKE','%'.$request->searchValue.'%')->orderByDesc('id')->get();
        return response()->json($searchResult); 
    } 

}
