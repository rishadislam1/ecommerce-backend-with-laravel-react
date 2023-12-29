<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductList;

class ProductListController extends Controller
{
    public function ProductListByRemark(Request $request)
    {
        $remark = $request->remark;
        $productList = ProductList::where('remark',$remark)->get();
        return $productList;
    }

    public function ProductListByCategory(Request $request){
        $category = $request->category;
        $productList = ProductList::where('category',$category)->get();
        return $productList;
    }

     public function ProductListBySubcategory(Request $request){
        $category = $request->category;
        $subCategory = $request->subcategory;
        $productList = ProductList::where('category',$category)->where('subcategory',$subCategory)->get();
        return $productList;
    }

    public function ProductBySearch(Request $request){
        $key = $request->key;
        $productList = ProductList::where('title','LIKE',"%{$key}%")->orWhere('price','LIKE',"%{$key}%")->orWhere('special_price','LIKE',"%{$key}%")->orWhere('category','LIKE',"%{$key}%")->orWhere('subcategory','LIKE',"%{$key}%")->orWhere('remark','LIKE',"%{$key}%")->orWhere('brand','LIKE',"%{$key}%")->get();
        return $productList;
    }
}
