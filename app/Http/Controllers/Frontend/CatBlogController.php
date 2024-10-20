<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class CatBlogController extends Controller
{
    public function show($slug){
        $category = Category::where('slug',$slug)->first();
        $blogs = Blog::where('category_id', $category->id)->latest()->paginate('5');

        return view("frontend.Category.index", compact('category', 'blogs'));
    }


    public function single($id){
        $blog = Blog::where('id', $id)->first();
        return view('frontend.blog.single', compact('blog'));
    }
}
