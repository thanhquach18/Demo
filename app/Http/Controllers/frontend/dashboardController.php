<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\blogs;
use App\Models\products;

class dashboardController extends Controller
{
    public function indexweb(){
        return view('frontend.website.index', [
            'blogs' => blogs::where('is_show', true)->get(),
            // 'products' => products::where('is_show', true)->get()
        ]);
    }

    public function singleBlog($slug) {
        $blog = blogs::where('slug', $slug)
                    ->where('is_show', true)
                    ->first();
        if(is_null($blog)) return redirect()->route('website.index');

        $blog->view++;

        return view('frontend.website.blogSingle', ['blog' => $blog]);
    }

    public function singleProduct($slug) {
        $product = products::where('slug', $slug)
                    ->where('is_show', true)
                    ->first();
        if(is_null($product)) return redirect()->route('website.index');

        $product->view++;

        return view('frontend.website.pricingSingle', ['product' =>$product]);
    }
}
